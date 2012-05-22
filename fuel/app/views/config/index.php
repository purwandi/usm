<h1>Sistem Config</h1>
<hr />

<?php echo Form::open();?>
	<div class="row">
		<div class="span4">
			<?php echo Form::text('Nama universitas','nama_universitas',@$data->nama_universitas);?>
			<?php echo Form::area('Alamat','alamat_universitas',@$data->alamat_universitas,array('class'=>'span4','rows'=>4));?>
			<?php echo Form::text('Telpon','telp_universitas',@$data->telp_universitas);?>
			<?php echo Form::text('Email','email_universitas',@$data->email_universitas);?>
		</div>
		<div class="span4">
			<?php echo Form::text('Nama fakultas','nama_fakultas',@$data->nama_fakultas);?>
			<?php echo Form::area('Alamat','alamat_fakultas',@$data->alamat_fakultas,array('class'=>'span4','rows'=>4));?>
			<?php echo Form::text('Telpon','telp_fakultas',@$data->telp_fakultas);?>
			<?php echo Form::text('Email','email_fakultas',@$data->email_fakultas);?>
		</div>
		<div class="span4">
			<?php echo Form::text('Passing Grade ( bernilai antar 1 - 100 )','passing_grade',str_replace('.00','',@$data->passing_grade));?>
			<div class="alert">
				Passing grade digunakan untuk menentukan nilai paling kecil yang harus di
				lewati bagi calon mahasiswa baru, bagi calon mahasiswa baru yang nilai hasil ujian
				lebih kecil daripada nilai pasing grade maka di anggap tidak lolos.
			</div>
			<?php echo Form::text('Kuota','kuota',str_replace('.00','',@$data->kuota));?>
		</div>
	</div>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <button type="reset" class="btn">Reset changes</button>
	</div>

<?php Form::close();?>