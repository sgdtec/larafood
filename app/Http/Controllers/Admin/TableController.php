<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTable;

class tableController extends Controller
{
    private $model;

    public function __construct(Table $table)
    {
        $this->model = $table;
        $this->middleware(['can:tables']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->model->latest()->paginate();

        return view('admin.pages.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreUpdateTable $request) {

        $this->model->create($request->all());

        return redirect()->route('tables.index')
                         ->with('success', 'Mesa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$table = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$table = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateTable  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTable $request, $id)
    {
        if (!$table = $this->model->find($id)) {
            return redirect()->back();
        }

        $table->update($request->all());

        return redirect()->route('tables.index')
                         ->with('success', 'Dados gravados com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$table = $this->model->find($id)) {
            return redirect()->back();
        }

        $table->delete();

        return redirect()->route('tables.index');
    }

    /**
     * Search Results tables.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $tables = $this->model->where(function($query) use ($request) {
                        if ($request->filter) {
                            $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                            $query->orWhere('identify', $request->filter);
                        }
                    })
                    ->latest()
                    ->paginate();

        return view('admin.pages.tables.index', [
            'tables' => $tables,
            'filters'  => $filters
        ]);
    }
}
