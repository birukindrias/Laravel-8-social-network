<?php

namespace App\controller;

use App\core\App;
use App\core\Controller;
use App\models\chats;

class chatController extends Controller
{
    public function chat()
    {
        $users = $this->findAll('users');
        $thisuser = new chats();
        $uniq = new chats();

        $outid = $this->uid('users', 'uniqid', 'u');
        $uniq->inid();
        $messages = $this->allmessages(
        ['incid' => $outid, 'outid' => $uniq->inid(),
         'outid' => $outid, 'incid' => $uniq->inid(), ]);
        $usw = $thisuser->inid();
        if (App::$app->request->isPost()) {
            $thisuser->loadData(App::$app->request->getBody());
            if ($thisuser->validation() && $thisuser->send()) {
                App::$app->session->setFlash('sucess', 'posted');
                $outid = $_GET['u'] ?? '';

                App::$app->response->redirect("/chat?u=$outid");

                return 'success';
            }

            return $this->render('pages/chats/chat', [
                'model' => $thisuser,
                'messages' => $messages,
            'users' => $users,
            'user' => $usw,
            'incuser' => $outid,
            ]);
        }

        return $this->render('pages/chats/chat', [
            'model' => $thisuser,
            'messages' => $messages,
            'user' => $usw,
            'incuser' => $outid,

            'users' => $users,
        ]);
    }

    public function allmessages(array $wher)
    {
        $outid = $this->uid('users', 'uniqid', 'u')[0]['uniqid'] ?? '';
        $uniq = new chats();
        $inid = $uniq->inid();
        $sql = "SELECT * FROM chats WHERE  
        incid = $outid || outid = $inid ||
         outid = $outid || incid = $inid ";
        $stmt = $this->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
