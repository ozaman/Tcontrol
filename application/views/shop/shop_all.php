<ol class="breadcrumb">
  <li class="head_title"><a class="head_title">จัดการร้านค้า</a></li>
  <li class="head_title_sub"><a class="head_title_sub">ร้านค่าทั้งหมด</a></li>
  <li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
  <li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
  <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
</ol>
<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body">
            <a href="<?=base_url(); ?>shop/shop_manage?state=add">
              <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><span><i class="fa fa-plus"></i> </span>เพิ่มสถานที่</button>
            </a>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-hover table-striped no-margin">
            <thead>
            <th  height="25">#</th>
            <th width="50" align="center">
              <font >จัดการ</font>     
            </th>
            <th height="30" align="center"><font >TH / EN / CN</font></th>
            <th width="120" align="center">หมวดหมู่</th>
            <th width="120" align="center">ประเภท</th>
            <th width="60" align="center"><font >สถานะ</font></th>
            <th width="50" align="center"><font >ลบ</font></th>
            </tr>
            </thead>
            <tbody>
              <?php
              foreach($shop as $key => $val) {
                $categories_sub = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $val->sub),array('topic_th'));
                $categories = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,array('id' => $val->main),array('topic_th'));
                ?>
                <tr>
                  <td><?=$key + 1; ?></td>
                  <td>
                    <a href="<?=base_url(); ?>shop/shop_manage?sub=<?=$val->sub; ?>&id=<?=$val->id; ?>" class="text-primary">
                      <i class="fa fa-edit fa-lg" ></i>
                    </a>
                  </td>
                  <td><span class="text-primary"><?=$val->topic_th; ?></span> / <span ><?=$val->topic_en; ?></span> / <span class="text-success"><?=$val->topic_cn; ?></span></td>
                  <td><a href="<?=base_url(); ?>shop/categorie_sub?id=<?=$val->main; ?>" class="head_title text-info"><?=$categories->topic_th; ?></a></td>
                  <td><a href="<?=base_url(); ?>shop/shop_ordertype?id=<?=$val->sub; ?>&sub=<?=$val->main; ?>" class="head_title text-info"><?=$categories_sub->topic_th; ?></a></td>

                  <td align="right" >
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
                    <span id="span_status<?=$val->id; ?>" onclick="updateStatus('<?=$val->id; ?>', '<?=$val->status; ?>', '<?=TBL_SHOPPING_PRODUCT; ?>')" class="<?=$s_class; ?>" style="cursor: pointer;"><?=$text_status; ?></span>
                  </td>
                  <td>
                    <button onclick="firstDelete('<?=$val->topic_th; ?>/<?=$val->topic_en; ?>/<?=$val->topic_cn; ?>', '<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT; ?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></button>
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