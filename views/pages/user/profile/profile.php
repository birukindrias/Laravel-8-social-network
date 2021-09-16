<h3>Profile</h3>
<?php 
if($isuser):?>
<?php foreach ($thisuser as $key => $value): ?>
    <div>user</div>
    <a href="/update">UPDATE PROFILE</a>
    <div class="profile">
        <div class="img">
        </div>
        <div class="info">
            <div><?= $value['firstname']; ?> username</div>
            <div>phone</div>
            <div>bio</div>
        </div>
    </div> 
<?php endforeach;?>
<?php else:?>
<?php foreach ($otherusers as $key => $value): ?>
    <a href="/chat?u=<?php echo $value['uniqid']?>">message</a>

    <div class="profile">
        <div class="img">
        </div>
        <div class="info">
            <div><?= $value['firstname']; ?> username</div>
            <div>phone</div>
            <div>bio</div>
        </div>
    </div>
<?php endforeach;?>
<?php endif;?>
<?php 
   echo "man"; var_dump($profiler);
   ?>
<form action="/friendadded" method="post">
<input type="number" name="reqtd_id" id="">
<input type="number" name="reqer_id" id="">
<input type="number" value="1" name="status" id="">
<button type="submit">add friend</button>
</form>


