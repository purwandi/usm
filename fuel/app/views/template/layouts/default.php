<?php if ( ! Input::is_ajax()):?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<!-- metadata -->
		<?php echo render('template/partials/metadata');?>
	</head>
	<body>
		<!-- header -->
		<?php echo render('template/partials/header');?>

		<div class="container">

			<!-- content -->
			<?php echo $content; ?>
		</div>

		<!-- js -->
		<?php echo render('template/partials/footer');?>
	</body>
</html>
<?php else:?>
	<?php echo $content; ?>
<?php endif;?>