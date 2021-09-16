<h1>Login</h1>

<?php $form = App\core\FORM\Form::begin('', 'post'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'pass'); ?>
<button type="submit">sub</button>

<?php echo  $form::end(); ?>


