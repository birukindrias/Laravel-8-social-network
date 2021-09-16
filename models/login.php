<?php

namespace App\models;

use App\core\App;
use App\core\Model;

class login extends Model
{
    public function tableName(): string
    {
        return 'users';
    }

    public string  $email = '';
    public string  $pass = '';

    public function attrs(): array
    {
        return ['email', 'pass'];
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQURED],
            'pass' => [self::RULE_REQURED],
        ];
    }

    public function login()
    {
        $user = users::findOne(['email' => $this->email]);

        if (!$user) {
            return false;
        }

        if (!password_verify($this->pass, $user->pass)) {
            return false;
        }

        return App::$app->login($user);
    }
}
