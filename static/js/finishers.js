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

function calculate_balance(id_amount, id_paid, id_balance){
  var item_cost = id_amount.value;
  var amount_paid = id_paid.value;
  var balance = (item_cost - amount_paid).toFixed(2);

  id_balance.value = balance;
}
