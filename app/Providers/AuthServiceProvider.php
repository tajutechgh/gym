<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user.staffs','App\Policies\UserPolicy@staffs');

        Gate::define('user.members','App\Policies\UserPolicy@members');

        Gate::define('user.memberships','App\Policies\UserPolicy@memberships');

        Gate::define('user.classes','App\Policies\UserPolicy@classes');

        Gate::define('user.classaction','App\Policies\UserPolicy@classaction');

        Gate::define('user.groups','App\Policies\UserPolicy@groups');

        Gate::define('user.groupaction','App\Policies\UserPolicy@groupaction');

        Gate::define('user.attendance','App\Policies\UserPolicy@attendance');

        Gate::define('user.products','App\Policies\UserPolicy@products');

        Gate::define('user.equipments','App\Policies\UserPolicy@equipments');

        Gate::define('user.message','App\Policies\UserPolicy@message');

        Gate::define('user.report','App\Policies\UserPolicy@report');

        Gate::define('user.expenses','App\Policies\UserPolicy@expenses');

        Gate::define('user.roles','App\Policies\UserPolicy@roles');

        Gate::define('user.permissions','App\Policies\UserPolicy@permissions');

        Gate::define('user.memberaction','App\Policies\UserPolicy@memberaction');

        Gate::define('user.noticeaction','App\Policies\UserPolicy@noticeaction');

        Gate::define('user.galleryaction','App\Policies\UserPolicy@galleryaction');

        Gate::define('user.dayaction','App\Policies\UserPolicy@dayaction');

        Gate::define('user.event','App\Policies\UserPolicy@event');

        Gate::define('user.manage','App\Policies\UserPolicy@manage');

        Gate::define('user.dashboard','App\Policies\UserPolicy@dashboard');
    }
}
