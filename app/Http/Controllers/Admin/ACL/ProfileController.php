<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUpdateProfile;

class ProfileController extends Controller
{
    protected $model;

    public function __construct(Profile $profile) 
    {
        $this->model = $profile; 
        $this->middleware(['can:profiles']);       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->model->paginate();


        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProfile $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        $this->model->create($request->all());

        return redirect()->route('profiles.index')
                         ->with('message', 'Perfil criado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$profile = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$profile = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProfile $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if (!$profile = $this->model->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index')
                         ->with('message', 'Perfil alterado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$profile = $this->model->find($id)) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index', $profile->id)
                         ->with('message', 'Perfil deletado com sucesso!!!');
    }

    /**
     * Search Results Profiles.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $profiles = $this->model->where(function($query) use ($request) {
                        if ($request->filter) {
                            $query->where('name', $request->filter);
                            $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                        }
                    })->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles,
            'filters'  => $filters
        ]);
    }
    
}