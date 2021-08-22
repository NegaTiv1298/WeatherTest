@extends('layouts.app')
<title>Weather {{$city}}</title>
@section('content')
    <body>
    <div class="container">
        <div class="row weather-block text-center">
            <div class="col-7 temperature-block">
                <span class="celsius">{{$celsius}}°</span><br>
                <span class="city_name">{{$city}}</span>
            </div>
            <div class="col-5">
                <div class="row right-part">
                    <div class="col-12 top_right_block g-0">
                        <img src="https://assetambee.s3-us-west-2.amazonaws.com/weatherIcons/PNG/{{$icon}}.png"
                             class="img">
                    </div>
                    <div class="row"></div>
                    <div class="col-6 bot_right_block">
                            <span class="windSpeed"><img
                                    src="https://img.icons8.com/fluent-systems-regular/452/wind.png"
                                    class="img_windSpeed">
                                {{$windSpeed}}<br>MPH</span>
                    </div>
                    <div class="col-6 bot_right_block">
                        <span class="humidity"><img src="https://image.flaticon.com/icons/png/512/67/67123.png"
                                                    class="img_humidity">
                            {{$humidity}}<br></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@stop
