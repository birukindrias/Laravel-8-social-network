<?php

namespace App\migrations;

use App\core\App;

class m0001_chat
{
    public function up()
    {
        $insert = App::$app->db->pdo;
        $SQL = '
        CREATE TABLE IF NOT EXISTS chats
         (
         id INT(11) unsigned NOT NULL AUTO_INCREMENT,
         incid INT(255),
         outid INT(255),
         incchat VARCHAR(255),
         outchat VARCHAR(255),
         PRIMARY KEY (id)
         )
         ENGINE=INNODB;';
        $insert->exec($SQL);

        //     $insert = App::$app->db->pdo;
    //     $SQL = '
    // SET      ENGINE=INNODB;';
    //     $insert->exec($SQL);
    }

    public function down()
    {
        $insert = App::$app->db->pdo;
        $SQL = 'DROP TABLE chats';
        $insert->exec($SQL);
    }
}
