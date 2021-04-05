<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;

class PlanController extends Controller
{    
    private $model;

    public function __construct(Plan $plan)
    {
        $this->model = $plan;      
    }

    public function index() {

        $plans = $this->model->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    //Open form create plans
    public function create() {
        return view('admin.pages.plans.create');
    }

    //Save plans in BD
    public function store(StoreUpdatePlan $request) {

        $this->model->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url) {

        $plan = $this->model->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($url) {
        $plan = $this->model->where('url', $url)
                            ->with('details')
                            ->first();

        if (!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()->back()
                             ->with('error', 'Oppss: Negado remover um plano com detalhes relacionados, remova o detalhe antes!');
        }

        $plan->delete();

        return redirect()->route('plans.index');        
    }

    public function edit($url) {
        $plan = $this->model->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);        
    }

    public function update(StoreUpdatePlan $request, $url) {

        $plan = $this->model->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function search(Request $request) {

        $filters = $request->except('_token');
        $plans = $this->model->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans'   => $plans,
            'filters' => $filters
        ]);
    }
}