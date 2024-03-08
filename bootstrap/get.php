<?php
if(!$_GET){
    include('dashboard.php');
}else{
   switch($_GET['target']){

    //sayfalar

    case 'dasboard': include('dashboard.php');  break;
    case 'customer': include('customer.php');  break;

    //müşteri

    case 'c_ekle': include('customer/c_ekle.php');  break;
    case 'c_sil': include('customer/c_sil.php');  break;
    case 'c_guncelle': include('customer/c_guncelle.php');  break;

    //login 

    case 'login': include('login.php');  break;
    case 'forgot-pass': include('forgot-pass.php');  break;
    case 'register': include('register.php');  break;
    case 'logout': include('logout.php');  break;
    


    default : include('dashboard.php');  break;
    }
   }





?>