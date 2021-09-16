<h3>HOME</h3>
<?php $form = App\core\FORM\Form::begin('', 'post'); ?>
<?php echo $form->textarea($model, 'body'); ?>
<button type="submit">POST</button>

<?php echo  $form::end(); ?>
<?php
foreach ($postes as $key => $value):?>
<div class="posts">
    <div class="btn">edsc</div>
    <div class="post">
        <div class="img">
            img
        </div>
        <div class="img">
        </div>
    </div>
    <div class="options"><div class="btn">edsc</div>
    <div class="btn">edsc</div>
    <div class="btn">edsc</div></div>
</div>
<?php endforeach; ?>


