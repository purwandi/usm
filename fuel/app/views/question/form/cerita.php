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
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

    });
</script>

<?php echo Form::open();?>
	
	<?php echo Form::area('','name',@$data->name, array('class'=>'span12','rows'=>15));?>
	<?php echo Form::hidden('mode',Input::get('mode'));?>
	
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <?php echo Html::anchor($module,'Cancel',array('class'=>'btn'));?>
	</div>

<?php echo Form::close();?>