<?php
$data = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_POST['id']));
$_POST[tbl];
$datas = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('main' => $data->main),'',array('topic_th' => 'asc'));
?>
<div class="box box-outlined">
  <div class="box-body table-responsive" id="div_typelist">
    <table class="table table-hover table-striped no-margin" id="table_typelist">
      <thead>
        <tr>
          <th width="50" height="25">#</th>
          <th width="100" align="center" >ใช้งาน</th>
          <th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($datas as $key => $val) {
          $sub_type_list = $this->Main_model->rows(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,array('i_main_typelist' => $val->id,'main' => $data->main,'sub' => $data->id,'i_status'=>1));
          $chk_box = ($sub_type_list == 1) ? 'checked' : '';
          $chk_box_active = ($sub_type_list == 1) ? 'active' : '';
          ?>
          <tr  id="tr_delete_typelist<?=$val->id;?>">
            <td><?=$key + 1;?></td>
            <td>
              <div data-toggle="buttons"  onclick="func_UpdateSubTypelist('<?=$val->id;?>', '<?=$data->main;?>', '<?=$data->id;?>','<?=$sub_type_list;?>');">
                <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> "> ใช้งาน
                  <input type="checkbox" value="1" id="i_withholding<?=$val->id;?>" name="i_withholding<?=$val->id;?>" <?=$chk_box;?>> </label>
              </div>
            </td>
            <td><span class="text-primary"><?=$val->topic_th;?></span> / <span ><?=$val->topic_en;?></span> / <span class="text-success"><?=$val->topic_cn;?></span></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div><!--end .box-body -->
</div><!--end .box -->

