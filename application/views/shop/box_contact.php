<?php 
            $_where = array();
            $_where['product_id'] = $_GET[id];
            $_where['admintype'] = 2;
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
                          <th>ลบ</th>
                          <th>ชื่อ</th>
                          <th>เบอร์โทรศัพท์</th>
                          <th>ตำแหน่ง</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($arr[SHOPPING_CONTACT] as $key => $value){ 
                          $_where = array();
                          $_where['id'] = $value->usertype;
                          $_select = array('*');
                          $arr[CONTACT_TYPE] = $this->Main_model->rowdata(TBL_SHOPPING_CONTACT_TYPE,$_where,$_select);
                          ?>

                          <tr>
                            <td><?=$key+1;?></td>
                            <td height="30" >
                              <button type="button" onclick="edit_contact('<?=$value->id;?>')" class="btn btn-md btn-info btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="แก้ไข้"><i class="fa fa-pencil"></i></button>
                            </td>
                            <td >
                              <button type="button" class="btn btn-md btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" data-original-title="ลบ" onclick="firstDelete('<?=$value->name;?>','<?=$value->id;?>','<?=TBL_SHOPPING_CONTACT;?>')"><i class="fa fa-trash-o"></i></button>
                            </td>
                            <td >  
                             <?=$value->name;?> </td>
                             <td >

                              <?=$value->phone;?> 
                            </td>
                            <td > <?=$arr[CONTACT_TYPE]->usertype;?></td>
                          </tr>
                        <?php   } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>