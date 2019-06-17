<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container">
           <div class = "text-center">
                <h1>Daily Task</h1>
                <div class = "row">
                    <div class = "col-md-12">
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                        @endforeach
                        <form method ="post" action="/saveTask" >
                            {{csrf_field()}}
                            <input type="text" class = "form-control" name = "task" placeholder = "Enter Your Task Name">
                            <br>
                            <input type="submit" class = "btn btn-primary" value = "SAVE">
                            <input type="button" class = "btn btn-warning" value = "CLEAR">
                        </form>
                        <div>
                            <br>
                        </div>
                        <table class = "table table-dark">
                            <th>ID</th>
                            <th>Task</th>
                            <th>Completed</th>
                            <th>Action</th>
                            @foreach($tasks as $task)
                                <tr>
                                    <th>{{$task->id}}</th>
                                    <th>{{$task->task}}</th>
                                    <th>    
                                       @if($task->iscompleted)
                                       <button class = "btn btn-success">Completed</button>
                                       @else
                                       <button class = "btn btn-warning">Not Completed</button>
                                        @endif
                                    </th>
                                    <th>
                                    @if(!$task->iscompleted)
                                    <a href="/markscompleted/{{$task->id}}" class = "btn btn-primary">Mark As Completed</a>
                                    @else
                                    <a href="/marksnotcompleted/{{$task->id}}" class = "btn btn-danger">Mark As Not Completed</a>
                                    @endif
                                    <a href="/deletedtask/{{$task->id}}" class = "btn btn-warning">Delete</a>
                                    <a href="/updatetask/{{$task->id}}" class = "btn btn-success">Update</a>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </body>
</html>
