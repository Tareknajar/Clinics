@extends('adminlte::page')
@section('title', 'welcome')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_Patient</title>
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
            <th>name</th>
            <th>age</th>
            <th>phone</th>
            <th>Gender</th>
            <th> <a  class="create" href="{{route('create_Patient')}}">Add patient</a></th>
        </tr>
        @foreach($patients as $patient)
        <tr>
            <th>{{$patient->name}}</th> 
            <th>{{$patient->age}}</th> 
            <th>{{$patient->phone}}</th> 
            <th>{{$patient->Gender}}</th> 
            <th><a class="update" href="{{route('update_Patient',$patient->id)}}">update</a>
            <a class="delate" href="{{route('destore_Patient',$patient->id)}}">delate</a>
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