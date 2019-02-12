
                        
                    </div><!--end .row -->



                </div><!--end .section-body -->
            </section>
        </div>



    </div>
<!-- BEGIN JAVASCRIPT -->
<div class="modal fade in " id="modal_custom" style="">
	<div class="modal-dialog modal-lg" style="width: 95vw;">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_modal_custom('shop_manage')" >×</button>
            <h4 class="modal-title" id="formModalLabel"> จัดการประเภทรายจ่าย </h4>
        </div>
        <!-- <form class="form-horizontal" role="form"> -->
            <div class="modal-body">
               <div id="dody_modal_custom"></div>
               
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="close_modal_custom('shop_manage')"><i class="fa fa-times"></i> ปิด</button>
                   <!-- <button type="button" class="btn btn-primary">Login</button> -->
               </div>

       <!-- </form> -->
   </div>
</div>
</div>
<div class="modal fade in " id="modal_custom_3" style="">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_modal_custom('plan_price')" >×</button>
            <h4 class="modal-title" id="formModalLabel_2"> จัดการประเภทรายจ่าย </h4>
        </div>
        <form class="form-horizontal" role="form">
            <div class="modal-body">
               <div id="dody_modal_custom_3"></div>
              
           </div>
            <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_modal_custom('plan_price')">ปิด</button>
                   <!-- <button type="button" class="btn btn-primary">Login</button> -->
               </div>

       </form>
   </div>
</div>
</div>
<div class="modal fade in" id="modal_custom_2"  style="right: -16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onclick="close_modal_custom('shop_manage_sub')">×</button>
                <h4 class="modal-title" id="title_add_region_sub" ></h4>
            </div>

            <form class="form-horizontal" >
                <div class="modal-body ">
                    <div class="box ">
                        <div id=dody_modal_custom_2>

                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_modal_custom('shop_manage_sub')">ปิด</button>
                        <!-- <button type="button" class="btn btn-primary">Login</button> -->
                    </div>
                
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade in" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="simpleModalLabel">คุณแน่ใจหรือไม่</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="" id="id_item_delete" value="">
                <p >ว่าต้องการลบ <span class="text-danger" id="span_title_delete"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ไม่</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="finalDelete()">ใช่</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- ================================================================================ -->
<div class="modal fade in" id="deleteModalBase" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="simpleModalLabel">คุณแน่ใจหรือไม่</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="" id="id_item_deleteBase" value="">
                <input type="hidden" name="" id="tbl_item_deleteBase" value="">
                <input type="hidden" name="" id="ele_item_deleteBase" value="">
                <p >ว่าต้องการลบ <span class="text-danger" id="span_title_deleteBase"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ไม่</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="func_SaveDeleteBase()">ใช่</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<style>
#modal_custom {
    z-index: 1000;
    position: fixed;
    width: 100vw;
    height: 100vh;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.59);
    display: none; 
}
#modal_custom_2 {
    z-index: 1001;
    position: fixed;
    width: 100vw;
    height: 100vh;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.59);
    display: none; 
}
#modal_custom_3 {
    z-index: 1002;
    position: fixed;
    width: 100vw;
    height: 100vh;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.59);
    display: none; 
}
.modal_custom_body {
    height: 80vh; 
    /* border-radius: 4px; */
    background: #fff;
    min-width: 80vw;
    /* height: auto; */
    left: 50vw;
    top: 50vh;
    overflow: hidden;
    transform: translate(-50%,-50%);
    position: fixed;
    z-index: 10;
    border-radius: 15px;
}
.modal_custom_body_in{
	height: 80vh;
	overflow-y: scroll;
}
</style>

<!-- The Modal -->
<div id="img_modal" class="modal-img">
  <span class="close-img" onclick='document.getElementById("img_modal").style.display = "none";'>&times;</span>
  <img class="modal-content-img" id="img01">
  <div id="caption"></div>
</div>
<style>
/* The Modal (background) */
.modal-img {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        z-index: 9999999;
}

/* Modal Content (image) */
.modal-content-img {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content-img, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close-img {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close-img:hover,
.close-img:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content-img {
        width: 100%;
    }
}
</style>

<!-- END JAVASCRIPT -->



</body>

<!-- Mirrored from www.codecovers.eu/materialadmin/pages/blog/post by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Sep 2018 10:46:00 GMT -->
</html>