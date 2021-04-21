<?php

function language($lang)
{
	$arr[' '] = " ";
	$arr[':'] = " : ";
	$arr['/'] = " / ";
	$arr['-'] = " - ";
	$arr['*'] = " * ";
	
	$arr['edit'] = "تعديل";
	$arr['delete'] = "حذف";
	$arr['en'] = "انجليزي";
	$arr['ar'] = "عربي";
	$arr['first'] = "الأول";
	$arr['next'] = "التالي";
	$arr['previous'] = "السابق";
	$arr['last'] = "الأخير";
	$arr['total'] = "الاجمالي";
	$arr['select'] = "اختر";
	$arr['comment'] = "تعليق";
	$arr['share'] = "مشاركة";
	$arr['save'] = "حفظ";
	$arr['deletemodal'] = "هل انت متاكد من رغبتك في حذف هذا البيان ؟";
	$arr['agree'] = "موافق";
	$arr['no'] = "لا";
	$arr['cantdelete'] = "لا يمكنك حذف هذا البيان لانه يحتوي على ";
	$arr['success'] = "تمت بنجاح";
	$arr['nodata'] = "لا توجد بيانات";
	
	//	Messages
	$arr['m1'] = "تمت العملية بنجاح";
	$arr['m2'] = "يوجد خطا ما";
	$arr['m3'] = "اكتب البيان بشكل صحيح";
	$arr['m4'] = "المدخل غير متاح";
	$arr['m5'] = "كل الخانات مطلوبة";
	$arr['m6'] = "كلمتا السر يجب ان يتساويا";
	$arr['m7'] = "كلمة السر يجب ان تكون اكثر من او يساوي 8 حروف";
	$arr['m8'] = "خانة من يجب ان تكون اصغر من او تساوي خانة الى";
	$arr['m9'] = "اسم المستخدم غير متاح";
	$arr['m10'] = "تم تحويل الرصيد اليك بنجاح";
	$arr['m11'] = "تم ارسال الرسالة";
	$arr['m12'] = "املا الخانات بشكل صحيح";
	$arr['m13'] = "الايميل غير متاح";
	$arr['m14'] = "البريد الاكتروني او كلمة المرور غير صحيحتان";
	$arr['m15'] = "الحساب لم يفعل بعد";
	$arr['m16'] = "ِالحساب مفعل سابقا";
	$arr['m17'] = "ِالحساب ليس موجود";
	$arr['m18'] = "لو سمحت ادخل الى بريدك الالكتروني وفعل الحساب";
	$arr['m19'] = "تم تفعيل حسابك";
	
	// Register
	$arr['register'] = "التسجيل";
	$arr['address'] = "العنوان";
	$arr['phone'] = "الهاتف";
	$arr['dealer'] = "تاجر";
	
	// Login
	$arr['currentuser'] = "مستخدم حالي";
	$arr['username'] = "اسم المستخدم";
	$arr['email'] = "البريد الالكتروني";
	$arr['password'] = "كلمة المرور";
	$arr['login'] = "الدخول";
	
	// Menu
	$arr['menu'] = "القائمة";
	$arr['ads'] = "الاعلانات";
	$arr['pages'] = "الصفحات";
	$arr['cities'] = "المدن";
	$arr['shows'] = "المعارض";
	$arr['departments'] = "الاقسام";
	$arr['products'] = "المنتجات";
	$arr['orders'] = "الطلبات";
	$arr['account'] = "الحساب";
	$arr['myaccount'] = "الحساب";
	$arr['users'] = "المستخدمين";
	$arr['dealers'] = "التجار";
	$arr['messages'] = "الرسائل";
	$arr['contact'] = "التواصل";
	$arr['logout'] = "الخروج";
	
	// Ads
	$arr['code'] = "الكود";
	
	// Pages
	$arr['page'] = "الصفحة";
	$arr['keywords'] = "الكلمات الدالة";
	
	// Cities
	$arr['city'] = "المدينة";
	$arr['title'] = "العنوان";
	
	// Shows
	$arr['show'] = "المعرض";
	$arr['branches'] = "القروع";
	
	// Departments
	$arr['department'] = "القسم";
	
	// Products
	$arr['product'] = "المنتج";
	$arr['description'] = "الوصف";
	$arr['price'] = "السعر";
	$arr['discount'] = "الخصم";
	$arr['images'] = "الصور";
	$arr['active'] = "التفعيل";
	$arr['myproducts'] = "المنتجات";
	
	// Orders
	$arr['delivered'] = "تم التوصيل";
	$arr['nondelivered'] = "قيد التوصيل";
	$arr['time'] = "الوقت";
	$arr['dtime'] = "وقت التوصيل";
	$arr['quantity'] = "الكمية";
	
	// Messages
	$arr['message'] = "الرسالة";
	$arr['subject'] = "العنوان";
	
	// Contact
	$arr['address'] = "العنوان";
	$arr['phone'] = "الهاتف";
	$arr['mobile'] = "الموبايل";
	$arr['facebook'] = "فيسبوك";
	$arr['twitter'] = "تويتر";
	$arr['googleplus'] = "جوجل بلاس";
	$arr['linkedin'] = "لينكد ان";
	$arr['youtube'] = "يوتيوب";
	
	echo $arr[$lang];
}

?>