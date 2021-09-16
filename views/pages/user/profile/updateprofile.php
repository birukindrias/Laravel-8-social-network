<div class="img"><img src="img" alt="" >
img</div>
<?php $form = App\core\FORM\Form::begin('/upload', 'post', 'multipart/form-data'); ?>
<?php echo $form->field($model, 'img'); ?>
<?php echo $form->field($model, 'phone'); ?>
<?php echo $form->field($model, 'username'); ?>
<?php echo $form->field($model, 'gender'); ?>
<button type="submit">update</button>

<?php echo $form->end(); ?>
