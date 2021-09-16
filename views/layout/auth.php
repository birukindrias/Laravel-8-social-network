<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../pages/style.css">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="/">mvx</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <div class="d-flex">        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <?php
use App\core\App;

echo App::$app->session->getFlash('log');
?>        
        <li class="nav-item">

<?php if (App::isGuest()):?>
  
 <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/register">    <?php echo 'wellcome guest'; ?>
</a>
        </li>
 <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/register">REGISTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login">LOGIN</a>
        </li>
<?php else:?>
  <a class="nav-link active" aria-current="page" href="/"><?php
    echo 'wellcome ';
    echo App::$app->users->namedispaly();
        ?>
        </a> 
<?php endif; ?>
</li>
  
        
      </ul>
      </div>
    </div>
  </div>
</nav>
<div class="container">

      {{cont}}
</div>
</body>
</html>
