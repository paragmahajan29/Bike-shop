function init()
{
	
	$("#page-select").on('submit', select_validate);
	$("#select-next").on('click', select_validate);
	$("#page-customer").on('submit', customer_validate);
	$("#customer-next").on('click', customer_validate);
	$("#same-dilvery-addr-box").on('click', copy_address);
	$("#page-purchase").on('submit', purchase_validate);
	$("#history_button").on('click', show_history);
	$(".delete_").on('click', delete_order);
	$("#save-button").on('click', save_orders);
	
	if($(location).attr('pathname').indexOf("vendor.php"))
	{
		$("select[value]").each(function(){
			$(this).val(this.getAttribute("value"));
		});
	}
	
	if($(location).attr('pathname').indexOf("purchase.php"))
	{
		$("#cname").html(localStorage.fname+" "+localStorage.lname);
		$("#cid").html(localStorage.cust_id);
		$("#caddr").html(localStorage.del_st_addr+", "+localStorage.del_sub_addr+", "+localStorage.del_state+"-"+localStorage.del_postcode);
		$("#cengine").html(localStorage.engine);
		$("#e_type").attr('value',localStorage.engine);
		$("#cbikes").html(localStorage.bikes);
		$("#bikes_").attr('value',localStorage.bikes);
		$("#cust_id").attr('value',localStorage.cust_id);
		
		var tolal_bikes = localStorage.bikes.split(",").length;
		if(tolal_bikes == 1)
			$("#cprice").html(" 10000.00");
		else if(tolal_bikes == 2)
				$("#cprice").html("20000.00");
			else 
				$("#cprice").html("30000.00");
		
		$("#price").attr('value',$("#cprice").html());		
		$("#cemail").html(localStorage.email);
		$("#cphone").html(localStorage.phone);
	}
}

function save_orders()
{
	var orders = [];
	$("#orders_info tr").each(function(i,row){
		if(!i)
		{ }
		else{	
			var order = {};
			order.order_id = $(this).find("td").eq(0).html();
			order.order_status = $(this).find("td").eq(3).find("select").val();
			orders[i] = order;
		}
	});
	
	$.ajax({
      type: "POST",
      url: "edit_orders.php",   
      data: {orders: orders
			},
      success: function (data) {
	  alert("Orders Updated");
		location.reload();
	  }
	});
}

function delete_order()
{
	$.ajax({
      type: "POST",
      url: "delete_order.php",   
      data: {order_id: $(this).attr('order-id')
			},
      success: function (data) {
	  alert("Order Deleted");
		location.reload();
	  }
	});
}



function show_history()
{
	$.ajax({
      type: "POST",
      url: "customer_query_data.php",   
      data: {cust_id: $("#req-cust-id").val()
			},
      success: function (data) {
		data = jQuery.parseJSON( data );
		var orders = data.orders;
		var count=0;
		var html = "<table> <tr> <th>OrderId</th><th>Bikes</th><th>Engine</th><th>Price</th><th>Date</th><th>Status</th></tr>";
		for (var x in orders) {
			if(x==0)
				continue;
			count++;	
			var order = orders[x];
			html +="<tr><td>"+order.order_id+"</td><td>"+order.bikes+"</td><td>"+order.engine+"</td><td>"+order.price+" AUD</td><td>"+order.order_date+"</td><td>"+order.status+"</td></tr>"
			
		}
		if(count>0)
			$("#result").html(html);
		else
			$("#result").html("No Order Available");
		
	  }
	});

}

function copy_address()
{
 if($("#same-dilvery-addr-box").is(":checked"))
 {
	$("#del-st-addr").val($("#bil-st-addr").val());
	$("#del-sub-addr").val($("#bil-sub-addr").val());
	$("#del-postcode").val($("#bil-postcode").val());
	$("#del-state").val($("#bil-state").val());
 }
}

/* Function to validate purchase form*/
function purchase_validate()
{
	var result = true;
	var errmsg = "";
	var d = new Date();
	var month = $("#exp-month").val();
	var year = $("#exp-year").val();
	year = "20"+ year;
	if(month>12 || month<1)
	{
		result = false;
		errmsg +="Enter valid month"; 
	}
	if(result)
	{
		if(year < d.getFullYear())
		{
			result = false;
			errmsg +="Card is expired.";
		}
		else if(year == d.getFullYear())
			{
				if(month < d.getMonth()+1)
				{
					result = false;
					errmsg +="Card is expired.";
				}
			}
	}
	if(!result)	
		alert(errmsg);
	
	if(result)
		result = confirm("Are you sure?");
	return result;
}

/* function to validate customer registration form */
function customer_validate()
{
	var errmsg = "";
	var result = true;
	var state = $("#bil-state").val();
	var postcode = parseInt($("#bil-postcode").val());
	x = parseInt(postcode/1000);
	var bil_addr = postcodecheck(state, x);
	if(!bil_addr)
	{
		result = false;
		errmsg += "Enter valid Post Code for Billing Address.\n";
	}
	
	state = $("#del-state").val();
	postcode = parseInt($("#del-postcode").val());
	x = parseInt(postcode/1000);
	var del_addr = postcodecheck(state, x);
	if(!del_addr)
	{
		result = false;
		errmsg += "Enter valid Post Code for Delivery Address.\n";
	}
	
	var phone_number = $("#phone").val(); 
	var re10digit = /^\d{10}$/ //regular expression defining a 10 digit number
	if (phone_number.search(re10digit)==-1)
	{	//if match failed
		result = false;
		errmsg += "Please enter a valid 10 digit phone number inside form. \n";
	}
	
	if(result)
	{
		localStorage.fname = $("#fname").val();
		localStorage.lname = $("#lname").val();
		localStorage.dob = $("#dob").val();
		localStorage.bil_st_addr = $("#bil-st-addr").val();
		localStorage.bil_sub_addr = $("#bil-sub-addr").val();
		localStorage.bil_state = $("#bil-state").val();
		localStorage.bil_postcode = $("#bil-postcode").val();
		localStorage.del_st_addr = $("#del-st-addr").val();
		localStorage.del_sub_addr = $("#del-sub-addr").val();
		localStorage.del_state = $("#del-state").val();
		localStorage.del_postcode = $("#del-postcode").val();
		localStorage.email = $("#email").val();
		localStorage.phone = $("#phone").val();
	}
	else
	{
		alert(errmsg);
	}
	return result;
}

/* function to check valid post code*/
function postcodecheck(state, x)
{
	var result = true;
	switch(state)
	{
		case "VIC":	
					if(x!=3 && x!=8 )
						result = false;
					break;
		case "NSW":	
					if(x!=1 && x!=2 )
						result = false;
					break;
		case "QLD":	
					if(x!=4 && x!=9 )
						result = false;
					break;
		case "NT":	
					if(x!=0)
						result = false;
					break;
		case "WA":	
					if(x!=6)
						result = false;
					break;
		case "SA":	
					if(x!=5)
						result = false;
					break;
		case "TAS":	
					if(x!=7)
						result = false;
					break;
		case "ACT":	
					if(x!=0)
						result = false;
					break;			
	}
	
	return result;
}


/* function to validate select form*/
function select_validate()
{
	var errmsg = "";
	var result = true;
	var bikes = new Array();
	var engine;
	
	if($("#b1").is(':checked'))
		bikes.push($("#b1").val());
	
	if($("#b2").is(':checked'))
		bikes.push($("#b2").val());
	
	if($("#b3").is(':checked'))
		bikes.push($("#b3").val());
	// check to make sure at least one bike is selected.
	if(bikes.length == 0)
	{
		result = false;
		errmsg = "Select at least one bike.\n"
	}
	// check weather any engine type is selected.
	if($("#e1").is(':checked'))
		engine = $("#e1").val();
	
	if($("#e2").is(':checked'))
		engine = $("#e2").val();
	
	if(!engine)
	{
		result = false;
		errmsg += "Select Engine type.";
	}
	if(!result)
	{
		alert(errmsg);
	}
	else
	{
		localStorage.bikes = bikes;
		localStorage.engine = engine;
	}
	return result;
}

$(window).load(function() {
      init();
});