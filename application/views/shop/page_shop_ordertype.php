<?php
$categories_sub = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_GET[id]));
$category = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,array('id' => $_GET[sub]));
?>
<ol class="breadcrumb">
  <li class="head_title"><a href="<?=base_url(); ?>shop/data_shop_categorie" class="head_title">หมวดหมู่ทั้งหมด</a></li>
  <li class="head_title"><a href="<?=base_url(); ?>shop/categorie_sub?id=<?=$_GET[sub]; ?>" class="head_title">หมวดหมู่<?=$category->topic_th; ?></a></li>
  <li class="head_title_sub">ประเภท<?=$categories_sub->topic_th; ?></li>
  <li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
  <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
</ol>


<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body" style="padding-bottom: 0">
            <a href="<?=base_url(); ?>shop/categorie_sub?id=<?=$_GET[sub]; ?>"><button class="btn " ><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button></a>

            <a href="<?=base_url(); ?>shop/shop_manage?sub=<?=$_GET[id]; ?>&main=<?=$_GET[sub]; ?>&state=add">
              <button class="btn btn-success" data-toggle="modal" data-target="#formModal"><span><i class="fa fa-plus"></i> </span>เพิ่มสถานที่</button>
            </a>
          </div>

        </div>
        <div class="box-body table-responsive">
          <table class="table table-hover table-striped no-margin">
            <thead>
              <tr>
                <th width="50" height="25">#</th>
                <th width="50" align="center" >แก้ไข</th>
                <th width="60" align="center" ><font >สถานะ</font></th>
                
                <th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
                <th width="50" align="center" ><font >ลบ</font></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($shop_ordertype as $key => $val) {
                ?>
                <tr  id="tr_delete_typelist<?=$val->id;?>">
                  <td>#<?=$key + 1; ?></td>
                  <td>

                    <a href="<?=base_url(); ?>shop/shop_manage?sub=<?=$_GET[id]; ?>&main=<?=$_GET[sub]; ?>&id=<?=$val->id; ?>" class="text-primary">
                      <i class="fa fa-edit fa-lg" ></i>
                    </a>
                  </td>
                   <td align="center">

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
                    <span id="span_status<?=$val->id; ?>" onclick="updateStatusSHOP('<?=$val->id; ?>', '<?=$val->status; ?>', '<?=TBL_SHOPPING_PRODUCT; ?>')" class="<?=$s_class; ?>" style="cursor: pointer;"><?=$text_status; ?></span>
                  </td>




                  <td><span class="text-primary" ><?=$val->topic_th; ?></span> / <span ><?=$val->topic_en; ?></span> / <span class="text-success"><?=$val->topic_cn; ?></span></td>

  
                 
                  <td>
                    <!--<button onclick="firstDelete('<?=$val->topic_th; ?>/<?=$val->topic_en; ?>/<?=$val->topic_cn; ?>', '<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT; ?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></button>-->
                    <button onclick="func_openFormDel('<?=$val->id;?>', '<?=TBL_SHOPPING_PRODUCT;?>', '<?=$val->topic_th;?> / <?=$val->topic_en;?> / <?=$val->topic_cn;?>', 'tr_delete_typelist')"  type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModalBase"><i class="fa fa-trash-o"></i></button>
                  </td>

                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>
  </div>


