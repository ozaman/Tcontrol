<?php
$data = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_POST['id']));
$datas = $this->Main_model->fetch_data('','',$_POST[tbl],array('sub'=>$_POST['id']),'','');
?>
<div class="box box-outlined">
  <div class="box-body table-responsive">
    <form class="form-horizontal"  id="DataFormAction" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label class="col-md-1 col-form-label" for="topic_en">สินค้า EN</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_en" type="text" name="topic_en" placeholder="สินค้า EN" value="">
        </div>

        <label class="col-md-1 col-form-label" for="topic_th">สินค้า TH</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_th" type="text" name="topic_th" placeholder="สินค้า TH" value="">
        </div>

        <label class="col-md-1 col-form-label" for="topic_cn">สินค้า CN</label>
        <div class="col-md-3">
          <input class="form-control" id="topic_cn" type="text" name="topic_cn" placeholder="สินค้า CN" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-9">
          
          <button class="btn btn-primary" type="button" onclick="func_SaveDataFormActionTypeList('<?=$data->id;?>','<?=$_POST[tbl];?>');"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
          <button class="btn btn-danger" type="button" onclick="func_CancelForm();"><i class="fa fa-times"></i> ยกเลิก</button>
        </div>
      </div>
      <input type="hidden" name="sub" id="sub" value="<?=$data->id;?>" />
      <input type="hidden" name="main" id="main" value="<?=$data->main;?>" />
      <input type="hidden" name="id" id="id" value="" />
      <input type="hidden" name="tbl" id="tbl" value="<?=$_POST[tbl];?>" />
    </form>
  </div><!--end .box-body -->
</div><!--end .box -->
<br />
<div class="box box-outlined">
  <div class="box-body table-responsive" id="div_typelist">
    <table class="table table-hover table-striped no-margin" id="table_typelist">
      <thead>
        <tr>
          <th width="50" height="25">#</th>
          <th width="50" align="center" >แก้ไข</th>
          <th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
          <th width="50" align="center" ><font >ลบ</font></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($datas as $key => $val) {
          ?>
          <tr  id="tr_delete_typelist<?=$val->id;?>">
            <td><?=$key + 1;?></td>
            <td>
              <a style="cursor:pointer;" onclick="func_EditForm('<?=$val->id;?>','<?=$val->topic_en;?>', '<?=$val->topic_th;?>','<?=$val->topic_cn;?>');" class="text-primary">
                <i class="fa fa-edit fa-lg" ></i>
              </a>
            </td>
            <td><span class="text-primary"><?=$val->topic_th;?></span> / <span ><?=$val->topic_en;?></span> / <span class="text-success"><?=$val->topic_cn;?></span></td>
            <td>
              <button onclick="func_openFormDel('<?=$val->id;?>', '<?=$_POST[tbl];?>', '<?=$val->topic_th;?> / <?=$val->topic_en;?> / <?=$val->topic_cn;?>','tr_delete_typelist')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModalBase"><i class="fa fa-trash-o"></i></button>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div><!--end .box-body -->
</div><!--end .box -->

