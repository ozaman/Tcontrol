<?php
$datas = $this->Main_model->fetch_data('','',$_POST[tbl],array('main' => $_POST['sub']),'',array('topic_th'=>'asc'));
?>
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
          <a style="cursor:pointer;" onclick="func_EditForm('<?=$val->id;?>', '<?=$val->topic_en;?>', '<?=$val->topic_th;?>', '<?=$val->topic_cn;?>');" class="text-primary">
            <i class="fa fa-edit fa-lg" ></i>
          </a>
        </td>
        <td><span class="text-primary"><?=$val->topic_th;?></span> / <span ><?=$val->topic_en;?></span> / <span class="text-success"><?=$val->topic_cn;?></span></td>
        <td>
          <button onclick="func_openFormDel('<?=$val->id;?>', '<?=$_POST[tbl];?>', '<?=$val->topic_th;?> / <?=$val->topic_en;?> / <?=$val->topic_cn;?>', 'tr_delete_typelist')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModalBase"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>

