<div class="row">
	<div class="span7">
		<legend>Materi Ujian dan Visitasi Akreditasi Secara Online</legend>
		<p>Silahkan klik link di bawah ini untuk mengunduh materi ujian dan visitasi akreditasi sacara online</p>
		<ol>
			<li><?php echo Html::anchor('document/Ujian-Online.pptx','Panduan Ujian Online Asesor Tahun 2012');?></li>
			<li><?php echo Html::anchor('document/Pelatihan-asesor-new-2012.ppt','Panduan Visitasi Online Asesor Tahun 2012');?></li>
		</ol>

		<legend>Materi Pendidikan dan Pelatihan Asesor Tahun 2012</legend>
		<p>Silahkan klik link di bawah ini untuk mengunduh materi Pendidikan dan Pelatihan Asesor Tahun 2012</p>
		<ol class="">
			<li><?php echo Html::anchor('document/01-Kebijakan.pptx', 'Kebijakan Akreditasi');?></li>
			<li><?php echo Html::anchor('document/02-Mekanisme-akreditasi.ppt', 'Mekanisme Akreditasi');?></li>
			<li><?php echo Html::anchor('document/03-Perangkat-Akreditasi-SD.ppt', 'Perangkat Akreditasi SDMI');?></li>
			<li><?php echo Html::anchor('document/03A-Instrumen-Akreditasi.pptx', 'Instrument Akreditasi SDMI oleh M Thayeb HMS');?></li>
			<li><?php echo Html::anchor('document/04-Teknik-Skoring-SD-MI.ppt', 'Teknik Skoring SDMI');?></li>
			<li><?php echo Html::anchor('document/05-Profesionalisme-Asesor.pptx', 'Profesionalisme Asesor');?></li>
			<li><?php echo Html::anchor('document/06-Panduan-Visitasi-SD.pptx', 'Panduan Visitasi SDMI');?></li>
			<li><?php echo Html::anchor('document/07-Penyusunan-Laporan-SD-MI.pptx', 'Penyusunan Laporan SDMI');?></li>
			<li><?php echo Html::anchor('document/08-Strategi-dan-sistem-penilaian-pel-asesor.pptx', 'Strategi dan sistem penilaian-pel asesor.pptx');?></li>
		</ol>

		<legend>Perangkat Akreditasi</legend>
		<p>Silahkan klik link di bawah ini untuk mengunduh perangkat akreditasi</p>
		<ol>
			<li><?php echo Html::anchor('instrument/sd-permen.pdf','Peraturan Menteri Pendidikan Nasional tentang Perangkat Akreditasi SD/MI');?></li>
			<li><?php echo Html::anchor('instrument/sd-instrumen.pdf','Instrument Akreditasi SD/MI');?></li>
			<li><?php echo Html::anchor('instrument/sd-juknis.pdf','Petunjuk Teknis Instrument Akreditasi SD/MI');?></li>
			<li><?php echo Html::anchor('instrument/sd-pengumpulan-data.pdf','Instrument Pengumpulan Datan dan Informasi SD/MI');?></li>
			<li><?php echo Html::anchor('instrument/sd-skoring.pdf','Teknik Penskoran Akreditasi SD/MI');?></li>
		</ol>

	</div>
	<div class="span5">
		<?php echo Form::open();?>
			<legend>Login Sistem</legend>
<?php if (Session::get_flash('wrong')): ?>
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo Session::get_flash('wrong'); ?>
	</div>
<?php endif; ?>
			<?php echo Form::text('Username','username');?>
			<?php echo Form::pass('Password','password');?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Login sistem</button>
				<?php echo Html::anchor('','Cancel',array('class'=>'btn'));?>
			</div>
		<?php echo Form::close();?>
	</div>
</div>