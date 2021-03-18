<?php

namespace App\Http\Controllers\Admin;

use App\Model\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function create() {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request) {

        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        
        $this->model->create($data);

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
        $plan = $this->model->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('plans.index');        
    }
}
