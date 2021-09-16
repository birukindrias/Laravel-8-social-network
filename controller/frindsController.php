<?php

namespace App\controller;

use App\core\Controller;

class frindsController extends Controller
{
    public function friends()
    {
        $user = $this->user();
        $users = $this->findAll('users');

        $uniqid = $this->uniqid('u');
        $otheruser = $this->uid('users', 'uniqid', 'u');
        $friends = $this::$cont->firends->findAll('users');

        return $this->render('pages/Friends/friends', [
            'user' => $user,
            'users' => $users,
            'friends' => $friends,
            'otheruser' => $otheruser,
            'uniqid' => $uniqid,
        ]);
    }

    public function addfriend()
    {
        $otheruser = $this->uid('users', 'uniqid', 'u')[0]['id'];

        $user = $this->user();
        $tid = $this->user()[0]['id'];
        $statues = 2;
        // echo '<pre>';
        // var_dump($user);
        // var_dump($otheruser);

        $sql = 'INSERT INTO profile (reqer_id,

        reqtd_id,statues)VALUES($otheruser,$tytfytid,$statues)';
        $stmt = $this->prepare($sql);

        $stmt->execute();

        return $this->render('pages/user/profile/profile', [
            'user' => $user,
        ]);
    }
    public function addfr(){}
}
