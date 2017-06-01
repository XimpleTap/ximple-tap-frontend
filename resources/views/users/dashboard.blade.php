@extends('layouts.app')

@section('title', 'Loyalty Tap')

@section('content')
    <div class="row">
        <div class="col-md-9 ch-round-corners" >
            <?php $ctr = 0; ?>
            @foreach ($cards as $card)
                @if($ctr >=1 )
                    <div class="col-md-3 ch-cardbox ch-left-allowance center-block" >
                        Sega Cofi <br />
                        Expiry: 12/12/17
                        <hr />
                        <h1>{{ $card['balance'] }}</h1>remaining balance
                        <br />
                        <h1>{{ $card['acquired_points'] }}</h1>points earned
                    </div>
                @else
                    <div class="col-md-3 ch-cardbox center-block">
                        Sega Cofi <br />
                        Expiry: 12/12/17
                        <hr />
                        <h1>{{ $card['balance'] }}</h1>remaining balance
                        <br />
                        <h1>{{ $card['acquired_points'] }}</h1>points earned
                    </div>
                @endif


                    <?php $ctr++; ?>
            @endforeach

        </div>
        <div class="col-md-3 ch-round-corners">
            <div class="ch-left-top">
                <div class="pull-left">
                    <div>WELCOME BACK {{ strtoupper($user_data[0]['first_name'] ) }}!</div>
                    <div>Logout</div>
                </div>
                <img src="images/profile.png" class="pull-right ch-img-profile" />
            </div>
            <div class="clearfix"></div>
            <div class="">
                {{ $user_data[0]['first_name'] }} {{ $user_data[0]['last_name'] }}
                <br />
                {{ $user_data[0]['email_address'] }}
                <br />
                {{ $user_data[0]['contact_number'] }}

            </div>

        </div>
    </div>



@endsection