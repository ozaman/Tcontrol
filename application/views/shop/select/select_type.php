<?php 
   $_where = array();
        $_where['main'] = $_GET[id_sub];
        // $_where['main'] = 1;
        $_select = array('*');
        $_order = array();
        $_order['topic_en'] = 'asc';
        $arr[sub] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
 ?>
<!-- <select id="select_type" class="form-control"  <?=$chk_disabled;?> > -->
                   <?php
                // print_r(json_encode($arr[main]));
                   foreach($arr[sub] as $key=>$sub){

                    if($shop->sub == $sub->id ){
                      $selected_sub = "selected";
                    }else{
                      $selected_sub = "";
                    }
                    ?>
                    <option value="<?=$sub->id;?>"  <?=$selected_sub;?> ><?=$sub->topic_th;?></option>
                  <?php } ?>

                <!-- </select> -->