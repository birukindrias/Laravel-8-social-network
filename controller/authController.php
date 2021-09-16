<?php

namespace  App\controller;

use App\core\App;
use App\core\Controller;
use App\core\middlware\authMiddleware;
use App\models\login;
use App\models\users;

class authController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new authMiddleware(['profile']));
    }

    public function register()
    {
        $this->setLayout('auth');
        $users = new users();

        if (App::$app->request->isPost()) {
            $users->loadData(App::$app->request->getBody());
            if ($users->validation() && $users->save()) {
                App::$app->session->setFlash('sucess', 'thank you for registering');
                App::$app->response->redirect('/');

                return 'success';
            }
        }

        return $this->render('auth/register', [
            'model' => $users,
        ]);
    }

    public function login()
    {
        $this->setLayout('auth');
        $users = new login();
        if (App::$app->request->isPost()) {
            $users->loadData(App::$app->request->getBody());
            if ($users->validation() && $users->login()) {
                App::$app->session->setFlash('log', 'you are logged in');
                App::$app->response->redirect('/');

                return 'success';
            }
        }

        return $this->render('auth/login', [
            'model' => $users,
        ]);
    }

    public function logout()
    {
        return  App::logout();
    }
}
