@extends('cms.template.adminBootstrap')

@section('content')
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Admin Setting</h4> <hr style="background: green;height:1px;">
        @if(isset($message))
            <h4 class="w3-green w3-padding-32 w3-panel">{{$message}}</h4>
        @endif
        @if(isset($error))
            <h4 class="w3-red w3-padding-32 w3-panel">{{$error}}</h4>
        @endif
        <form action="setting" class="w3-padding-64" method="post">
        {{csrf_field()}}
            @if(isset($oldusername) && isset($oldpassword))
            <h3>Old Username : <span class="w3-text-teal">{{$oldusername}}</span></h3>
            <h3>Old Password : <span class="w3-text-teal">{{$oldpassword}}</span></h3>
            @endif

            @if(isset($newusername) && isset($newpassword))
            <h3>New Username : <span class="w3-text-teal">{{$newusername}}</span></h3>
            <h3>New Password : <span class="w3-text-teal">{{$newpassword}}</span></h3>
            @endif
            <br><br>
            <label for="newusername">New Name :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="newusername" id="newusername" value="" placeholder="eg. admin" required> <br><br>
            <label for="newpassword">New Password : </label> <br><br>
            <input class="w3-input w3-round-large" type="password" name="newpassword" id="newpassword" value="" placeholder="eg. password" required> <br><br><br>
            <button type="submit" class="w3-button w3-green w3-round-large">Confirm</button>
        </form>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
@endsection