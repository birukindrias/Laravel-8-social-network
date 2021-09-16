<?php

namespace App\migrations;

use App\core\App;

class m0001_post
{
    public function up()
    {
        $insert = App::$app->db->pdo;
        $SQL = '
        CREATE TABLE IF NOT EXISTS post
         (
         id INT(11) unsigned NOT NULL AUTO_INCREMENT,
         users_id INT(11) unsigned NOT NULL ,
         body VARCHAR(255),
         PRIMARY KEY (id),
         FOREIGN KEY (users_id)
                REFERENCES users(id)
                ON DELETE CASCADE
         )
         ENGINE=INNODB;';
        $insert->exec($SQL);
    }

    public function upp()
    {
        $insert = App::$app->db->pdo;
        $SQL = 'ALTER TABLE post DISABLE KEYS;';
        $insert->exec($SQL);
    }

    public function down()
    {
        $insert = App::$app->db->pdo;
        $SQL = 'DROP TABLE chats';
        $insert->exec($SQL);
    }
}
