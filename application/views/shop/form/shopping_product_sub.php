<?php
$data = $this->Main_model->rowdata($_POST[tbl],array('id'=>$_POST['id']));
$categories = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN);
//echo json_encode($_POST);
?>
<div class="box box-outlined">
  <div class="box-body table-responsive">
    <form class="form-horizontal"  id="DataFormAction" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label class="col-md-2 col-form-label" for="i_main">หมวดหมู่</label>
        <div class="col-md-9">
 
          <select id="i_main" name="i_main" class="form-control">
            <?php
          foreach($categories as $dataM){
            ?>
            <option value="<?=$dataM->id;?>" <?=$this->Main_model->select_option($dataM->id,$_POST[i_main]);?>><?=$dataM->topic_th;?></option>
          <?php
          }
          ?>
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label" for="topic_en">ประเภท EN</label>
        <div class="col-md-9">
          <input class="form-control" id="topic_en" type="text" name="topic_en" placeholder="ประเภท EN" value="<?=$data->topic_en;?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label" for="topic_th">ประเภท TH</label>
        <div class="col-md-9">
          <input class="form-control" id="topic_th" type="text" name="topic_th" placeholder="ประเภท TH" value="<?=$data->topic_th;?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label" for="topic_cn">ประเภท CN</label>
        <div class="col-md-9">
          <input class="form-control" id="topic_cn" type="text" name="topic_cn" placeholder="ประเภท CN" value="<?=$data->topic_cn;?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label" for=""></label>
        <div class="col-md-9">
          <button class="btn btn-primary" type="button" onclick="func_SaveDataFormAction();"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
        </div>
      </div>
      <input type="hidden" name="id" id="id" value="<?=$_POST[id];?>" />
      <input type="hidden" name="tbl" id="tbl" value="<?=$_POST[tbl];?>" />
    </form>
  </div><!--end .box-body -->
</div><!--end .box -->
