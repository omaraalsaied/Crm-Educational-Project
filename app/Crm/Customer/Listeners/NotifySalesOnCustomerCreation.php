<?php

namespace Crm\customer\Listeners;

use Crm\customer\Events\CustomerCreation;

class NotifySalesOnCustomerCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CustomerCreation $event
     * @return void
     */
    public function handle(CustomerCreation $event)
    {
        $customer = $event->getCustomer();
        dd($customer);
    }
}
