<div class="container">
	<footer>
		<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
		<p>
			<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
			<small>Version: <?php echo e(Fuel::VERSION); ?></small>
		</p>
	</footer>
</div>
<?php echo Asset::js('bootstrap.min.js');?>