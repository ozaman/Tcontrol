function saveDataTransShop() {
  var data = new FormData($('#form_acc_trans_shop')[0]);
  data.append('slip_trans', $('#uploadfile')[0].files[0]);
//  var data = $("#form_acc_trans_shop").serialize();
  var url = base_url + "accounting/complete_trans_shop";

  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    type: 'post',
    success: function (res) {
      console.log(res);
      if (res.data.result == true) {
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
        close_modal_custom('shop_manage');
        filterShopList();
        sendSocket(res.update.order_id);

        $.ajax({
          url: base_url+"send_onesignal/transfer_shop_completed?id=" + res.update.order_id, // point to server-side PHP script 
          dataType: 'json', // what to expect back from the PHP script, if anything
          type: 'post',
          success: function (res) {
            console.log(res);
          }
        });

      } else {
        toastr.error('ไม่สามารถบันทึกข้อมูลได้', '', {"closeButton": true});
      }
    },
    error: function (err) {
      console.log(err);
      //your code here
    }
  });
}

function filterShopList() {
  $.post(base_url + "accounting/load_shop_com", $('#search_form').serialize(), function (html) {
//		console.log(html);
    $('#load_list_com').html(html);
  });
}

function openBook(id, invoice) {
  $('#modal_custom').show(300);
  $.post(base_url + 'accounting/manage_shop_trans?id=' + id, function (html) {
    $('#dody_modal_custom').html(html);
  });
}

function readURLslip(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#preview_img').attr('src', e.target.result);
      $('#box_preview_slip').fadeIn(500);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function showImgModal(id) {

  var modal = document.getElementById('img_modal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById(id);
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

}

function showImgModalSrc(path) {

  var modal = document.getElementById('img_modal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
//  var img = document.getElementById(id);
  var modalImg = document.getElementById("img01");
//  var captionText = document.getElementById("caption");
  modal.style.display = "block";
  modalImg.src = path;
}

function calcost(cost) {
  if (cost == "") {
    cost = 0;
  }
  $('#price').text(cost);
  var persen_com = parseInt($('#persen_com').text());
  var persen_taxi = parseInt($('#persen_taxi').text());
//  console.log(persen_com);
  var total_price_com = (parseInt(cost) * persen_com) / 100;
  var total_price_taxi = (parseInt(cost) * persen_taxi) / 100;
  console.log(total_price_com);
  $('#price_company').text(total_price_com);
  $('#price_taxi').text(total_price_taxi);

  $('#company_cost').val(total_price_com);
  $('#taxi_cost').val(total_price_taxi);
}

function checkedFilter(id) {
  $('.btn-checkbox-success-inverse').removeClass('active');
  var type = $('#' + id + ' input[type="checkbox"]').val();
  $('#filter_type').val(type);
//  $('#'+id).addClass('active');
}

function sendSocket(id) {
  console.log('Click ' + id);
  //   var message = "";
  var dataorder = {
    order: parseInt(id),
  };
  socket.emit('sendchat', dataorder);
}