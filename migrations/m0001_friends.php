<?php

namespace App\migrations;

use App\core\App;

class m0001_friends
{
    public function up()
    {
        $insert = App::$app->db->pdo;
        $SQL = '
        CREATE TABLE IF NOT EXISTS friends
         (
         id INT(11) unsigned NOT NULL AUTO_INCREMENT,

         reqtd_id INT(11) unsigned NOT NULL ,
         reqer_id INT(11) unsigned NOT NULL ,
         status VARCHAR(255),
         PRIMARY KEY (id),
         FOREIGN KEY (reqtd_id)
                REFERENCES users(id)
                ON DELETE CASCADE,
         FOREIGN KEY (reqer_id)
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
        $SQL = 'DROP TABLE users';
        $insert->exec($SQL);
    }
}
