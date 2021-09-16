<?php

namespace App\models;

use App\core\App;
use App\core\userModel;

class profile extends userModel
{
    public string $bio = '';
    public string $img = '';
    public string $username= '';
    public string $gender= '';
    public string $phone= '';

    public function tableName(): string
    {
        return 'profile';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public string  $messages = '';

    public function attrs(): array
    {
        return ['img',
        'username',
        'phone','gender', 'bio'];
    }

    public function rules(): array
    {
        return [
            'bio' => [self::RULE_REQURED],
            'gender' => [self::RULE_REQURED],
        ];
    }

    public function ssave()
    {
        $id = App::$app->session->get('user');
        $user = users::findAll(['id' => $id]);
        // var_dump($user);
        exit;

        return App::$app->login($user);
    }

    public function update()
    {
        return $this->save();
    }

    public function user(): array
    {
        $model = new users();

        return [
            'user' => [
                'name' => $model->firstname,
                'lname' => $model->lastname,
                'email' => $model->email,
                'pass' => $model->pass,
                'gender' => $this->gender,
                'bio' => $this->bio,
                'number' => $this->number,
                ],
            ];
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
