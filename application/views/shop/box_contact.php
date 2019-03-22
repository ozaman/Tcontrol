<?php 
            $_where = array();
            $_where['product_id'] = $_GET[id];
            // $_where['admintype'] = 2;
            $_select = array('*');
            $_order = array();
            $_order['id'] = 'asc';  
            $this->db->where('type<>','zello');
            $arr[SHOPPING_CONTACT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_CONTACT,$_where,$_select,$_order);
            // print_r(json_encode($arr[SHOPPING_CONTACT]));
            ?>
              <div class="form-group form-group-md">
                <div class="col-md-12">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped table-hover">
                      <thead bgcolor="#999999" style="color: #ffffff">
                        <tr>
                          <th>#</th>
                          <th>แก้ไข</th>
                          <th>สถานะ</th>
                          <th>ลบ</th>
                          <th>ชื่อ</th>
                          <th>เบอร์โทรศัพท์</th>
                          <th>ตำแหน่ง</th>
                          <!-- <th>หน้าที่</th> -->
                          <th>ยูเซอร์(T-share)</th>
                          <th>รหัสผ่าน(T-share)</th>


                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($arr[SHOPPING_CONTACT] as $key => $value){ 
                          $_where = array();
                          $_where['id'] = $value->usertype;
                          $_select = array('*');
                          $arr[CONTACT_TYPE] = $this->Main_model->rowdata(TBL_SHOPPING_CONTACT_TYPE,$_where,$_select);

                                                  $_where = array();
    $_where['i_user_contact'] = $value->id;
    $_select = array('*');
    $ABILITY_USER = $this->Main_model->rowdata(NEW_TBL_ABILITY_USER,$_where,$_select);
     $_where = array();
                          $_where['id'] = $ABILITY_USER->i_user_id;
                          $_select = array('username','password');
                          $WEB_DRIVER = $this->Main_model->rowdata(TBL_WEB_DRIVER,$_where,$_select);
                          ?>

                          <tr>
                            <td><?=$key+1;?></td>
                            <td height="30" >
                              <button type="button" onclick="edit_contact('<?=$value->id;?>')" class="btn btn-md btn-info btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="แก้ไข้"><i class="fa fa-pencil"></i></button>
                            </td>
                            <td >
                              <?php
                      if ($value->status == 0 ){
                        $text_status = 'ปิด';
                        $s_class = 'text-danger';
                      }
                      else{
                        $text_status = 'เปิด';
                        $s_class = 'text-success';
                      }
                      ?>
                      <span id="span_status<?=$value->id;?>" onclick="updateStatus('<?=$value->id;?>','<?=$value->status;?>','<?=TBL_SHOPPING_CONTACT;?>')" class="<?=$s_class;?>" style="cursor: pointer;"><?=$text_status;?></span>
                            </td>
                            <td >
                              <button type="button" class="btn btn-md btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" data-original-title="ลบ" onclick="firstDelete('<?=$value->name;?>','<?=$value->id;?>','<?=TBL_SHOPPING_CONTACT;?>')"><i class="fa fa-trash-o"></i></button>
                            </td>
                            <td >  
                             <?=$value->name;?> </td>
                             <td >

                              <?=$value->phone;?> 
                            </td>
                            <td > <?=$arr[CONTACT_TYPE]->name_th;?></td>
                  <!--           <td>
                              <div class="box-body no-padding">


                  
                  <div class="col-md-12 ">
                    <div style="background: #f2f2f2;padding: 10px;">
                      <div  data-toggle="buttons">
                        <?php
                        $where = array();
                        $this->db->select('*');
                        $where[i_from] = $admin->i_partner;
                        $partner_g = $this->db->get_where(TBL_PARTNER_GROUP,$where);
                        foreach ($partner_g->result() as $val) {

                          $where = array();
                          $this->db->select('s_topic,id');
                          $where[id] = $val->i_to;
                          $partner = $this->db->get_where(TBL_PARTNER,$where);
                          $partner = $partner->row();

                          $where = array();
                          $this->db->select('*');
                          $where[i_partner_group] = $val->id;
                          $where[i_shop] = $shop->id;
                          $partner_ctr = $this->db->get_where(TBL_PARTNER_CONTROL,$where);
                          $partner_ctr = $partner_ctr->row();
                          if ($partner_ctr == null) {
                            $set_value = 0;
                            $isactive = '';
                          }
                          else {
                            $set_value = $partner_ctr->i_status;
                            if ($set_value == 1) {
                              $set_value = 1;
                              $isactive = 'active';
                            }
                            else {
                              $set_value = 0;
                              $isactive = '';
                            }
                          }
                          ?>
                          <label class="btn btn-success btn-outline <?=$isactive;?>" id="l_<?=$partner->s_topic;?>">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="i_<?=$partner->s_topic;?>" value="<?=$set_value;?>" 
                                                       onchange="updatetype('<?=$_GET[id];?>', this.value, '<?=$partner->s_topic;?>', '<?=$partner_ctr->id;?>', '<?=$val->id;?>')" > 
                            <span style="text-transform:capitalize;"><?=$partner->s_topic;?></span>
                          </label>
                        <?php }?>
                      </div>
                    </div>

                  </div>
                </div>
                            </td> -->
                            <td align="center"><?=$WEB_DRIVER->username;?></td>
                            <td  align="center"><?=$WEB_DRIVER->password;?></td>
                          </tr>
                        <?php   } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>