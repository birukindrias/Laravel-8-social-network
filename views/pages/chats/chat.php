
<?php  foreach ($incuser as $key => $value):?>
    <a href="/profile?u=<?=$value['uniqid']; ?>"><?=$value['firstname']; ?></a>

 <?php endforeach; ?>
<h3>Chats</h3>

<?php
// use App\core\App;

// echo App\core\App::$app->users->namedispaly();

use App\core\App;

foreach ($messages as $key => $value) {
    echo $value['body'];
}

foreach ($messages as $key => $value) {
    // echo '<pre>';
    echo $value['body'];
}
 ?>
<div class="inuser">
</div>

<?php $form = App::$app->Form::begin('', 'post'); ?>
<?php echo $form->chat($model, 'body'); ?>
<?php echo $form->chat($model, 'outid'); ?>
<?php echo $form->chat($model, 'incid'); ?>
<button type="submit">send</button>

<?php echo  $form::end(); ?>



