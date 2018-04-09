function get_question(value) {
  // alert(value);
  $.ajax({
      type: "GET",
      url: "get_sec_question.php",
      data: "choice="+value,
      success: function(data){
          $('#s_question').val(data);
      }
  })
}

function delete_unique_data(id) {
  var value = id.value;
  $.ajax({
      type: "GET",
      url: "delete_data.php",
      data: "choice="+value,
      success: function(data){
        var newjson = data;
        var obj = JSON.parse(newjson);
        var id_type = obj.id_type;
        
        $('#DeleteModal').modal('hide');

        if (id_type == 'poID') {
          window.location.href = 'display_purchases.php';
        } else {
          var po_id = obj.po_id
          window.location.href = 'purchase_form.php?po_id='+po_id+'&up_order=1';
        }
      }
  })
}

function save_cheque_details() {
  $.ajax({
     url: "save_cheque_details.php",
     method:"POST",
     data:$('#chqForm').serialize(),
     type:'json',
     success:function(data)
     {
       var value = $('#ChequeID').val();
       $('#chqID').val(value);
       $('#poTypeModal').modal('hide');
     }

  });
}

function get_order_details(value) {
  alert(value);
  // $.ajax({
  //     type: "GET",
  //     url: "order_details.php",
  //     data: "id="+value,
  //     success: function(data){
          // var myjson = data;
          // var myobj = JSON.parse(myjson);
          // $('#receipt_no').val(myobj.receipt_no);
          // $('#item_cost').val(myobj.amount);
          // $('#amt_paid').val(myobj.amtpaid);
  //
  //         // alert(data);
  //     }
  // })
}

function set_focus() {
  document.index_search.search_value.focus();
}

function calculate_amount(id_quantity, id_unitcost, id_amount) {
  var quantity = id_quantity.value;
  var unitcost = parseFloat(id_unitcost.value);
  var amount = (quantity * unitcost).toFixed(2);
  // alert(amount);
  id_amount.value = amount;
}

function calculate_balance(id_cost, id_paid, id_amount, id_balance){
  var item_cost = id_cost.value;
  var amount_paid = id_paid.value;
  var amount = id_amount.value;
  var balance = (item_cost - amount_paid - amount).toFixed(2);

  id_balance.value = balance;
}

function get_cheque_id(){
  if (document.getElementById('ptype').value == 'Cash') {
    document.getElementById('chqID').disabled = true;
  } else {
    document.getElementById('chqID').disabled = false;
    document.getElementById('chqID').focus();
    document.getElementById('chqID').required = true;
  }
}

function invoke_modal() {
    var input = document.getElementById('chqID')
    input.addEventListener('click', function(event){
        document.getElementById('modalButton').click();
      });
}
