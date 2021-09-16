<?php

namespace App\controller;

use App\core\App;
use App\core\Controller;
use App\models\post;

class postController extends Controller
{
    public function postes()
    {
        $users = new post();
        if (App::$app->request->isPost()) {
            $users->loadData(App::$app->request->getBody());
            if ($users->validation() && $users->post()) {
                exit;
                App::$app->session->setFlash('sucess', 'posted');
                App::$app->response->redirect('/');

                return 'success';
            }
        }

        return $this->render('pages/posts/posts', [
            'model' => $users,
        ]);
    }
}
