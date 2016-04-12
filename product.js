function init()
{
	var page_select = document.getElementById("page-select");
	if(page_select)
		page_select.onsubmit = select_validate;
	
	var page_customer = document.getElementById("page-customer");
	if(page_customer)
		page_customer.onsubmit = customer_validate;
		
	var page_purchase = document.getElementById("page-purchase");
	if(page_purchase)
		page_purchase.onsubmit = purchase_validate;	
		
	var select_next = document.getElementById("select-next");
	if(select_next)	
		select_next.onclick = select_validate;
	
	var customer_next = document.getElementById("customer-next");
	if(customer_next)	
		customer_next.onclick = customer_validate;
	
	var same_address = document.getElementById("same-dilvery-addr-box");
	if(same_address)	
		same_address.onclick = copy_address;	
	
	if(window.location.href.indexOf("purchase.html")>0)
	{
		document.getElementById("cname").innerHTML = localStorage.fname+" "+localStorage.lname;
		document.getElementById("caddr").innerHTML = localStorage.del_st_addr+", "+localStorage.del_sub_addr+", "+localStorage.del_state+"-"+localStorage.del_postcode;
		document.getElementById("cengine").innerHTML = localStorage.engine;
		document.getElementById("cbikes").innerHTML = localStorage.bikes;
		document.getElementById("cemail").innerHTML = localStorage.email;
		document.getElementById("cphone").innerHTML = localStorage.phone;
	}
}

function copy_address()
{
	if(document.getElementById("same-dilvery-addr-box").checked)
	{
		document.getElementById("del-st-addr").value = document.getElementById("bil-st-addr").value;
		document.getElementById("del-sub-addr").value = document.getElementById("bil-sub-addr").value;
		document.getElementById("del-postcode").value = document.getElementById("bil-postcode").value;
		document.getElementById("del-state").value = document.getElementById("bil-state").value;
	}
}

/* Function to validate purchase form*/
function purchase_validate()
{
	var result = true;
	var errmsg = "";
	var d = new Date();
	var month = document.getElementById("exp-month").value;
	var year = document.getElementById("exp-year").value;
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
	var state = document.getElementById("bil-state").value;
	var postcode = parseInt(document.getElementById("bil-postcode").value);
	x = parseInt(postcode/1000);
	var bil_addr = postcodecheck(state, x);
	if(!bil_addr)
	{
		result = false;
		errmsg += "Enter valid Post Code for Billing Address.\n";
	}
	
	state = document.getElementById("del-state").value;
	postcode = parseInt(document.getElementById("del-postcode").value);
	x = parseInt(postcode/1000);
	var del_addr = postcodecheck(state, x);
	if(!del_addr)
	{
		result = false;
		errmsg += "Enter valid Post Code for Delivery Address.\n";
	}
	
	var phone_number = document.getElementById("phone").value; 
	var re10digit = /^\d{10}$/ //regular expression defining a 10 digit number
	if (phone_number.search(re10digit)==-1)
	{	//if match failed
		result = false;
		errmsg += "Please enter a valid 10 digit phone number inside form. \n";
	}
	
	if(result)
	{
		localStorage.fname = document.getElementById("fname").value;
		localStorage.lname = document.getElementById("lname").value;
		localStorage.dob = document.getElementById("dob").value;
		localStorage.bil_st_addr = document.getElementById("bil-st-addr").value;
		localStorage.bil_sub_addr = document.getElementById("bil-sub-addr").value;
		localStorage.bil_state = document.getElementById("bil-state").value;
		localStorage.bil_postcode = document.getElementById("bil-postcode").value;
		localStorage.del_st_addr = document.getElementById("del-st-addr").value;
		localStorage.del_sub_addr = document.getElementById("del-sub-addr").value;
		localStorage.del_state = document.getElementById("del-state").value;
		localStorage.del_postcode = document.getElementById("del-postcode").value;
		localStorage.email = document.getElementById("email").value;
		localStorage.phone = document.getElementById("phone").value;
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
	
	if(document.getElementById("b1").checked)
		bikes.push(document.getElementById("b1").value);
	
	if(document.getElementById("b2").checked)
		bikes.push(document.getElementById("b2").value);

	if(document.getElementById("b3").checked)
		bikes.push(document.getElementById("b3").value);

	// check to make sure at least one bike is selected.
	if(bikes.length == 0)
	{
		result = false;
		errmsg = "Select at least one bike.\n"
	}
	// check weather any engine type is selected.
	if(document.getElementById("e1").checked)
		engine = document.getElementById("e1").value;
	
	
	if(document.getElementById("e2").checked)
		engine = document.getElementById("e2").value;
	
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

window.onload = init;