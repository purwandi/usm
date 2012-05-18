<?php echo Asset::js('tiny_mce/tiny_mce.js');?>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        // General options
		elements : "editor",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "formatselect,fontsizeselect,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,hr,removeformat,|,sub,sup,|,fullscreen,help",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "",

		theme_advanced_toolbar_location : "external",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true


    });
</script>
<h1>Question Form</h1>
<hr />
<?php echo Form::open(array('class'=>''));?>
	
	<?php echo Form::area('','name',@$data->name, array('class'=>'span12','rows'=>10));?><br />
	
	<table class="">
		<thead>
			<tr>
				<th>Answer</th>
				<th></th>
				<th>Ops</th>
			</tr>
		</thead>
		<tbody>
			<?php for($x = 1; $x<=5; $x++):?>
			<tr>
				<td>
					<?php if ($x == @$data->answer):?>
						<?php echo Form::radio('answer',$x, array('checked'=> 'checked'));?>
					<?php else:?>
						<?php echo Form::radio('answer',$x);?>
					<?php endif;?>
				</td>
				<td>&nbsp;</td>
				<td><?php echo Form::area('','ops_'.$x,@$data->{ops_.$x},array('class'=>'span10','rows'=>5));?></td>
			</tr>
			<?php endfor;?>
		</tbody>
	</table>
	<?php 
		if (Input::get('parent_id'))
		{
			echo  Form::hidden('parent_id',Input::get('parent_id'));
		}

		echo Form::hidden('mode',Input::get('mode'));

	?>
	
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <?php echo Html::anchor($module,'Cancel',array('class'=>'btn'));?>
	</div>

<?php echo Form::close();?>