<?php
$_where = array();
// echo $_GET[opt];
if ($_GET[opt] == 'all') {
  $_where['levelname'] = $_GET[type];
}
else{
  $_where['product_id'] = $_GET[id];
  // echo $_GET[id].'***************************';
}
         
        $_select = array('*');
         $_order = array();
            $_order['id'] = 'asc'; 
$arr[WEB_ADMIN] = $this->Main_model->fetch_data('','',TBL_WEB_ADMIN,$_where,$_select,$_order);
?>

<div class="box-body table-responsive">
          <table class="table table-hover table-striped no-margin">
            <thead>
              <tr>
                <th width="50" height="25">#</th>
                <th width="60" align="center" ><font >สถานะ</font></th>
                <!-- <th width="50" align="center" >แก้ไข</th> -->
                <th width="100" align="center" >ภาพ</th>
                <th width="130" align="center" >ชื่อผู้ใช้งาน</th>
                <th width="100" align="center" >รหัสผ่าน</th>
                <th width="100" align="center" >ชื่อ</th>
                <th width="100" align="center" >เบอร์โทร</th>
                <th width="100" align="center" >อีเมล์</th>
                
                <th width="150" align="center" >ชื่อบริษัท</th>
                
                
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($arr[WEB_ADMIN] as $key => $val) {
                $_where = array();
        $_where['id'] = $val->product_id;
        $_select = array('*');
        $SHOPPING_PRODUCT = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
                // $count_sub = $this->Main_model->rows(TBL_SHOPPING_PRODUCT,array('sub' => $val->id));
                // $count_type_list = $this->Main_model->rows(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,array('sub' => $val->id,'i_status'=>1));
                ?>
                <tr  id="tr_delete<?=$val->id; ?>">
                  <td><?=$key + 1; ?></td>
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
                 <!--  <td>
                    <a style="cursor:pointer;" onclick="//func_openForm('<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>', 'แก้ไขประเภท :: <?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>', '<?=$val->main; ?>');" class="text-primary">
                      <i class="fa fa-edit fa-lg" ></i>
                    </a>
                  </td> -->
                   <td><span>
                    <?php 
                      if (file_exists('../../data/pic/place/'.$SHOPPING_PRODUCT->pic_logo)) {
   $tag = '<span>ไม่มีรูป</span>';
} else {
    $tag = '<img id="img_logo_shop" src="../../data/pic/place/'.$SHOPPING_PRODUCT->pic_logo.'" alt="" style="cursor: pointer;width:100%;border-radius: 5px;" >';
}
 echo $tag;
                    ?>
                    </span>
                  </td>

                   <td><span><?=$val->username; ?></span></td>
                   <td><span><?=$val->password; ?></span></td>
                   <td><span><?=$val->name; ?></span></td>
                   <td><span><?=$val->phone; ?></span></td>
                   <td><span><?=$val->email; ?></span></td>
                   <td><span class="text-primary"><?=$SHOPPING_PRODUCT->topic_th; ?></span> / <span ><?=$SHOPPING_PRODUCT->topic_en; ?></span> / <span class="text-success"><?=$SHOPPING_PRODUCT->topic_cn; ?></span></td>




                 
                  
                  <!-- <td>
                    <button onclick="func_openFormDel('<?=$val->id; ?>', '<?=TBL_SHOPPING_PRODUCT_SUB; ?>', '<?=$val->topic_th; ?> / <?=$val->topic_en; ?> / <?=$val->topic_cn; ?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModalBase"><i class="fa fa-trash-o"></i></button>
                  </td> -->
                </tr>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div><!--end .box-body -->
      </div><!--end .box -->