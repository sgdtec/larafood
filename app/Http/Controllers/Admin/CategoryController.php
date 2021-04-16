<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;

class CategoryController extends Controller
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->model->latest()->paginate();

        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreUpdateCategory $request) {

        $this->model->create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$category = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$category = $this->model->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        if (!$category = $this->model->find($id)) {
            return redirect()->back();
        }

        $category->update($request->all());

        return redirect()->route('categories.index')
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
        if (!$category = $this->model->find($id)) {
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index');
    }

    /**
     * Search Results Categories.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categories = $this->model->where(function($query) use ($request) {
                        if ($request->filter) {
                            $query->orWhere('name', $request->filter);
                            $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                        }
                    })
                    ->latest()
                    ->paginate();

        return view('admin.pages.categories.index', [
            'categories' => $categories,
            'filters'  => $filters
        ]);
    }
}
