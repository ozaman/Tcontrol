<ol class="breadcrumb">
  <li class="head_title"><a class="head_title">หมวดหมู่ทั้งหมด</a></li>
  <li class="head_title_sub"></li>
  <li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
  <li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
  <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
</ol>

<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body" style="padding-bottom: 0px;">
            <button class="btn btn-success" onclick="func_openForm('', '<?=TBL_SHOPPING_PRODUCT_MAIN; ?>','เพิ่มหมวดหมู่');"><span><i class="fa fa-plus"></i> </span>เพิ่มหมวดหมู่</button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-hover table-striped no-margin">
            <thead>
              <tr>
                <th  height="25">#</th>
                <th width="50" align="center" >แก้ไข</th>
                <th width="130" align="center" >จัดการประเภท</th>
                <th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
 
                <th width="60" align="center" ><font >สถานะ</font></th>
                <th width="50" align="center" ><font >ลบ</font></th>
              </tr>

            </thead>
            <tbody>
              <?php
              foreach($categorie as $key => $val) {
                $count_sub = $this->Main_model->rows(TBL_SHOPPING_PRODUCT_SUB,array('main' => $val->id));
                ?>
                <tr>
                  <td><?=$key + 1; ?></td>
                  <td>
                    <a onclick="func_openForm('<?=$val->id;?>', '<?=TBL_SHOPPING_PRODUCT_MAIN; ?>','แก้ไขหมวดหมู่ :: <?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>');" class="btn text-primary">
                      <i class="fa fa-edit fa-lg" ></i>
                    </a>
                  </td>
                  <td>
                    <a href="<?=base_url(); ?>shop/categorie_sub?id=<?=$val->id; ?>" class="btn text-warning">
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
                    <span id="span_status<?=$val->id; ?>" onclick="updateStatus('<?=$val->id; ?>', '<?=$val->status; ?>', '<?=TBL_SHOPPING_PRODUCT_MAIN; ?>')" class="<?=$s_class; ?>" style="cursor: pointer;"><?=$text_status; ?></span>
                  </td>
                  <td>
                    <button onclick="func_openFormDelete( '<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT_MAIN; ?>','<?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></button>
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
    <!-- <span onclick="updateStatus($val->id,$val->status,'TBL_SHOPPING_PRODUCT_MAIN')" class="text-success" style="cursor: pointer;">เปิด</span> -->


