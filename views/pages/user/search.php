<h1>hello</h1>
<?php
$this->title = 'search'; ?>
</div>
<?php if ($users):?>
<?php
foreach ($users  as $key => $value) {
    echo $value['firstname'];
}
?>
<?php else:?>
    <h4>there is no match</h4>
<?php endif; ?>