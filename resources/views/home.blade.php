@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="zone_drop col s8 offset-s2">
            <div class="welcome">
            Bienvenue {{ Auth::user()->username }}
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="col s8 offset-s2">

                <!-- Specification-->
                <!---->
                <!-- id: each chart requires its own unique ID-->
                <!-- chart-type: Just set to 'donut'-->
                <!-- data-chart-max: The number of items in the set being charted-->
                <!-- data-chart-segments: { index : [starting point of segment, # of units in segment, color]}-->
                <!-- data-chart-text: The text to appear within the donut hole-->
                <!-- data-chart-caption: the text to appear beneath the chart-->
                <!-- data-chart-initial-rotate: The initial angle from which the donut populates the chart-->
                <div class="huge-chartbox">
                    <div id="failureChart1" chart-type="donut" data-chart-max="50" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;{{$total}}&quot;,&quot;#19C5F5&quot;],  &quot;1&quot;:[&quot;{{$total}}&quot;,&quot;{{$rest}}&quot;,&quot;#ecebeb&quot;] }" data-chart-text="{{$total}}/50 mo" data-chart-caption="Espace Utilisé" data-chart-initial-rotate="180"></div>
                    <div id="failureChart2" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;{{$video}}&quot;,&quot;#54EFC9&quot;],  &quot;1&quot;:[&quot;{{$video}}&quot;,&quot;{{100 - $video}}&quot;,&quot;#ecebeb&quot;] }" data-chart-text="{{$video}}%" data-chart-caption="Vidéos" data-chart-initial-rotate="180"></div>
                    <div id="failureChart3" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;{{$image}}&quot;,&quot;#F64870&quot;],  &quot;1&quot;:[&quot;{{$image}}&quot;,&quot;{{100 - $image}}&quot;,&quot;#ecebeb&quot;] }" data-chart-text="{{$image}}%" data-chart-caption="Image" data-chart-initial-rotate="180"></div>
                    <div id="failureChart4" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;{{$mp3}}&quot;,&quot;#F6F148&quot;],  &quot;1&quot;:[&quot;{{$mp3}}&quot;,&quot;{{100 - $mp3}}&quot;,&quot;#ecebeb&quot;] }" data-chart-text="{{$mp3}}%" data-chart-caption="Musique" data-chart-initial-rotate="180"></div>
                    <div id="failureChart5" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;{{$other}}&quot;,&quot;#FFA707&quot;],  &quot;1&quot;:[&quot;{{$other}}&quot;,&quot;{{100 - $other}}&quot;,&quot;#ecebeb&quot;] }" data-chart-text="{{$other}}%" data-chart-caption="Autre" data-chart-initial-rotate="180"></div>
                </div><br/>


            </div>
        </div>
    </div>



<div class="row">
    <div>
        <div class=" col s8 offset-s2">
            <div class="dropzone" id="dropzoneFileUpload">
                <div class="addFolder">
                <input type="hidden" name="path"  value="uploads/{{Auth::user()->username . '/'}}">
                </div>
            </div>
        </div>
    </div>
</div>



<script>


</script>

@endsection
