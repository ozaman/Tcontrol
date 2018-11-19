<?php 
$_where = array();
$_where['product_id'] = $_GET[id];
$_where['product_day'] = 'Mon';
$_select = array('*');  


$arr[open_mon] = $this->Main_model->rowdata(TBL_SHOPPING_OPEN_TIME,$_where,$_select);
$day = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
for($i=1;$i<=24;$i++){
  $invID = str_pad($i, 2, '0', STR_PAD_LEFT);
  $hour[] = $invID;
}
for($i=0;$i<=11;$i++){
  $cal = $i*5;
  $invID = str_pad($cal, 2, '0', STR_PAD_LEFT);
  $time[] = $invID;
}

?>
<table width="100%">
  <tr>
    <td><strong>เวลาทำการ A :</strong></td>

    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="60">เปิด</td>
            <td width="140">
              <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default" id="hour_open_default">
                <?php
                
                foreach($hour as $val){

                  if($arr[open_mon]->start_h == $val ){
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }
                  ?>
                  <option    <?=$selected;?> value="<?=$val;?>"><?=$val;?></option>
                <?php } ?>
              </select> .

              <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default" id="time_open_default">
                <?php foreach($time as $value){ 
                  if($arr[open_mon]->start_m ==$value){
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }?>

                  <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                <?php   } ?> 
              </select> น.</td>
              <td width="50">ปิด&nbsp;</td>
              <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default" id="hour_close_default">
                <?php foreach($hour as $value){ 
                  if($arr[open_mon]->finish_h==$value){
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }?>

                  <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                <?php   } ?> 
              </select> .
              <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default" id="time_close_default">
                <?php foreach($time as $value){ 
                  if($arr[open_mon]->finish_m==$value){
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }?>

                  <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                <?php   } ?> 
              </select> น.</td>
              <td align="right" onclick="default_time()"><button type="button" class="btn btn-md btn-info" id="default_time" ><strong>ค่าเริ่มต้น</strong></button></td>
            </tr>
          </tbody>
        </table>
      </td>

    </tr>
    <?php 
    $_where = array();
    $_where['product_id'] = $_GET[id];
    $_where['status'] = 1;
    $_where['time_other_number'] = 2;
    
   
    

    $num_time_other = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);

    if($num_time_other>=7){
      $checked_other_all_tik = 'active"';
      $checked_other_all = 'checked="checked"';
      $display_none_other_all = '';
    }else{
      $checked_other_all_tik = '"';

      $checked_other_all = '';
      $display_none_other_all = 'display: none;';
    }
    ?>


    <tr>
      <td>
        <label for="time_other_all" style=" margin-bottom: -3px;">แสดงเวลาทำการ B  :</label>
      </td>
      <td> 
        <div data-toggle="buttons" onclick="time_other_all()">
          <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$checked_other_all_tik;?>">
            <input type="checkbox" <?=$checked_other_all;?>  value="1" id="time_other_all" name="time_other_all"  /></label>
          </div> 

        </td>
      </tr>          
      <tr id="row_time_other" style="<?=$display_none_other_all;?>">
        <td><strong>เวลาทำการ B :</strong></td>

        <td style="display: nones;">
          <table width="100%" >
            <tbody>
              <tr>
                <td width="60">เปิด</td>
                <td width="140">
                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default_other" id="hour_open_default_other">
                  <?php foreach($hour as $value){ 
                    if($arr[open_mon]->start_h==$value){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                    ?>  
                    <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  <?php   } ?> 
                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default_other" id="time_open_default_other">
                  <?php foreach($time as $value){ 
                    if($arr[open_mon]->start_m==$value){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }?>

                    <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  <?php   } ?> 
                </select> น.</td>
                <td width="50">ปิด&nbsp;</td>
                <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default_other" id="hour_close_default_other">
                  <?php foreach($hour as $value){ 
                    if($arr[open_mon]->finish_h==$value){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }?>

                    <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  <?php   } ?> 
                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default_other" id="time_close_default_other">
                  <?php foreach($time as $value){ 
                    if($arr[open_mon]->finish_m==$value){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }?>

                    <option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  <?php   } ?> 
                </select> น.</td>
                <td align="right" onclick="default_time_other()"><button type="button" class="btn btn-md btn-warning" id="default_time_other"><strong>ค่าเริ่มต้น</strong></button></td>
              </tr>
            </tbody>
          </table>
        </td>

      </tr>
      <tr>
        <?php

        $_where = array();
        $_where['product_id'] = $_GET[id];
        $_where['status'] = 1;
        $_where['time_other_number'] = 1;
        $_select = array('*');


        $num_day = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);
       //print_r(json_encode($num_day));
       // print_r(json_encode($num_day));
       // echo count($num_day);
        if($num_day>=7){
          $checked =  'checked="checked';
          $checkedative =  'active';
        }
        $_where = array();
        $_where['product_id'] = $_GET[id];
        $_where['status'] = 1;
        $_where['open_always'] = 1;
        


        $num_alway_all = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);
         //echo count($num_alway_all);
        if($num_alway_all>=7){
          $checked_all_alway = 'checked="checked"';
          $checkedative_all_alway =  'active';
        }
        ?>

        <td colspan="2"> 
          <table width="100%" >

            <tr>
              <td width="14%"><label style="margin-bottom: -3px;" for="open_time_all">24 ชม. ทุกวัน</label> </td>
              <td width="5%" >
                <div data-toggle="buttons" onclick="open_time_all()">
                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$checkedative_all_alway;?>">
                    <input type="checkbox" name="open_time_all" id="open_time_all"  <?=$checked_all_alway;?> /></label>
                  </div>

                </td>
                <td width="14%"><label style="margin-bottom: -3px;" for="open_all">เปิดทุกวัน</label> </td>
                <td >
                  <div data-toggle="buttons" onclick="open_all()">
                    <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$checkedative;?>">
                      <input type="checkbox" name="open_all" id="open_all"  <?=$checked;?>/></label>
                    </div>

                  </td>
                </tr>
              </table>          
              <?php foreach ($day as $value_d) { 
                // echo $value_d;
                $_where = array();
                $_where['product_id'] = $_GET[id];
                $_where['product_day'] = $value_d;

                $_select = array('*');



                $query_day_dt = $this->Main_model->rowdata(TBL_SHOPPING_OPEN_TIME,$_where,$_select);
                  // print_r(json_encode($query_day_dt));
                  // echo $query_day_dt->status;
                if($query_day_dt->status == 1){
                  $status_open = 'active';
                  $status_open_tik = 'checked="checked"';

                  $disabled_open = '';
                  $disabled_color_open = '';
                }else{
                  $status_open_tik = '';
                  $status_open = '';
                  $disabled_open = 'disabled="disabled"';
                  $disabled_color_open = 'background-color : #ddd;';
                }
                if($query_day_dt->open_always == 1){
                  $status_open_24h = 'checked="checked"';
                  $status_open_24h_tik = 'active"';
                  $disabled = 'disabled="disabled"';
                  $disabled_color = 'background-color : #ddd;';
                  $value_alway_hour_open = '24';
                  $value_alway_hour_close = '24';

                }else{
                  $status_open_24h_tik = '';

                  $status_open_24h = '';
                  $disabled = '';
                  $disabled_color = '';
                  $value_alway_hour_open = $query_day_dt->start_h;
                  $value_alway_hour_close = $query_day_dt->finish_h;
                }
                ?>
                <table width="100%"  style="margin-top: 25px;" >
                  <tr>
                    <td  width="14%"><label for="open_alway_<?=$value_d;?>" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
                    <td>

                      <div data-toggle="buttons">
                        <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$status_open_24h_tik;?>">
                          <input type="checkbox"  name="open_alway_<?=$value_d;?>" id="open_alway_<?=$value_d;?>"  value="1" onclick="//eachOpenAlway('<?=$value_d;?>');"  <?=$status_open_24h;?> /></label>
                        </div>

                        <!-- <input type="checkbox" <?=$status_open_24h;?>  style="width: 20px;"/> -->
                      </td>
                      <td width="16%" align="center"><label for="<?=$value_d;?>" style=" margin-bottom: -3px;"><?=$value_d;?></label></td>
                      <td width="5%">
                        <div data-toggle="buttons">
                          <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$status_open;?>">
                            <input name="<?=$value_d;?>" onclick="//closeDay('<?=$value_d;?>');" id="<?=$value_d;?>" type="checkbox" class="checkbox-plan"  value="1" <?=$status_open_tik;?>/>
                          </label>
                        </div>

                      </td>
                      <td width="5%" align="center"><strong>A</strong></td>
                      <td>เปิด</td>
                      <td>
                       <select <?=$disabled_open;?>  <?=$disabled;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>" id="hour_open_<?=$value_d;?>">
                        <?php foreach($hour as $value){ 
                          if($value_alway_hour_open==$value){
                            $selected = 'selected';
                          }else{
                            $selected = '';
                          }
                          ?>
                          <option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                        <?php   } ?> 
                      </select> .
                      <select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>" id="time_open_<?=$value_d;?>">
                        <? foreach($time as $value){ 
                          if($query_day_dt->start_m==$value){
                            $selected = 'selected';
                          }else{
                            $selected = '';
                          }
                          ?>
                          <option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                        <?php   } ?> 
                      </select> น.
                    </td>
                    <td>ปิด</td>
                    <td>
                     <select <?=$disabled;?> <?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>" id="hour_close_<?=$value_d;?>">
                      <?php foreach($hour as $value){ 
                        if($value_alway_hour_close==$value){
                          $selected = 'selected';
                        }else{
                          $selected = '';
                        } ?>

                        <option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                      <?php  } ?> 
                    </select> .
                    <select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>" id="time_close_<?=$value_d;?>">
                      <?php foreach($time as $value){ 
                        if($query_day_dt->finish_m==$value){
                          $selected = 'selected';
                        }else{
                          $selected = '';
                        }?>

                        <option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                      <?php   } ?> 
                    </select> น.
                  </td>
                  <td><label for="time_other_<?=$value_d;?>" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>

                  <?php
                  $_where = array();
                  $_where['product_id'] = $_GET[id];
                  $_where['product_day'] = $value_d;

                  $_where['time_other_number'] = 2;
                  $_where['status'] = 1;

                 


                  $check_other_time = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);

                  if($check_other_time<=0){
                    $display = 'display: none;';
                    $checked_time_other = '';
                    $checked_time_other_chek = '';

                  }else{
                    $display = '';
                    $checked_time_other = 'active';
                    $checked_time_other_chek = 'checked="checked"';
                  }


                  $_where = array();
                  $_where['product_id'] = $_GET[id];
                  $_where['product_day'] = $value_d;

                  $_where['time_other_number'] = 2;
                  $_where['status'] = 1;

                  $_select = array('*');



                  $query_timeother_show = $this->Main_model->rowdata(TBL_SHOPPING_OPEN_TIME,$_where,$_select);

                  ?>

                  <td>
                    <div data-toggle="buttons" id="time_other_tik" onclick="timeOther('<?=$value_d;?>');">
                      <label class="btn checkbox-inline btn-checkbox-success-inverse  <?=$checked_time_other;?>">
                        <input <?=$checked_time_other_chek;?> " type="checkbox" value="1" id="time_other_<?=$value_d;?>" name="time_other_<?=$value_d;?>"  />
                      </label>
                    </div>
                    <!-- <input   style="width: 20px;"/> -->
                  </td>
                </tr>
                <tr id="other_time_<?=$value_d;?>" style="<?=$display;?>">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
                  <td bgcolor="#FDFAD5">เปิด</td>
                  <td bgcolor="#FDFAD5">

                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>_2" id="hour_open_<?=$value_d;?>_2">
                    <?php foreach($hour as $value){ 
                      if($query_timeother_show->start_h==$value){
                        $selected = 'selected';
                      }else{
                        $selected = '';
                      }
                      ?>
                      <option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                    <?php   } ?> 
                  </select> .
                  <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>_2" id="time_open_<?=$value_d;?>_2">
                    <?php foreach($time as $value){ 
                      if($query_timeother_show->start_m==$value){
                        $selected = 'selected';
                      }else{
                        $selected = '';
                      }
                      ?>
                      <option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                    <?php   } ?> 
                  </select> น.
                </td>
                <td bgcolor="#FDFAD5">ปิด</td>
                <td bgcolor="#FDFAD5">
                 <select  style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>_2" id="hour_close_<?=$value_d;?>_2">
                  <?php foreach($hour as $value){ 
                    if($query_timeother_show->finish_h==$value){
                      $selected = 'selected';
                    }else{
                      $selected = '';
                    } ?>

                    <option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  <?php   } ?> 
                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>_2" id="time_close_<?=$value_d;?>_2">
                  <?php foreach($time as $value){ 
                    if($query_timeother_show->finish_m==$value){
                      $selected = 'selected';
                    }else{
                      $selected = '';
                    }?>

                    <option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  <?php   } ?> 
                </select> น.
              </td>
            </tr>
          </table>



        <? }?>
        <script>


        </script>
      </td>
    </tr>
  </table>
  <script type="text/javascript">
     day = '<?=json_encode($day);?>';
          //      var obj_day = jQuery.parseJSON( day );
               obj_day = JSON.parse( day );
  </script>