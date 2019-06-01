@extends('cms.template.adminBootstrap')

@section('content')
@if(isset($editForm))
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Edit</h4> <hr style="background: green;height:1px;">
        <!-- Notification -->
        @if(isset($message))
            <h4 class="w3-green w3-padding-32 w3-panel">{{$message}}</h4>
        @endif
        @if(isset($error))
            <h4 class="w3-red w3-padding-32 w3-panel">{{$error}}</h4>
        @endif

        @foreach($menu as $menu)
        <form action="editmenu" class="w3-padding-64" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <input type="hidden" name="menuID" value="{{$menu->id}}">
            <h4>Old Menu : {{$menu->menu}}</h4>
            <label for="menuname">New Menu :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="menuname" id="menuname" value="" placeholder="item" required> <br><br><br>
            <h4>Old Price : {{$menu->price}}</h4>
            <label for="price">New Price :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="price" id="price" value="" placeholder="Just fill value" required> <br><br><br>
            <h4>Old Menu Photo: </h4><br>
            <img src="/menu-img/{{$menu->img}}" alt="photo" style="width: 150px;height: 100px;" class="w3-round-large"><br><br>
            <label for="file" class="w3-teal w3-padding-16 w3-panel w3-round-large">Choose Menu Photo</label>
            <input type="file" name="menuimg" id="file" required> <br><br>
            <button type="submit" name="updatemenu" class="w3-button w3-green w3-round-large">Update Menu</button>
        </form>
        @endforeach
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
@else
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Edit Menu</h4> <hr style="background: green;height:1px;">
        <!-- Notification -->
        @if(isset($message))
            <h4 class="w3-green w3-padding-32 w3-panel">{{$message}}</h4>
        @endif
        @if(isset($error))
            <h4 class="w3-red w3-padding-32 w3-panel">{{$error}}</h4>
        @endif
        <section class="w3-dark-gray w3-panel w3-padding-32 w3-center">
        <h3>Menu List</h3> <br><br>
        @if(count($menus) <= 0)
            <h4 class="w3-text-red">No Menu Found.</h4>
        @else
        @foreach ($menus as $menu)
        <table class="menu-list w3-border">
            <tr>
                <td style="text-align:left;">ID : </td>
                <td>{{$menu->id}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Menu : </td>
                <td>{{$menu->menu}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Price : </td>
                <td>$ - {{$menu->price}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Item : </td>
                <td><img src="/menu-img/{{$menu->img}}" alt="photo" style="width: 150px;height: 100px;" class="w3-round-large"></td>
            </tr>
            </table> <br>
            <!-- For delete and edit action -->
            <form action="editmenu" method="post">
            {{csrf_field()}}
            <input type="hidden" name="menuID" value="{{$menu->id}}">
            <button name="deleteMenu" class="w3-btn w3-round-large w3-red w3-hover-teal" type="submit">Delete</button>
            <button name="editMenu" class="w3-btn w3-round-large w3-green w3-hover-teal" type="submit">Edit Menu</button>
            </form>
            <hr style="background:blue;height:1px;"> <br>    
        @endforeach
        @endif
        </section>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
@endif
@endsection