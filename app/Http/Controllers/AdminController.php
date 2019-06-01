<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class AdminController extends Controller
{  
    //Since this is not used for commercial in real world now, we don't use password encryption.
    public static function login() {
        $adminDatas = DB::select('select * from adminData where id=(select max(id) from adminData)');
        foreach($adminDatas as $adminData) {
            $username = $adminData->username;
            $password = $adminData->password;
        } 
        if(isset($_POST['username']) && isset($_POST['password'])) {
            if($username==$_POST['username'] && $password==$_POST['password']) {
                $_SESSION['login'] = true;
                return self::showBookingList();
            }
            else
                return view('cms.admin.login',['error'=>'Fail Login. Try Again!']);
        }
        else {
            if(isset($_SESSION['login']) && $_SESSION['login'] == true)
                return self::showBookingList();
            else
                return view('cms.admin.login');
        }
    }

    public static function showBookingList() {
        if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $bookingLists = DB::select('select * from booking');
            return view('cms.admin.bookinglist',['active'=>'bookinglist','bookingLists'=>$bookingLists]);
        }
        else
            return self::login();
    }

    public function addMenu() {
        if(isset($_POST['addmenu'])) {
            $file_name = $_FILES['menuimg']['name'];
            $file_size = $_FILES['menuimg']['size'];
            $file_tmp = $_FILES['menuimg']['tmp_name'];
            $target_file = basename($file_name);
            $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($file_type!='jpeg' && $file_type!='jpg' && $file_type!='png')
                return view('cms.admin.addmenu',['active'=>'addmenu','error'=>'Please Choose just [ "jpg or jpeg or png" ] extension!']);

            if($file_size > 6000000 || $file_size == 0)
                return view('cms.admin.addmenu',['active'=>'addmenu','error'=>'Photo size is too large. Must be smaller than 6MB.']);
            
            //File upload to folder
            move_uploaded_file($file_tmp,"menu-img/".$file_name);
            
            $menu = $_POST['menuname'];
            $price = $_POST['price'];
            $menuimg = $file_name;

            $insert = DB::insert("insert into menu(menu,price,img) values('$menu','$price','$menuimg')");
            if($insert) 
                return view('cms.admin.addmenu',['active'=>'addmenu','message'=>'Item Added Successfully.']);
            else
                return view('cms.admin.addmenu',['active'=>'addmenu','error'=>'Item Added Fail. Try Again!']);
        }
        else {
            if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
                return view('cms.admin.addmenu',['active'=>'addmenu']);
            }
            else
                return self::login();
        }
    }

    public function editMenu() {
        if(isset($_POST['deleteMenu'])) {
            $id = $_POST['menuID'];
            $delete = DB::delete("delete from menu where id='$id'");
            $menus = DB::select('select * from menu');
            if($delete)
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus,'message'=>'Menu Deleted Successfully.']);
            else
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus,'error'=>'Menu cannot delete']);   
        }   
        
        elseif(isset($_POST['editMenu'])) {
            $id = $_POST['menuID'];
            $menu = DB::select("select * from menu where id='$id'");
            return view('cms.admin.editmenu',['active'=>'editmenu','editForm'=>true,'menu'=>$menu]);
        }   

        elseif(isset($_POST['updatemenu'])) {
            $file_name = $_FILES['menuimg']['name'];
            $file_size = $_FILES['menuimg']['size'];
            $file_tmp = $_FILES['menuimg']['tmp_name'];
            $target_file = basename($file_name);
            $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($file_type!='jpeg' && $file_type!='jpg' && $file_type!='png')
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus,'error'=>'Please Choose just [ "jpg or jpeg or png" ] extension!']);

            if($file_size > 6000000 || $file_size == 0)
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus,'error'=>'Photo size is too large. Must be smaller than 6MB.']);
            
            //File upload to folder
            move_uploaded_file($file_tmp,"menu-img/".$file_name);
            $editID = $_POST['menuID'];
            $menu = $_POST['menuname'];
            $price = $_POST['price'];
            $menuimg = $file_name;

            $update = DB::update("update menu set menu='$menu',price='$price',img='$menuimg' where id='$editID'");
            $menus = DB::select('select * from menu');
            if($update) 
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus,'message'=>'Menu Updated Successfully.']);
            else
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus]);
        }

        else {
            if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $menus = DB::select('select * from menu');
                return view('cms.admin.editmenu',['active'=>'editmenu','menus'=>$menus]);
            }
            else
                return self::login();
        }
    }

    public function adminSetting() {
        $adminDatas = DB::select('select * from adminData where id=(select max(id) from adminData)');
        foreach($adminDatas as $adminData) {
            $username = $adminData->username;
            $password = $adminData->password;
        }

        if(isset($_POST['newusername']) && isset($_POST['newpassword'])) {
            if($_POST['newusername']!="" && $_POST['newpassword']!="") {
                $newusername = $_POST['newusername'];
                $newpassword = $_POST['newpassword'];
                $insert = DB::insert("insert into adminData(username,password) values('$newusername','$newpassword')");
                if($insert)
                    return view('cms.admin.setting',['active'=>'setting','newusername'=>$newusername,'newpassword'=>$newpassword,'message'=>'Admin datas are changed successfully.']);
            }
            else
                return view('cms.admin.setting',['active'=>'setting','oldusername'=>$username,'oldpassword'=>$password,'error'=>'You cannot have blank username or password. Try again!']);
        }
        else {
            if(isset($_SESSION['login']) && $_SESSION['login'] == true) { 
                return view('cms.admin.setting',['active'=>'setting','oldusername'=>$username,'oldpassword'=>$password]);
            }
            else
                return self::login();
        }
    }

    public function bookingDelete() {
        if(isset($_POST['customerID'])) {
            $ids = $_POST['customerID'];
            foreach($ids as $id) {
                $delete = DB::delete("delete from booking where id='$id'");
            }
            if($delete) {
                $bookingLists = DB::select('select * from booking'); 
                return view('cms.admin.bookinglist',['active'=>'bookinglist','bookingLists'=>$bookingLists,'message'=>'Delete Records Successfully.']);
            }
            else
                die('Error occur.Cannot delete.Please try again.');
       }
       else
            return redirect('bookinglist');
    }
}