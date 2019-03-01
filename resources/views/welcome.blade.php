@extends('layouts.app')

@section('title')
Real time weather information
@endsection

@section('css')

@endsection

@section('js-head')

@endsection

@section('content')


    <div class="row">
        <div class="col-md-12" id="box">
        </div>
    </div>



@endsection

@section('js-body')

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
    firebase.database().ref('/prod/observed').on('value', function(snapshot){
        obsValue = snapshotToArray(snapshot);
        var html = "<table border='1|1'>";
        html+="<tr>";
        html+="<td> Sr No </td>";
        html+="<td> Observed At UTC </td>";
        html+="<td> Humidity </td>";
        html+="<td> Temperature </td>";
        html+="</tr>";
        for (var i = 0; i < obsValue.length; i++) {
            var index = i + 1;
            html+="<tr>";
            html+="<td>"+index+"</td>";
            html+="<td>"+obsValue[i].observed_at+"</td>";
            html+="<td>"+obsValue[i].humidity+"</td>";
            html+="<td>"+obsValue[i].temperature+"</td>";

            html+="</tr>";
        }
        html+="</table>";
        document.getElementById("box").innerHTML = html;
    });
</script>

@endsection