@extends('adminlte::page')
@section('title', 'welcome')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_doctor</title>
    <style>
a{
    padding: 5px;
    text-decoration: none;
    display: flex;
    justify-content: center;
    color: black;
}
.update:hover{
    background-color: green;
}
.delate:hover{
    background-color: red;
}

table{
    background-color: white;
    width: 100%;
    border: 2px solid grey;
    text-align: center;
    
}
table tr th{
    border: 2px rgb(53, 42, 42) solid;
    width: 20%;
}

.create:hover{
    background-color: darkkhaki;

}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>date</th>
            <th>time</th>
            <th>doctor</th>
            <th>patient</th>
            <th> <a  class="create" href="{{route('create_preview')}}">Add Preview</a></th>
        </tr>
        @foreach($preview as $previews)
        <tr>
            <th>{{$previews->date}}</th> 
            <th>{{$previews->time}}</th> 
            <th>{{$previews->patient->name}}</th> 
            <th>{{$previews->doctor->name}}</th> 
            <th><a class="update" href="{{route('update_preview',$previews->id)}}">update</a>
            <a class="delate" href="{{route('destore_preview',$previews->id)}}">delate</a>
        </th>
        </tr>

        @endforeach







    </table>


</body>
</html>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop