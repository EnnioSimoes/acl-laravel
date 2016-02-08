<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Product' => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
            $gate->define($permission->slug, function($user) use ($permission) {
                return $permission->roles->contains($user->role);
            });
        }

        // $gate->define('show-product', function($user, $product){
        //     return $user->id == $product->supplier_id;
        // });
    }
}
