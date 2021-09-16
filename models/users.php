<?php

namespace App\models;

use App\core\userModel;

class users extends userModel
{
    public const  ACTIVE = 1;
    public const  IN_ACTIVE = 0;
    public const  NOT_ACTIVE = 2;
    public string  $firstname = '';
    public string  $lastname = '';
    public string  $email = '';
    public string  $pass = '';
    public string  $cpass = '';
    public int  $status = self::NOT_ACTIVE;
    public string  $uniqid = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attrs(): array
    {
        $this->pass = password_hash($this->pass, PASSWORD_DEFAULT);

        $this->uniqid = rand(time(), 1000);

        return ['firstname', 'lastname', 'email', 'pass', 'status', 'uniqid'];
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQURED],
            'lastname' => [self::RULE_REQURED],
            'email' => [self::RULE_REQURED],
            'pass' => [self::RULE_REQURED, [self::RULE_MIN, 'min' => 8]],
            'cpass' => [self::RULE_REQURED, [self::RULE_MIN, 'min' => '8'], [self::RULE_MATCH, 'match' => 'pass']],
        ];
    }

    public function register()
    {
        return $this->save();
    }

    public function users(): string
    {
        return $this->findAll('users');
    }

    public function namedispaly(): string
    {
        return $this->firstname;
    }
}
