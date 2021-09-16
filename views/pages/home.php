<h1>hello</h1>
<link rel="stylesheet" href="<?php $path; ?>">
<?php
var_dump($path);
$this->title = 'home'; ?>
<div>
</div>
<div>
    <?php foreach ($chats as $key => $values): ?>
<table>
<tr>
    <td><a href="/profile?u=<?= $values['uniqid']; ?>"><?= $values['firstname']; ?></a><td>
</tr>
</table>
<?php endforeach; ?>
<?php echo '<pre>';
 var_dump($postes);
 ?>
</div>
<?php foreach ($postes as $key => $value):?>
     <?= $value['body']; ?>
 <?php endforeach; ?>
home profile
<?php include_once 'index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  man of
  
</body>
</html>