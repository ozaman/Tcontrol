<div>
  <?php
  $num = 1;
  foreach ($planpack as $key => $val) {

    $_where = array();
    $_where[id] = $val->i_country;
    $this->db->select('name_en,name_th,country_code');
    $query = $this->db->get_where(TBL_WEB_COUNTRY,$_where);
    $country = $query->row();
//    print_r($country);

    $_where = array();
    $_where[i_plan_pack] = $val->id;
    $this->db->select('*');
    $query_list = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
    ?>
    <div class="row" style="padding: 5px;">
      <div class="col-md-10">
        <div class="form-group form-group-md">
          <div class="col-md-11">
            <div class="col-xs-1"><span class="btn btn-support3 btn-rounded btn-outline btn-equal"><?=$num++;?></span></div>
            <div class="col-md-2">
              <img class="img-region" src="<?=base_url();?>assets/img/flag/icon/<?=$country->country_code;?>.png" style="    margin-top: -5px;">
              <span style="font-size: 16px;padding-left: 5px;"><?=$country->name_th;?></span>
            </div>
            <div class="col-md-9">
              <?php
              foreach ($query_list->result() as $key2 => $val2) {
//                echo "<pre>";
//                print_r($val2);
//                echo "</pre>";
                
                $_where = array();
                $_where[id] = $val2->i_plan_main;
                $this->db->select('id,s_topic');
                $query_main = $this->db->get_where(TBL_PLAN_MAIN,$_where);
                $main = $query_main->row();

                $_where = array();
                $_where[id] = $val2->i_con_plan_main_list;
                $this->db->select('id,s_topic');
                $query_mainlist = $this->db->get_where(TBL_PLAN_MAIN_LIST,$_where);
                $mainlist = $query_mainlist->row();
                if($val2->i_con_plan_main_list>0){
                  $icon_btn_add = '<i class="fa fa-cogs" aria-hidden="true"></i>';
                  $txt_btn_add = $mainlist->s_topic;
                }else{
                  $icon_btn_add = '<i class="fa fa-plus" aria-hidden="true"></i>';
                  $txt_btn_add = 'เพิ่ม';
                }
                ?>
                <button class="btn btn-default" style="font-size: 14px;"><?=$main->s_topic." | ".$val2->i_plan_main;?></button>
                <button class="btn btn-primary" onclick="editCondition('<?=$val->id;?>', '<?=$val->s_topic;?>', '<?=$main->id;?>', '<?=$val->i_country;?>');">
                  <?=$icon_btn_add;?>
                  <span id="txt_mainlist_<?=$val->id;?>"><?=$txt_btn_add;?></span>
                </button>
              <?php }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
<!--        <button type="button" class="btn btn-success btn-md" onclick="edit_plan_pack('<?=$val->id;?>')">
          <span id="txt_btn_edit" style="font-size: 14px;"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
          </span>
        </button>-->
        <button type="button" class="btn btn-danger btn-md" onclick="del_plan_pack('<?=$val->id;?>', '<?=$partner_g;?>')">
          <span id="txt_btn_del" style="font-size: 14px;"> <i class="fa fa-trash-o" aria-hidden="true"></i> </span>
        </button>
      </div>
    </div>
  <?php }
  ?>
</div>