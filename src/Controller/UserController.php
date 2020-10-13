<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    public function notifications()
    {
        $userFirstName = '...';
        $userNotifications = ['...', '...'];

        return $this->render('user/notifications', [
            'userFirstName' => $userFirstName,
            'notifications' => $userNotifications
        ]);

    }
}
