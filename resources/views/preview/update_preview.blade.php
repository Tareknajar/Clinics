@extends('adminlte::page')
@section('title', 'welcome')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_doctor</title>
    <style>
        .form{
    display: flex;
    justify-content: center;
    align-items: center;

}
label{
    font-size: 20px;
    position: relative;
    left: 10px;
    bottom: -50px;

}
.text1 ,.text2, .text3 ,.text4 {
    padding: 5px;
    margin: 5px;
    display:  flex;
    justify-content: space-around;
    border-radius: 20px;
    position: relative;
    bottom: -50px;
}
.submit{
    border-radius: 20px;
    position: relative;
    left: 60px;
    bottom: -60px;
    
}

.erroer{
    display: flex;
    color: red;
    border-radius: 10px;
    position: absolute;
    top: 50px;
    font-weight: bold;
}
    </style>
</head>
<body background="/image/create.jpg">
    @if(session('errors'))
    <div class="erroer">
        @foreach(session('errors')->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    <div class="form">
        <form method="post" action="{{route('edit_preview',['id'=>$preview->id])}}">
            @csrf
        <div class="input" >
                <div>
                <label for="input1">date:</label>
                <input class="text1" type="date" name="date" id="input1" value="{{$preview->date}}">
                </div>
                <div>
                <label for="input2">time:</label>
                <input class="text2" type="time" name="time" id="input2" value="{{$preview->time}}">
                </div>
                <div>
                <label for="input3">doctor:</label>
                <select class="text4" name="doctor_id" id="input3">
                    @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
                </div>
                <div>
                <label for="input4">patient:</label>
                <select class="text4" name="patient_id" id="input4">
                    @foreach($patients as $patients)
                    <option value="{{$patients->id}}">{{$patients->name}}</option>
                    @endforeach
                </select>
                </div>
            <input class="submit"  type="submit" value="Edit">
            
        </form>
    </div>
    
</body>
</html>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
