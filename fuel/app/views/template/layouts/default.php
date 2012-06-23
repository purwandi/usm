<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">
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