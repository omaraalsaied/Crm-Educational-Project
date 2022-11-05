<?php

namespace Crm\User\Listeners;

use App\Crm\User\Requests\CreateUser;
class SendUserCreationEmail
{

    public function handle (CreateUser $event): ?string
    {
        return  $user = $event->getUser();
    }

}
