<h3>Profile</h3>
<?php
// use App\core\App;

// echo App\core\App::$app->users->namedispaly();

use App\core\App;

// var_dump($friends);

?>
<?php

foreach ($users as $key => $value):
    ?>
<form action="" method="post">
<a href="/profile?u=<?= $value['uniqid']; ?> ">
<?=$value['firstname']; ?></a><a href="/addfriend?u=<?= $value['uniqid']; ?>">addfriend</a>
</form>
<?php endforeach; ?>