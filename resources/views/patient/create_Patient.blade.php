@extends('adminlte::page')
@section('title', 'welcome')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_Patient</title>
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
        <form method="post" action="{{route('store_Patient')}}">
            @csrf
            <div class="input" >
                <div>
                <label for="input1">name:</label>
                <input class="text1" type="text" name="name" id="input1">
                </div>
                <div>
                <label for="input2">age:</label>
                <input class="text2" type="text" name="age" id="input2">
                </div>
                <div>
                <label for="input3">phone:</label>
                <input maxlength="10" class="text3" type="text" name="phone" id="input3">
                </div>
                <div>
                <label for="input4">Gender:</label>
                  <select name="Gender" id="input4" class="text4">
                    <option value="Female">Feamle</option>
                    <option value="male">mail</option>
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