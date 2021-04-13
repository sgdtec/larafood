<?php

namespace App\Services;

use App\Models\Plan;

class TenantService {

    private $plan;
    private $data = [];

    public function make( Plan $plan, array $data) {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();

        return $user = $this->storeUser($tenant);  
        
      //  return $user;
    }

    public function storeTenant() {

        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj'         => $data['cnpj'],
            'name'         => $data['empresa'],
            'email'        => $data['email'],
            'subscription' => now(), // Data create
            'expires_at'   => now()->addDays(7), // Date final expires
        ]);

    }

    public function storeUser($tenant) {
        $user = $tenant->users()->create([
            'name'     => $this->data['name'],
            'email'    => $this->data['email'],
            'password' => bcrypt($this->data['password'])
        ]);

        return $user;
    }
}