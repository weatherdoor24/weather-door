@extends('layouts.app')

@section('title')
Real time weather information
@endsection

@section('css')

@endsection

@section('js-head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-xm-12">
            <div class="card tab-card">
                <div class="card-header tab-card-header">
                  <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" id="one-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="One" aria-selected="true">Graph <i class="fa fa-graph"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#table" role="tab" aria-controls="Two" aria-selected="false">Table</a>
                    </li>
                  </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="graph" role="tabpanel" aria-labelledby="one-tab">
                        <div id="graph_weather"></div>            
                    </div>
                    <div class="tab-pane fade p-3 table-responsive" id="table" role="tabpanel" aria-labelledby="two-tab">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead class="thead-light">
                                <tr>              
                                   <th scope="col">Sr No</th>
                                   <th scope="col">Observed At UTC</th>
                                   <th scope="col">Temperature</th>
                                   <th scope="col">Humidity</th>
                                </tr>
                            </thead>
                            <tbody id="box"></tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xm-12">
            <div class="card">
                <div class="card-body">
                    <span class="float-right text-muted time"> </span> <h5 class="card-title text-success" id="temp"> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Temperature </h6>
                    <hr>
                    <span class="float-right text-muted time">  </span>   <h5 class="card-title text-success "  id="hum"> </h5> 
                    <h6 class="card-subtitle mb-2 text-muted"> Humidity </h6>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@section('js-body')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>


<script type="text/javascript">
    function snapshotToArray(snapshot) {
    var returnArr = [];

    snapshot.forEach(function(childSnapshot) {
        var item = childSnapshot.val();
        item.key = childSnapshot.key;

        returnArr.push(item);
    });

    return returnArr;
};

</script>

<script type="text/javascript">
    var obsValue;
    var date_time       = [];
    var humidity        = [];
    var temperature     = [];


    firebase.database().ref('/prod/observed').on('value', function(snapshot){
        obsValue = snapshotToArray(snapshot);
       var last_array =  obsValue[Object.keys(obsValue)[Object.keys(obsValue).length - 1]];

        if(last_array)
        {
            $('#temp').fadeOut(1000,function() {
                    $(this).html(last_array.temperature + " °C").fadeIn(1000);
            });
            $('#hum').fadeOut(1000,function() {
                $(this).html(last_array.humidity + " %").fadeIn(1000);
            });
              $('.time').fadeOut(1000,function() {
                var dt = moment(last_array.observed_at).format("YYYY-MM-DD HH:MM");
                $(this).html(dt ).fadeIn(1000);
            });
        }

        for(var i = 0; i < obsValue.length; i++)
            {
                
                var dt  = moment(obsValue[i].observed_at).utcOffset("+05:30").format("HH:MM");

                date_time.push(dt);

                humidity.push(parseInt(obsValue[i].humidity));
                temperature.push(parseInt(obsValue[i].temperature));

            }   
        
        weatherGraph([ date_time,temperature, humidity]);    

        var html = "";
       
        for (var count = obsValue.length-1, i = count; i >= 0; i--) {
            var index = i + 1;
            html+="<tr>";
            html+="<td>"+index+"</td>";
            html+="<td>"+obsValue[i].observed_at+"</td>";
            html+="<td>"+obsValue[i].temperature+"</td>";
            html+="<td>"+obsValue[i].humidity+"</td>";
            html+="</tr>";
        }
   
       $("#box").html(html);    
    });


    function weatherGraph(data) 
    {
       
        Highcharts.chart('graph_weather', {
            chart: {
                type: 'spline',
                height:300,
            },
            title: {
                text: 'Weather Information'
            },
           
            xAxis: {
                categories: data[0]
            },
        
            yAxis: [{
            title: {
                text: 'Temperature (°C) ',            
            },
           
           
        },
        { /*Secondary yAxis*/
            title: {
                text: 'Humidity %',
            },            
            opposite: true
        }],

        tooltip: {
       
        shared: true
    },
    series: [{
        name: 'Temperature',
        data: data[1],
        tooltip: {
            valueSuffix: ' °C'
        }
    }, {
        name: 'Humidity',
        data: data[2],
        yAxis: 1,
         tooltip: {
            valueSuffix: ' %'
        }
    }]
});
    }
</script>

@endsection