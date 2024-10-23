@extends('adminlte::page')
@section('title', 'welcome')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_Specilization</title>
    <style>
body{
    background-color: darkgray;
    padding: 0;
    margin: 0;
}
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
    background-color: rgb(250, 250, 250);
    width: 100%;
    padding: 0;
    margin-left: -15px;
    margin-right: -10px;
}
table tr th{
    border: 2px rgb(53, 42, 42) solid;
    width: 50%;
    text-align: center;
}
.create:hover{
    background-color: darkkhaki;

}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>name</th>
            <th> <a  class="create" href="{{route('create_specilization')}}">Add specialization</a></th>
        </tr>
        @foreach($specializations as $specialization)
        <tr>
            <th>{{$specialization->name_specialization}}</th> 
            <th><a class="update" href="{{route('update_specilization',$specialization->id)}}">update</a>
            <a class="delate" href="{{route('delate_specilization',$specialization->id)}}">delate</a>
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