<style>
  .btn-equal{
    padding: 5px;
  }
</style>
<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body" style="padding-bottom: 0px;">
            <form id="search_form">
              <table width="100%">
                <tbody><tr>
                    <!--<td width="50"><span style="font-size: 16px;">Code</span></td>-->
                    <td width="140"><input type="text" class="form-control" id="code" name="code" value="" style="width: 120px;"></td>

                    <td width="65"><span style="font-size: 16px;">ทะเบียน</span></td>
                    <td width="140"><input type="text" class="form-control" id="plate_num" name="plate_num" value="" style="width: 120px;"></td>

                    <td width="40"><span style="font-size: 16px;">วันที่</span></td>
                    <td width="140">				
                      <input type="date" value="<?=date('Y-m-d');?>" class="form-control" id="datepicker" name="date" max="<?=date('Y-m-d',time());?>">
                    </td>
                    <td width="10"></td>
                    <td valign="middle">
                      <button type="button" onclick="filterShopList();" class="btn btn-primary" style="margin-top: 0px;">ค้นหา</button>
                    </td>
                  </tr>
                </tbody>
              </table>

            </form>

          </div>
        </div>
        <div class="box-body table-responsive" style="padding-top: 0;">
          <div class="card-body no-padding">
            <div id="load_list_com"></div>
          </div>	
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>     
  </div><!--end .row -->



</div>
<script>
  filterShopList();
</script>