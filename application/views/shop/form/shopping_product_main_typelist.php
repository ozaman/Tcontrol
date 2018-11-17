<?php
$data = $this->Main_model->rowdata($_POST[tbl],array('id'=>$_POST['id']));
$datas = $this->Main_model->fetch_data('','',$_POST[tbl],array(),$_select,$_order);
?>
<div class="box box-outlined">
  <div class="box-body table-responsive">
    <form class="form-horizontal"  id="DataFormAction" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label class="col-md-1 col-form-label" for="topic_en">สินค้า EN</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_en" type="text" name="topic_en" placeholder="สินค้า EN" value="<?=$data->topic_en;?>">
        </div>
 
        <label class="col-md-1 col-form-label" for="topic_th">สินค้า TH</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_th" type="text" name="topic_th" placeholder="สินค้า TH" value="<?=$data->topic_th;?>">
        </div>

        <label class="col-md-1 col-form-label" for="topic_cn">สินค้า CN</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_cn" type="text" name="topic_cn" placeholder="สินค้า CN" value="<?=$data->topic_cn;?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-9">
          <button class="btn btn-primary" type="button" onclick="func_SaveDataFormAction();"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
        </div>
      </div>
      <input type="hidden" name="main" id="main" value="<?=$_POST[id];?>" />
      <input type="hidden" name="id" id="id" value="" />
      <input type="hidden" name="tbl" id="tbl" value="<?=$_POST[tbl];?>" />
    </form>
  </div><!--end .box-body -->
</div><!--end .box -->
<br />
<div class="box box-outlined">
  <div class="box-body table-responsive" id="div_typelist">
    
  </div><!--end .box-body -->
</div><!--end .box -->

