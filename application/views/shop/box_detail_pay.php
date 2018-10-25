	<?php 
	$_where = array();
	$_where['i_shop'] = $_POST[id];
	$_select = array('*');
	$DETAIL_PAY = $this->Main_model->rowdata(TBL_SHOP_DETAIL_PAY,$_where,$_select);
	// print_r($DETAIL_PAY);

	?>
	<script >
		var myCustomTemplates = {
  custom1: function(context) {
    return '<?=$DETAIL_PAY->s_masage;?>';
  }
};
		var editor = new wysihtml5.Editor("wysiwyg", {
			
          toolbar: "toolbar",
          parserRules: wysihtml5ParserRules,
     	});
		console.log(editor)
		boostbox.App.monitorWysihtml5(editor);

        // $( '#wysiwyg' ).ckeditor();
        // $("#some-textarea").wysihtml5();
// var editorObj = $("#wysiwyg").data('wysihtml5');
// editor = editorObj.editor;
editor.setValue('<?=$DETAIL_PAY->s_masage;?>');
// $("#wysiwyg").wysihtml5();
// $('#wysiwyg').html('<?=$DETAIL_PAY->s_masage;?>');
</script>
<div class="section-body">

	<!-- START WYSIHTML5 EDITOR -->
	<div class="row">
		<div class="col-lg-12">
			<div class="box style-body">
				<div class="box-head">
					<header><h4 class="text-light"><strong> ข้อความเตือน การโอนเงิน</strong></h4></header>
				</div>
				<div class="box-body">
					<form class="form-horizontal form-banded form-bordered" id="form_detail_pay" method="post">
						<div id="toolbar" class="wysihtml5-toolbar" style="display: none;">
							<div class="btn-group">
								<a class="btn btn-default btn-equal" data-wysihtml5-command="bold" title="CTRL+B"><i class="fa fa-bold"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="italic" title="CTRL+I"><i class="fa fa-italic"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="underline" title="CTRL+u"><i class="fa fa-underline"></i></a>
							</div>
							<div class="btn-group">
								<a class="btn btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1"><strong>H1</strong></a>
								<a class="btn btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2"><strong>H2</strong></a>
							</div>
							<div class="btn-group">
								<a class="btn btn-default btn-equal" data-wysihtml5-command="justifyLeft"><i class="fa fa-align-left"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="justifyCenter"><i class="fa fa-align-center"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="justifyRight"><i class="fa fa-align-right"></i></a>
							</div>
							<div class="btn-group">
								<a class="btn btn-default btn-equal" data-wysihtml5-command="insertUnorderedList"><i class="fa fa-list-ul"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="insertOrderedList"><i class="fa fa-list-ol"></i></a>
							</div>
							<div class="btn-group">
								<a class="btn btn-default btn-equal" data-wysihtml5-command="createLink"><i class="fa fa-link"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="insertImage"><i class="fa fa-picture-o"></i></a>
							</div>
							<div class="btn-group">
								<a class="btn btn-default btn-equal" data-wysihtml5-command="undo"><i class="fa fa-undo"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="redo"><i class="fa fa-repeat"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-command="insertSpeech"><i class="fa fa-microphone"></i></a>
								<a class="btn btn-default btn-equal" data-wysihtml5-action="change_view"><i class="fa fa-code"></i></a>
							</div>
							<div class="panel-bar">
								<div data-wysihtml5-dialog="createLink" style="display: none;">
									<div class="form-inline">
										<label>Link:</label>
										<input class="form-control control-width-normal" data-wysihtml5-dialog-field="href" value="http://">

										<a class="btn btn-primary" data-wysihtml5-dialog-action="save">OK</a>&nbsp;
										<a class="btn btn-default" data-wysihtml5-dialog-action="cancel">Cancel</a>
									</div>
								</div>
								<div data-wysihtml5-dialog="insertImage" style="display: none;">
									<div class="form-inline">
										<label>Image:</label>
										<input class="form-control control-width-normal" data-wysihtml5-dialog-field="src" value="http://">
										<label>Align:</label>
										<select class="form-control control-width-small" data-wysihtml5-dialog-field="className">
											<option value="">default</option>
											<option value="wysiwyg-float-left">left</option>
											<option value="wysiwyg-float-right">right</option>
										</select>
										<a class="btn btn-primary" data-wysihtml5-dialog-action="save">OK</a>&nbsp;
										<a class="btn btn-default" data-wysihtml5-dialog-action="cancel">Cancel</a>
									</div>
								</div>
							</div><!--end .panel-bar -->
						</div><!--end #wysihtml5-toolbar -->
						<input type="hidden" name="i_shop" value="<?=$_POST[id];?>">
						<textarea id="wysiwyg" name="s_masage" class="form-control control-12-rows" placeholder="กรุณาป้อนรายละเอียด" spellcheck="false" value="<?=$DETAIL_PAY->s_masage;?>">

						</textarea>
						<button type="button" class="btn btn-primary btn-md pull-right" onclick="_submit_detail_pay('<?=$_POST[id];?>')" style="margin-top: 20px">
							<span id="txt_btn_save"> บันทุึก </span>
						</button>
						<div>

						</div>
					</form>
				</div><!--end .box-body -->
			</div><!--end .box -->
		</div><!--end .col-lg-12 -->
	</div><!--end .row -->
	<!-- END WYSIHTML5 EDITOR -->



	</div><!--end .section-body -->