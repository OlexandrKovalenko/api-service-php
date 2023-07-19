<?php
namespace WebApp\Controllers;

use WebApp\Core\Controller;
use WebApp\Services\ApiServices;
use WebApp\Services\ValidateService;

class AuthController extends Controller {

    function before() {
        // change layout
        $this->view->layout = 'default';
    }

    function loginAction() {
        if(!empty($_POST)) {
            $user = $this->model->checkUser($_POST['email']);
            if(!empty($user) && password_verify($_POST['password'], $user[0]['password'])) {
                $this->token = $user[0]['token'];
            } else {
                $api = new ApiServices();
                if(!empty($api->authorize(['email' => $_POST['email'], 'password' => $_POST['password']]))) {
                    $this->token = empty($api->authorize(['email' => $_POST['email'], 'password' => $_POST['password']]));
                    
                }
            }



        }
        $this->view->render('Увійти');
    }
}