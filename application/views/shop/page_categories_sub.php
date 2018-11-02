<?php
$category = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,array('id' => $_GET[id]));
?>
<ol class="breadcrumb">
  <li class="head_title"><a href="<?=base_url(); ?>shop/data_shop_categorie" class="head_title">หมวดหมู่ทั้งหมด</a></li>
  <li class="head_title_sub">หมวดหมู่<?=$category->topic_th; ?> </li>
 
</ol>
<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body" style="padding-bottom: 0">
            <a href="<?=base_url(); ?>shop/data_shop_categorie"><button class="btn " ><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button></a>
            <button class="btn btn-success" onclick="func_openForm('', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>', 'หมวดหมู่ :: <?=$category->topic_th; ?> >> เพิ่มประเภท',<?=$_GET[id]; ?>);"><span><i class="fa fa-plus"></i> </span>เพิ่มประเภท</button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-hover table-striped no-margin">
            <thead>
              <tr>
                <th width="50" height="25">#</th>
                <th width="50" align="center" >แก้ไข</th>
                <th width="130" align="center" >จัดการสถานที่</th>
                <th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
                <th width="60" align="center" ><font >สถานะ</font></th>
                <th width="50" align="center" ><font >ลบ</font></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($categorie_bub as $key => $val) {
                $count_sub = $this->Main_model->rows(TBL_SHOPPING_PRODUCT,array('sub' => $val->id));
                ?>
                <tr  id="tr_delete<?=$val->id; ?>">
                  <td><?=$key + 1; ?></td>
                  <td>
                    <a style="cursor:pointer;" onclick="func_openForm('<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>', 'แก้ไขประเภท :: <?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>', '<?=$val->main; ?>');" class="text-primary">
                      <i class="fa fa-edit fa-lg" ></i>
                    </a>
                  </td>
                  <td>
                    <a style="cursor:pointer;" href="<?=base_url(); ?>shop/shop_ordertype?sub=<?=$_GET[id]; ?>&id=<?=$val->id; ?>"  class="text-warning">
                      <i class="fa fa-gears fa-lg" ></i> [<?=$count_sub; ?>]
                    </a>
                  </td>
                  <td><span class="text-primary"><?=$val->topic_th; ?></span> / <span ><?=$val->topic_en; ?></span> / <span class="text-success"><?=$val->topic_cn; ?></span></td>
                  <td>
                    <?php
                    if($val->status == 0) {
                      $text_status = 'ปิด';
                      $s_class = 'text-danger';
                    }
                    else {
                      $text_status = 'เปิด';
                      $s_class = 'text-success';
                    }
                    ?>
                    <span id="span_status<?=$val->id; ?>" onclick="updateStatus('<?=$val->id; ?>', '<?=$val->status; ?>', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>')" class="<?=$s_class; ?>" style="cursor: pointer;"><?=$text_status; ?></span>
                  </td>
                  <td>
                    <button onclick="func_openFormDel('<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>', '<?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModalBase"><i class="fa fa-trash-o"></i></button>
                  </td>
                </tr>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>