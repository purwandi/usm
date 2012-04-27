<div class="page-header">
    <h1>Groups <small>Manage groups</small></h1>
</div>
<?php foreach ($student as $key):?>
	<?php echo $key->username;?>
	<?php echo $key->password;?>
<?php endforeach;?>

<?php echo Html::anchor($module.'/create','Create');?>