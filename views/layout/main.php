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

  <?php
    echo App::$app->users->namedispaly();
        ?> 
     
  <li class="nav-item">

  <a class="nav-link active" aria-current="page" href="/">
  HOME
        </a>
  </li>
  <li class="nav-item">

  <a class="nav-link active" aria-current="page" href="/profile">
PROFILE
        </a>
        </li>
        <li class="nav-item">

        <a class="nav-link active" aria-current="page" href="/profile">
MESSAGES
        </a>
        </li>
        <li class="nav-item">

  <a class="nav-link active" aria-current="page" href="/search
  ">
TWEETS
        </a>
        </li>
        <li class="nav-item">

  <a class="nav-link active" aria-current="page" href="/friends">
FRIENDS
        </a>
        </li>

<?php endif; ?>
      
      </ul>
      </div>
</nav>
<div class="container">
  <div class="container">
{{cont}}</div></div>


</body>
</html>
