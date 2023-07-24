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
                    $this->token = $api->authorize(['email' => $_POST['email'], 'password' => $_POST['password']]);
                    debug($this->token);
                }
            }
        }
        $this->view->render('Увійти');
    }

    function authorizationAction() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->get(['email' => $email], 'first');
            session_start();
            $_SESSION['authenticated'] = [
                'id' => $user['id'],
                'token' => $user['token'],
                'admin' => true
            ];

            if($user && $user['token']) {
                $this->token = $user['token'];
                $this->view->redirect('/');
            }
            else {
                $api = new ApiServices();
                $tokenRequest = $api->authorize(['email' => $_POST['email'], 'password' => $_POST['password']]);
                if($tokenRequest) {
                    $user = $this->model->store([
                        'email' => $email,
                        'password' => $password,
                        'token' => $tokenRequest,
                    ]);
                    $this->token = $tokenRequest;
                    $this->view->redirect('/');
                }
                $this->view->redirect('/login');
            }
        }
        $this->view->redirect('/login');
    }

    function logoutAction() {
        session_start();
        session_destroy();
        $this->view->redirect('/login');
        exit;
    }
}