<?php

namespace App\models;

use App\core\App;
use App\core\userModel;

class post extends userModel
{
    public function tableName(): string
    {
        return 'post';
    }

    public function primaryKey(): string
    {
        return 'post';
    }

    public string  $body = '';

    public function attrs(): array
    {
        return ['body'];
    }

    public function rules(): array
    {
        return [
            'body' => [self::RULE_REQURED],
        ];
    }

    public function posts()
    {
        $user = users::findAll(['id' => $this->id]);
        // var_dump($user);
        exit;

        return App::$app->login($user);
    }

    public function postes()
    {
        // $user = users::findAll('post');
        // var_dump($user);
        exit;

        // return App::$app->login($user);
    }

    public function post()
    {
        return $this->save();
    }

    public function namedispaly(): string
    {
        return $this->firstname;
    }
}
