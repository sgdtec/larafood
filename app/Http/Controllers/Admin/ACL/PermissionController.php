<?php

namespace App\Http\Controllers\Admin\ACl;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;

class PermissionController extends Controller
{
    protected $model;

    public function __construct(Permission $permission) 
    {
        $this->model = $permission;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->model->paginate();

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermission $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        $this->model->create($request->all());

        return redirect()->route('permissions.index')
                         ->with('message', 'Permissão criada com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$permission = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', [
            'permission' => $permission
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
        if (!$permission = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermission $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        if (!$permission = $this->model->find($id)) {
            return redirect()->back();
        }
        $permission->update($request->all());

        return redirect()->route('permissions.index')
                         ->with('message', 'Permissão alterado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$permission = $this->model->find($id)) {
            return redirect()->back();
        }

        $permission->delete();

        return redirect()->route('permissions.index', $permission->id)
                         ->with('message', 'Permissão deletada com sucesso!!!');
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

        $permissions = $this->model->where(function($query) use ($request) {
                        if ($request->filter) {
                            $query->where('name', $request->filter);
                            $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                        }
                    })->paginate();

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions,
            'filters'  => $filters
        ]);
    }   
}