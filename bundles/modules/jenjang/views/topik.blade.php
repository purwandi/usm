@layout('layouts.main')
@section('title')
   Jenjang Topik
@endsection

@section('content')
	
	@if($topik)
		<legend> Pengaturan topik soal untuk jenjang {{ $jenjang->name }} </legend>
		<div class="alert">Silahkan topik dengan cara memberikan ceklis pada topik di bawah ini. <br /> Bobot pada masing-masing topik ketika di total harus berjumlah 100 </div>
		{{ Form::open() }}
		<table class="table">
			<thead>
				<tr>
					<th>Nama Topik</th>
					<th>Batas Waktu Pengisian</th>
					<th>Bobot</th>
					<th>Checklist</th>
				</tr>
			</thead>
			<tbody>

				@foreach($topik as $u )
				
				<tr>
					<td>{{ $u->name }}</td>
					<td>
						{{ $u->given_time }} menit
						@if( ! empty($jawab[$u->id]['topik_id']))
							<input type="hidden" name="waktu[]" id="waktu_{{ $u->id}}" class="waktu" value="{{ $u->given_time }}"/>
						@else
							<input type="hidden" name="waktu[]" id="waktu_{{ $u->id}}" class="waktu" value=""/>
						@endif
					</td>
					@if( ! empty($jawab[$u->id]['bobot']))
						<td>{{ Form::text('bobot['.$u->id.']', $jawab[$u->id]['bobot'], array('class'=>'bobot span1', 'id' => 'bobot_'.$u->id)) }}</td>
					@else
						<td>{{ Form::text('bobot['.$u->id.']','',array('class'=>'bobot span1  uneditable-input', 'id' => 'bobot_'.$u->id, 'disabled'=> true)) }}</td>
					@endif


					@if( ! empty($jawab[$u->id]['topik_id']))
						<td>{{ Form::checkbox('topik_id[]', $u->id, true, array('id' => $u->id, 'class'=>'topik_id uneditable-input', 'data-value'=> $u->given_time )) }}</td>
					@else
						<td>{{ Form::checkbox('topik_id[]', $u->id,'',array('id' => $u->id, 'class'=>'topik_id uneditable-input', 'data-value'=>$u->given_time)) }}</td>
					@endif
					
				</tr>

				@endforeach

			</tbody>
			<tfoot>
				<tr>
					<th>Total</th>
					<th>{{ Form::text('waktu', $jenjang->given_time, array('class'=>'span1','id'=>'waktu', 'readonly'=> true)) }} menit</th>
					<th>{{ Form::text('total','',array('class'=>'span1','id'=>'total', 'readonly'=> true)) }}</th>
					<th></th>
				</tr>
			</tfoot>
		</table>

		<div class="form-actions">
			{{ Form::button('Simpan',array('class'=>'btn btn-primary','disabled' => true,'id'=>'simpan')) }}
		</div>

		{{ Form::close() }}
	@else

		<div class="alert">
			Data is empty
		</div>

	@endif

@endsection

@section('js')
	@parent
	<script>
		$(document).ready(function() {
			
			calculate();

			$('.topik_id').click(function(){
				if ($(this).attr('checked')) {
					$('#bobot_'+$(this).attr('id')).attr('disabled', false).removeClass('uneditable-input');
					$('#waktu_'+$(this).attr('id')).val($(this).attr('data-value'));
				}
				else {
					$('#bobot_'+$(this).attr('id')).attr('disabled', true).addClass('uneditable-input').val('');
					$('#waktu_'+$(this).attr('id')).val('');
				}
				calculate();
			});

			$('.bobot').blur(function(){
				calculate();
			})

		});

		function calculate() {
			var sum = waktu = 0;
		    $('.bobot').each(function() {
		        sum += Number($(this).val());
		    });

		    $('#total').val(sum);

		    $('.waktu').each(function() {
		        waktu += Number($(this).val());
		    });

		    $('#waktu').val(waktu);

		    if ( $('#total').val() == '100') {
		    	$('#simpan').attr('disabled',false);
		    }
		    else {
		    	$('#simpan').attr('disabled',true);
		    }
		}		
	</script>

@endsection