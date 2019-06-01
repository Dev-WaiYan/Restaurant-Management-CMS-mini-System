<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        return view('cms.home',['active'=>'home']);
    }

    public function showMenu() {
        $menus = DB::select('select * from menu');
        return view('cms.menu',['active'=>'menu','menus'=>$menus]);
    }

    public function registerBooking() {
        if(isset($_POST['send'])) {
            $customerName = $_POST['customerName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $timePartition = $_POST['timePartition'];
            $table = (int)$_POST['table'];

            if($table == 0) {
               return redirect('bookingTryAgain');
            }
            else {
                $insert = DB::insert("insert into booking(customerName,email,phone,date,time,timePartition,tables) values('$customerName','$email','$phone','$date','$time','$timePartition','$table')");
                if($insert) {
                    return redirect('bookingSuccess');
                }
                else 
                    die("insert fail.");
            }     
        }
    }
}
