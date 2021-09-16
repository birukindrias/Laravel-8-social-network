<?php

namespace App\migrations;

use App\core\App;

class m0001_add_pass_column
{
    public function up()
    {
        $SQL = 'ALTER TABLE  users ADD  COLUMN IF NOT EXISTS pass VARCHAR(255) NOT NULL';
        App::$app->db->pdo->exec($SQL);
    }

    public function down()
    {
        $SQL = 'ALTER TABLE  users DROP COLUMN pass';
        App::$app->db->pdo->exec($SQL);
    }
}
