<?php

namespace App\models;

use App\core\userModel;

class friends extends userModel
{
    public int $id = 3;
    public int $status = 3;
    public int $reqreid = 3;
    public int $reqid = 3;

    public function tableName(): string
    {
        return 'friends';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attrs(): array
    {
        $this->pass = password_hash($this->pass, PASSWORD_DEFAULT);

        $this->uniqid = rand(time(), 1000);

        return ['reqer_id', 'reqtd_id', 'status'];
    }

    public function addFriend()
    {
        return $this->save();
    }

    public function users(): string
    {
        return $this->findAll('friends');
    }

    public function namedispaly(): string
    {
        return $this->firstname;
    }

    public function rules(): array
    {
        return [
            'id' => [],
        ];
    }
    public function friends(): array
    {
        $friends = friends::findAll(['status' => $this->status]);
        return $friends;
    }

}
