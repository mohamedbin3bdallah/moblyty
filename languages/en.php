<?php

function language($lang)
{
	$arr[' '] = " ";
	$arr[':'] = " : ";
	$arr['/'] = " / ";
	$arr['-'] = " - ";
	$arr['*'] = " * ";
	
	$arr['edit'] = "Edit";
	$arr['delete'] = "Delete";
	$arr['en'] = "English";
	$arr['ar'] = "Arabic";
	$arr['first'] = "First";
	$arr['next'] = "Next";
	$arr['previous'] = "Previous";
	$arr['last'] = "Last";
	$arr['total'] = "Total";
	$arr['select'] = "Select";
	$arr['comment'] = "Comment";
	$arr['share'] = "Share";
	$arr['save'] = "Save";
	$arr['deletemodal'] = "Are You Sure You Want To Delete This Statement ?";
	$arr['agree'] = "Agree";
	$arr['no'] = "No";
	$arr['cantdelete'] = "You Cant Delete this Statement, it contains ";
	$arr['success'] = "Done Successfully";
	$arr['nodata'] = "There is no data";
	
	//	Messages
	$arr['m1'] = "Success";
	$arr['m2'] = "Something Wrong";
	$arr['m3'] = "Add Your input Correctly";
	$arr['m4'] = "Invalid Input";
	$arr['m5'] = "All inputs are required";
	$arr['m6'] = "Two password must be equals";
	$arr['m7'] = "Password must be more than or equal 8 characters";
	$arr['m8'] = "From input text must be smaller than or equal To input text";
	$arr['m9'] = "Invalid Usename";
	$arr['m10'] = "The Balance is transfered to you Successfully";
	$arr['m11'] = "Your message was sent";
	$arr['m12'] = "Fill all fields correctly";
	$arr['m13'] = "Invalid Email";
	$arr['m14'] = "Wrong Email or Password";
	$arr['m15'] = "ِAccount not Activate Yet";
	$arr['m16'] = "ِAccount already Active";
	$arr['m17'] = "ِAccount not exist";
	$arr['m18'] = "ِPlease login to your email and active your account";
	$arr['m19'] = "ِYour Account is Activated";
	
	// Register
	$arr['register'] = "Register";
	$arr['address'] = "Address";
	$arr['phone'] = "Phone";
	$arr['dealer'] = "Dealer";
	
	// Login
	$arr['currentuser'] = "Current User";
	$arr['username'] = "Username";
	$arr['email'] = "Email";
	$arr['password'] = "Password";
	$arr['login'] = "Login";
	
	// Menu
	$arr['menu'] = "Menu";
	$arr['ads'] = "Ads";
	$arr['pages'] = "Pages";
	$arr['cities'] = "Cities";
	$arr['shows'] = "Shows";
	$arr['departments'] = "Departments";
	$arr['products'] = "Products";
	$arr['orders'] = "Orders";
	$arr['account'] = "Account";
	$arr['myaccount'] = "Account";
	$arr['users'] = "Users";
	$arr['dealers'] = "Dealers";
	$arr['messages'] = "Messages";
	$arr['contact'] = "Contact";
	$arr['logout'] = "Logout";
	
	// Ads
	$arr['code'] = "Code";
	
	// Pages
	$arr['page'] = "Page";
	$arr['keywords'] = "Keywords";
	
	// Cities
	$arr['city'] = "City";
	$arr['title'] = "Title";
	
	// Shows
	$arr['show'] = "Show";
	$arr['branches'] = "Branches";
	
	// Departments
	$arr['department'] = "Department";
	
	// Products
	$arr['product'] = "Product";
	$arr['description'] = "Description";
	$arr['price'] = "Price";
	$arr['discount'] = "Discount";
	$arr['images'] = "Images"; 
	$arr['active'] = "Active";
	$arr['myproducts'] = "Products";
	
	// Orders
	$arr['delivered'] = "Delivered";
	$arr['nondelivered'] = "Non Delivered";
	$arr['time'] = "time";
	$arr['dtime'] = "Delivered Time";
	$arr['quantity'] = "Quantity";
	
	// Messages
	$arr['message'] = "Message";
	$arr['subject'] = "Subject";
	
	// Contact
	$arr['address'] = "Address";
	$arr['phone'] = "Phone";
	$arr['mobile'] = "Mobile";
	$arr['facebook'] = "Facebook";
	$arr['twitter'] = "Twitter";
	$arr['googleplus'] = "GooglePlus";
	$arr['linkedin'] = "Linkedin";
	$arr['youtube'] = "Youtube";
	
	echo $arr[$lang];
}

?>