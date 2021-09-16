<?php

namespace App\controller;

use App\core\App;
use App\core\Controller;
use App\models\profile;

class ProfileController extends Controller
{
    public function profile()
    {
        $users = $this->uid('users', 'uniqid', 'u') ?? [];

        $profiler = $this->userprofile();
        $isuser = $this->isUser();
        $id = App::$app->session->get('user');
        $user = $this->uid('users', 'uniqid', 'u');
        $thisuser = $this->user();

        return $this->render('pages/user/profile/profile', [
            'isuser' => $isuser,
            'thisuser' => $thisuser,
            'otherusers' => $user,
            'users' => $users,
            'profiler' => $profiler,
        ]);
    }

    public function isUser()
    {
        $user = $this->uid('users', 'uniqid', 'u')[0]['id'] ?? '';

        $otheruser = App::$app->session->get('user');

        if ($user) {
            if ($user != $otheruser) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function update()
    {
        $profile = new profile();

        // $otheruser = $this->otheruser();
        $user = $this->user();

        if (App::$app->request->isPost()) {
            $profile->loadData(App::$app->request->getBody());
            if ($profile->validation() && $profile->update()) {
                App::$app->session->setFlash('sucess', 'posted');
                $outid = $_GET['u'] ?? '';

                App::$app->response->redirect('/update');

                return 'success';
            }
        }

        return $this->render('pages/user/profile/updateprofile', [
            'user' => $user,
            'model' => $profile,
        ]);
    }

    public function upload()
    {
        // $file = 'file.php';
        $exs = ['png', 'jepg', 'jpg'];

        var_dump($_FILES);

        $file = $_FILES['img']['name'];
        // $image = $_FILES['file']['FILE_NAME'];
        var_dump($file);
        $filename = explode('.', $file);
        $filee = $_FILES['img']['tmp_name'];
        if (in_array($filename[1], $exs)) {
            $na = rand(time(), 1000000);
            $filename[0] .= $na;
            $imgname = $filename[0].$file;
            $storage = '/views/assets/avator';
            move_uploaded_file($filee, '../views/assets/'.$imgname.'/');
            $name = $filename[0];
            $sql = "INSERT INTO profile(img)
             VALUES('$imgname')";
            $stmt = $this->prepare($sql);

            return $stmt->execute();
        }
    }

    public function userprofile()
    {
        $user_id = App::$app->session->get('user');
        $sql = "SELECT * FROM profile where users_id = $user_id";
        $stmt = $this->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function avater()
    {
        return $src = 'src';
    }
}
