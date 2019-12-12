<?php

namespace Router;

use Controllers\Login;
use Controllers\Registration;

class Router
{

    public function request($uri)
    {
        switch (mb_strtolower($uri)) {
            case '/':
                require_once '../views/index.phtml';
                break;
//registration
            case '/views/registration':
                require_once '../views/registration/registration.phtml';
                break;
            case '/registration':
                $registration = new Registration();
                $registration->getPost($_POST);
                break;
            case '/views/repeat-registration':
                require_once '../views/registration/noValidateRegistration.phtml';
                break;
            case '/views/exist-user':
                require_once '../views/registration/existUser.phtml';
                break;
            case '/views/registered' :
                require_once '../views/registration/registered.phtml';
                break;
//login
            case '/views/login':
                require_once '../views/login/login.phtml';
                break;
            case '/login':
                $login  = new Login();
                $login->getPost($_POST);
                break;
            case '/welcome':
                require_once '../views/welcome/welcome.phtml';
                break;
            case '/repeat-login':
                require_once '../views/login/wrongLogin.phtml';
                break;
        }
    }
}