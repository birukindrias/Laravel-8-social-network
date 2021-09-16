<?php

namespace App\models;

use App\core\App;
use App\core\userModel;

class chats extends userModel
{
    public string $body = '';
    public int $incid = 2;
    public int $outid = 2;

    public function tableName(): string
    {
        return 'chats';
    }

    public function primaryKey(): string
    {
        return 'uniq';
    }

    public string  $messages = '';

    public function attrs(): array
    {
        return ['body', 'outid', 'incid'];
    }

    public function rules(): array
    {
        return [
            'body' => [self::RULE_REQURED],
            'outid' => [self::RULE_REQURED],
            'incid' => [self::RULE_REQURED],
        ];
    }

    public function messages()
    {
        $user = users::findAll(['id' => $this->id]);
        // var_dump($user);
        exit;

        return App::$app->login($user);
    }

    public function send()
    {
        return $this->save();
    }

    public function namedispaly(): string
    {
        return $this->firstname;
    }

    public function inid()
    {
        $user = new users();
        //     var_dump(app::$app->session->get('user'));
        //     var_dump(app::$app->session->get('user'));
        //     var_dump(app::$app->session->get('user'));
        $priamryKey = app::$app->userClass::primaryKey();

        $priamryValue = app::$app->session->get('user');

        $uiqueid = app::$app->users::findOne([$priamryKey => $priamryValue]);

        return $uiqueid->uniqid;
    }

    public function outid()
    {
        $user = new users();
        //     var_dump(app::$app->session->get('user'));
        //     var_dump(app::$app->session->get('user'));
        //     var_dump(app::$app->session->get('user'));
        $priamryKey = app::$app->userClass::primaryKey();

        $priamryValue = app::$app->session->get('user');

        $uiqueid = app::$app->users::findOne([$priamryKey => $priamryValue]);

        return $uiqueid->uniqid;
    }
}
