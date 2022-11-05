<?php

namespace App\Providers;

use App\Crm\User\Requests\CreateUser;
use Crm\customer\Events\CustomerCreation;
use Crm\customer\Listeners\NotifySalesOnCustomerCreation;
use Crm\Customer\Listeners\SendProjectCreationEmail;
use Crm\Customer\Listeners\SendUserCreationEmail;
use Crm\Project\Events\ProjectCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerCreation::class => [
            NotifySalesOnCustomerCreation::class
        ],
        ProjectCreation::class =>[
            SendProjectCreationEmail::class
        ],  CreateUser::class =>[
            SendUserCreationEmail::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
