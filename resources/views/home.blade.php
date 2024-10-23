@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
    <style>
.content{
    margin: 5px;
    width: 99%;
}
.data{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}
.data .box{
background-color: rgb(48, 41, 41);
color: wheat;
height: 60px;
flex-basis: 100px;
flex-grow: 1;
border-radius: 10px;
display: flex;
justify-content: center;
align-items: center;
justify-content: space-around;
transition: 1s;
}
.data .box i{
    font-size: 30px;
}
.data .box .con{
    font-size:30px ;
}
.data .box:hover{
    background-color: #738388;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content">
        <div class="data">
            <div class="box">
                <i class="fas fa-user-injured"></i>
                <div class="cont">
                    <span>Patients</span>
                    <p>{{$patient}}</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-user-md"></i>
                <div class="cont">
                    <span>Doctor</span>
                    <p>{{$doctor}}</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-stethoscope"></i>
                <div class="cont">
                    <span>conditions</span>
                    <p>{{$conditions}}</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-eye"></i>
                <div class="cont">
                    <span>previews</span>
                    <p>{{$previews}}</p>
                </div>
            </div>
            

        </div>
    
</body>
</html>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
