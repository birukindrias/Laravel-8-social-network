<?php

namespace App\controller;

use App\core\App;
use App\core\Controller;
use App\models\post;
use App\models\users;
define('PATH', App::$ROOT_DIR."/views/assets/dist/style.css");

class SiteController extends Controller
{
    
    public function home()
    {
        $postes = $this->fetchallcont('post');
        $chat = new users();

        return $this->render('pages/home', [
            'chats' => $this->findAll(),
            'model' => $chat,
            'path'=>PATH,
            'postes' => $postes,
        ]);
    }

    public function search()
    {
        $search = App::$app->request->getBody()['search'] ?? '';
        $sql = "SELECT * FROM users WHERE firstname LIKE '%$search%'";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->render('pages/user/search', [
            'users' => $users ?? null,
        ]);
    }

    //posts
    public function posts()
    {
        $users = new post();
        $posts = Controller::$cont->post->postes();
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
            'postes' => $posts,
        ]);
    }

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
