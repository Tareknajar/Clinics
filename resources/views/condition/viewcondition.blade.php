@extends('adminlte::page')
@section('title', 'welcome')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_patient</title>
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
            <th>the condition</th>
            <th>Tests</th>
            <th>patient</th>
            <th> <a  class="create" href="{{route('create_condition')}}">Add condition</a></th>
        </tr>
        @foreach($conditions as $condition)
        <tr>
            <th>{{$condition->the_condition}}</th> 
            <th>{{$condition->Tests}}</th> 
            <th>{{$condition->patient->name}}</th> 
            <th><a class="update" href="{{route('update_condition',$condition->id)}}">update</a>
            <a class="delate" href="{{route('destore_condition',$condition->id)}}">delate</a>
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