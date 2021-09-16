<?php $form = App\core\FORM\Form::begin('', 'post'); ?>
<?php echo $form->field($model, 'firstname'); ?>
<?php echo $form->field($model, 'lastname'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'pass'); ?>
<?php echo $form->field($model, 'cpass'); ?>
<button type="submit">sub</button>

<?php echo  $form::end(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">
<style>
    .mae{
  background-color: chartreuse;
  font-size: 59rem;
  color: blue;
}
</style>
</head>
<body>
<div class="mae">hellllllll</div>  
    
</body>
</html>