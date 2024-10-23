@extends('adminlte::page')
@section('title', 'welcome')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_Doctor</title>
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
            <th>Specialization</th>
            <th> <a  class="create" href="{{route('create_doctor')}}">Add Doctor</a></th>
        </tr>
        @foreach($doctors as $doctor)
        <tr>
            <th>{{$doctor->name}}</th> 
            <th>{{$doctor->age}}</th> 
            <th>{{$doctor->phone}}</th> 
            <th>{{$doctor->Specialization->name_specialization}}</th> 
            <th><a class="update" href="{{route('update_doctor',$doctor->id)}}">update</a>
            <a class="delate" href="{{route('destore_doctor',$doctor->id)}}">delate</a>
        </th>
        </tr>

        @endforeach







    </table>


</body>
</html>@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop