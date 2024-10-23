@extends('adminlte::page')
@section('title', 'welcome')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>store_specilization</title>
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
    <div  class="form">
        <form method="post" action="{{route('store_condition')}}">
            @csrf
            <div class="input" >
                <div>
                <label for="input1">The condition:</label>
                <input class="text1" type="text" name="the_condition" id="input1">
                </div>
                <div>
                <label for="input2">Test:</label>
                <input class="text2" type="text" name="Tests" id="input2">
                </div>
                <div>
                <label for="input3">patient:</label>
                <select class="text4" name="patients_id" id="input3">
                    @foreach($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
                </div>

            </div>
            <input class="submit"  type="submit" value="create">
            
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