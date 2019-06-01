@extends('cms.template.adminBootstrap')

@section('content')
    <section class="w3-khaki w3-row w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-card-4 w3-light-gray w3-center w3-padding-32 w3-round-xlarge">
    <h2>Bookings</h2> <br>
    @if(isset($message))
        <div class="w3-teal w3-padding-32">
        <h3>{{$message}}</h3>
        <a href="bookinglist"><button class="w3-btn w3-light-grey">Got it</button></a>
        </div> <br>
    @endif

    @if(count($bookingLists) > 0)
    @foreach($bookingLists as $booking)
        <table class="booking-list">
            <tr>
                <td style="text-align:left;">Customer ID : </td>
                <td>{{$booking->id}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Customer Name : </td>
                <td>{{$booking->customerName}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Email : </td>
                <td>{{$booking->email}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Phone : </td>
                <td>{{$booking->phone}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Date : </td>
                <td>{{$booking->date}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Time : </td>
                <td>{{$booking->time}} - {{$booking->timePartition}}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Number of Table : </td>
                <td>{{$booking->tables}}</td>
            </tr>
        </table> <br>
    <!-- For delete action -->
        <form action="bookingDelete" method="post">
        {{csrf_field()}}
        <button class="w3-btn w3-round-large w3-red w3-hover-teal" type="submit">Delete Selected Bookings</button>
        <br><br><label class="w3-text-red">Choose to delete </label> <br>
        <input type="checkbox" name="customerID[]" value="{{$booking->id}}">
        <hr style="background:red;height:1px;">
    @endforeach
        </form>

    @else
    <h2 class="w3-text-red">No Booking Exist.</h2>
    @endif
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
@endsection