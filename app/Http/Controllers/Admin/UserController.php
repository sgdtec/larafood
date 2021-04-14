<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user) 
    {
        $this->model = $user;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->model->latest()->tenantUser()->paginate();

        return view('admin.pages.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateUser $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password']  = bcrypt($data['password']);

        $this->model->create($data);

        return redirect()->route('users.index')
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
        if (!$user = $this->model->tenantUser()->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.show', [
            'user' => $user
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
        if (!$user = $this->model->tenantUser()->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateUser $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->model->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
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
        if (!$user = $this->model->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index', $user->id)
                         ->with('message', 'Usuário deletado com sucesso!!!');
    }

    /**
     * Search Results users.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->model->where(function($query) use ($request) {
                        if ($request->filter) {
                            $query->orWhere('name', $request->filter);
                            $query->orWhere('email', 'LIKE', "%{$request->filter}%");
                        }
                    })
                    ->latest()
                    ->tenantUser()
                    ->paginate();

        return view('admin.pages.users.index', [
            'users' => $users,
            'filters'  => $filters
        ]);
    }
}
