<h3 style="margin-top: 0;padding-left:30px;padding-top: 5px;"> <?=count($order);?> รายการ </h3>
<?php
foreach ($order as $val) {
  $query_place = $this->db->query("select topic_th from shopping_product where id = ".$val->program);
  $row_place = $query_place->row();

  $query_dv = $this->db->query("select username from web_driver where id = ".$val->drivername);
  $row_dv = $query_dv->row();

  $sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$val->plan_id."'    ";
  $query_country = $this->db->query($sql_country);
  $res_country = $query_country->row();
  ?>
  <div onclick="openBook('<?=$val->id;?>', '<?=$val->invoice;?>');" style="border: 1px solid #ccc;padding: 10px 15px;cursor: pointer;">
    <!-- <a class="tile-content ink-reaction pd-top-bottom" href="invoice.php?order=70" target="_blank" >-->
    <table width="100%">
      <tbody>
        <tr>
          <td width="170">
            <div class="tile-text">
              <b class="txt_pay" role="" data="70"></b><br>
              <b style="font-size: 18px;"><?=$val->invoice;?></b><br>
              <b  style="font-size: 16px;">
                คิงส์ พาวเวอร์ (ภูเก็ต)<br>
              </b>
              <span>2018-11-02</span>
            </div>
          </td>
          <td>
            <table width="100%" border="0" cellspacing="4" cellpadding="2" class="div-all-booking">
              <tbody>
                <tr>
                  <td width="150" rowspan="6" valign="top">
                    <img src="../../data/pic/driver/small/<?=$row_dv->username;?>.jpg?v=<?=time();?>" width="100" class="img-pic" style="margin-top:5px;border-radius:5px;" border="0">   	
                  </td>
                  <td width="120"><strong>จำนวนแขก</strong></td>
                  <td>ผู้ใหญ่ : <?=$val->adult;?> เด็ก : <?=$val->child;?>                                                </td>
                </tr>
                <tr>
                  <td><strong>สัญชาติ</strong></td>
                  <td>
                    <table>
                      <tr>
                        <td>
                          <img src="<?=base_url();?>assets/img/flag/icon/<?=$res_country->s_country_code;?>.png" width="20" height="20" alt="">
                        </td>
                        <td>&nbsp;</td>
                        <td valign="bottom"><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td><strong>ลงทะเบียนสำเร็จ</strong></td>
                  <td>
                    <?=$val->pax_regis;?>  คน                                               
                  </td>
                </tr>
                <tr>
                  <td><strong>คนขับรถ</strong></td>
                  <td class="font-22">ชื่อ - นามสกุล (โชค)                           						</td>
                </tr>
                <tr>
                  <td><strong>เบอร์โทรศัพท์</strong></td>
                  <td class="font-22">
                    <?=$val->phone;?>
                  </td>
                </tr>
                <tr>
                  <td><strong>ทะเบียน</strong></td>
                  <td><?=$val->car_plate;?></td>
                </tr>
              </tbody>
            </table>
          </td>
          <!--<td>
             <div class="box-code">
                <table>
                   <tbody>
                      <tr>
                         <td width="40">Code:</td>
                         <td>
                            <div class="btn-raised" style="border: 1px solid #eee; background: #eee; font-weight: 600; padding: 3px 7px;cursor: pointer;" onclick="showImgModal('1','70');"></div>
                         </td>
                      </tr>
                   </tbody>
                </table>
             </div>
             <div>
                <img src="../../data/pic/place/1_logo.jpg" width="150px" alt="" class="img_place">			                           
             </div>
          </td>-->
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}
?>