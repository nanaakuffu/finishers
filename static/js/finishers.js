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

function get_order_details(value) {
  $.ajax({
      type: "GET",
      url: "order_details.php",
      data: "id="+value,
      success: function(data){
          var myjson = data;
          var myobj = JSON.parse(myjson);
          $('#receipt_no').val(myobj.receipt_no);
          $('#item_cost').val(myobj.amount);
          $('#amt_paid').val(myobj.amtpaid);
      }
  })
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

function control_cheque_number(){
  if (document.getElementById('ptype').value == 'Cash') {
    document.getElementById('cheque_number').disabled = true;
  } else {
    document.getElementById('cheque_number').disabled = false;
    document.getElementById('cheque_number').focus();
    document.getElementById('cheque_number').required = true;
  }
}
