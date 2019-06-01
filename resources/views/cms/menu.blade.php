@extends('cms.template.bootstrap')

@section('content')
<main class="w3-khaki w3-padding-64 w3-center w3-container" id="food-and-price">
    <h2>Foods & Prices</h2> <br>
    <i class="glyphicon glyphicon-list-alt w3-xxlarge"></i> <br><br>
    @if(count($menus) <= 0)
        <h4 class="w3-red w3-padding-32">No menu yet!</h4>
    @else
    <!-- Available Food -->
    <section class="w3-sand w3-padding-32 w3-panel w3-round-xxlarge w3-row">
        <p>You can get</p> <br>
        @foreach($menus as $menu)
        <div class="w3-card-4 w3-col m3" style="margin-top:30px;">
        <img src="css/images/{{$menu->img}}"><br><br>
        <p>{{$menu->menu}}</p>
        <p>$ - {{$menu->price}}</p>
        </div> 
        <div class="w3-col m1">&nbsp;</div>
        @endforeach
    </section> <br>

    <section class="w3-center w3-text-teal">
        <h4>You can get preorder to get seats as you want.</h4>
        <a href="booking"><button class="w3-btn w3-border w3-round-large w3-sand w3-text-teal">Booking</button></a>
    </section>
    @endif
</main>
@endsection