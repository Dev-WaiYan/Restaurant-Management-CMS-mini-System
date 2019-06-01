@extends('cms.template.bootstrap')

@section('content')
<section class="w3-khaki w3-padding-64">
<div class="w3-container">
    <div class="w3-col m2">&nbsp;</div>   
    <div class="w3-card-4 w3-round-large w3-col m8 w3-panel">
        <div class="w3-container w3-center">
        <!-- Condition to be integer in table field -->
        @if(isset($error))
            <p class="w3-red w3-panel w3-padding-32">{{$error}}</p>
        @endif
        @if(isset($bookingSuccess))
            <p class="w3-teal w3-panel w3-padding-32">{{$bookingSuccess}} <br><br>
            <a href="booking"><button class="w3-button w3-round-large w3-green">Back</button></a>
            </p>
        @endif
        <h3>Booking</h3>
        </div>
    
        <form class="w3-container" action="registerBooking" method="POST">
        {{csrf_field()}}
        <p>
        <input name="customerName" class="w3-input w3-text-black w3-round-large" type="text" required placeholder="eg. Wilson">
        <label>Your Name:</label></p> <br>
        <p>
        <input name="email" class="w3-input w3-text-black w3-round-large" type="email" required placeholder="eg. wilson@gmail.com">
        <label>Email: </label></p> <br>
        <p>
        <input name="phone" class="w3-input w3-text-black w3-round-large" type="text" required placeholder="eg. 09-000 000 000">
        <label>Phone: </label></p> <br>
        <p>
        <input name="date" class="w3-input w3-text-black w3-round-large" type="date" required>
        <label>Date: </label></p> <br>
        <p>
        <input name="time" class="w3-input w3-text-black w3-round-large" type="text" required style="width:60%;float:left;" placeholder="Just fill number and choose [am or pm]."> &nbsp;&nbsp;&nbsp;
        <select name="timePartition" style="width:70px;height:35px;">
            <option value="am">am</option>
            <option value="pm">pm</option>
        </select> <br><br>
        <label>Time: </label></p> <br>
        <p>
        <input name="table" class="w3-input w3-text-black w3-round-large" type="text" required placeholder="Just number">
        <label>Number of tables: </label></p> <br>
        <button name="send" type="submit" class="w3-teal w3-button">Send</button>
        </form> <br><br>

        <div class="w3-container">
        <div class="w3-col m3">&nbsp;</div>
        <div class="w3-card-4 w3-center w3-panel w3-sand w3-col m6 w3-round-large w3-padding-16">
        <h3>My Restaurant</h3> <br>
        <p><i class="glyphicon glyphicon-phone-alt"></i> :&nbsp;&nbsp; 000-000-000</p>
        <p><i class="glyphicon glyphicon glyphicon-thumbs-up"></i> :&nbsp;&nbsp; myrestaurant/facebook.com</p>
        <p><i class="glyphicon glyphicon glyphicon-envelope"></i> :&nbsp;&nbsp; myrestaurant@gmail.com</p>
        <p><i class="glyphicon glyphicon-home"></i> :&nbsp;&nbsp; No.000, Sule Yangon, Myanmar</p>
        </div>
        <div class="w3-col m3">&nbsp;</div> <br>
        </div>
    </div>
    <div class="w3-col m2">&nbsp;</div>
</div>
</section>
@endsection