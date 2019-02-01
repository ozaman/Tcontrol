<?php
//echo "<pre>";
//print_r($planpack);
//echo "</pre>";
$num = 1;
foreach ($planpack as $key => $val) {
  $_where = array();
  $_where[id] = $val->i_country;
  $this->db->select('name_en,name_th,country_code');
  $query = $this->db->get_where(TBL_WEB_COUNTRY,$_where);
  $country = $query->row();
  ?>
  <div class="form-group form-group-md">
    <div class="col-md-1">
      <div class="form-group form-group-md">
        <span class="btn btn-support3 btn-rounded btn-outline btn-equal"><?=$num++;?></span>
      </div>
    </div>
    <div class="col-md-11 ">
      <div class="col-md-3">
        <img style=" margin-top: -5px;" class="img-region" src="<?=base_url();?>assets/img/flag/icon/<?=$country->country_code;?>.png">&nbsp;
        <span style="font-size: 16px;m"><?=$country->name_th;?></span>
      </div>
      <div class="col-md-5" style="margin-top: 5px;">
        <span style="font-size: 16px;"><?=$val->s_topic;?></span>
      </div>
    </div>
  </div>
  

<?php }
?>