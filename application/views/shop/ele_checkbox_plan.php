<?php
//print_r($_POST);
$_where = array();
$_where[id] = $_POST[i_partner_g];
$this->db->select('i_from, i_to');
$query_ifrom = $this->db->get_where(TBL_PARTNER_GROUP,$_where);
$ifrom = $query_ifrom->row();
//print_r($ifrom);
if ($_POST[i_partner_g] == 1) {
  $_where = array();
  $_where[i_status] = 1;
  $this->db->select('*');
  $query = $this->db->get_where(TBL_PLAN_MAIN,$_where);
  foreach ($query->result() as $val) {

    $this->db->select('t1.id, t1.s_topic, t2.id, t1.i_country');
    $this->db->from(TBL_PLAN_PACK." as t1");
    $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
    $this->db->where('t1.i_status',1);
    $this->db->where('t1.i_country',$_POST[i_country]);
    $this->db->where('t1.i_shop',$_POST[i_shop]);
    $this->db->where('t2.i_plan_main',$val->id);
    $this->db->where('t1.i_partner',$ifrom->i_from);
    $query = $this->db->get();
//    $data = $query->row();
    $numrow = $query->num_rows();
    if ($numrow <= 0) {
      $disabled = "";
      $txt_duplicate = "";
    }
    else {
      $disabled = "disabled";
      $txt_duplicate = "(มีแล้ว)";
    }
    ?>
    <div data-toggle="buttons">
      <label class="btn checkbox-inline btn-checkbox-default-inverse <?=$disabled;?>">
        <span style="font-size:15px;"><?=$val->s_topic;?> <?=$txt_duplicate;?>
        </span>
        <input  type="checkbox" value="<?=$val->id;?>" id="pack_<?=$val->id;?>" name="plan_pack[]" role="<?=$val->s_topic;?>"/> 
      </label>
    </div>
    <?php
  }
}
else {
  $_where = array();
  $_where[i_status] = 1;
  $_where[i_shop] = $_POST[i_shop];
  $_where[i_country] = $_POST[i_country];
  $_where[i_partner] = 2;

  $this->db->select('*');
//                  $this->db->group_by('user_id');
  $query = $this->db->get_where(TBL_PLAN_PACK,$_where);
//                  echo "<pre>";
//                  print_r($query->result());
//                  echo "</pre>";
  foreach ($query->result() as $val) {
    ?>
    <div data-toggle="buttons">
      <label class="btn checkbox-inline btn-checkbox-default-inverse "><?=$val->s_topic;?>
        <input type="checkbox" value="<?=$val->id;?>" id="pack_<?=$val->id;?>" name="plan_pack[]" <?=$chk_withholding;?> role="<?=$val->s_topic;?>" > </label>
    </div>
    <?php
  }
}
?>