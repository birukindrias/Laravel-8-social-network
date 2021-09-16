<?php

namespace App\migrations;

use App\core\App;

class m0001_ini
{
    public function up()
    {
        $insert = App::$app->db->pdo;
        $SQL = '
        CREATE TABLE IF NOT EXISTS users
         (
         id INT(11) unsigned NOT NULL AUTO_INCREMENT,
         firstname VARCHAR(255),
         lastname VARCHAR(255),
         email VARCHAR(255),
         pass VARCHAR(255),
         status VARCHAR(255),
         uniqid VARCHAR(255),
         PRIMARY KEY (id)
         )
         ENGINE=INNODB;';
        $insert->exec($SQL);
    }

    public function upp()
    {
        $insert = App::$app->db->pdo;
        $SQL = 'ALTER TABLE users DISABLE KEYS;';
        $insert->exec($SQL);
    }
    public function down()
    {
        $insert = App::$app->db->pdo;
        $SQL = 'DROP TABLE users';
        $insert->exec($SQL);
    }
}
