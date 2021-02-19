@extends('master')

@section('title') ECC Task @endsection

@section('content')
    <h2>Simple Task CRUD system</h2>

    <a style="margin:9px" href="{{route('task.create')}}"><button class="btn btn-primary"><strong>+ </strong>Create new task</button></a>
    <hr>
    <div>
        <h4>All Tasks:</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>ID | Username</th>
                <th>Action</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->content}}</td>
                <td>{{$task->user->id}} | {{$task->user->name}}</td>
                <td class="text-center align-middle">
                    <div class="btn-group">
                        <a href="{{route('task.edit', $task->id)}}" type="button" class="btn btn-outline-primary mr-1">Edit!</a>
                        <form class="form-horizontal" action="{{route('task.delete', $task->id)}}" method="POST">
                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                            <button title="Delete" type="submit" onclick="return confirm('Are you sure, You want to delete this Data?')" type="button"
                                    class="btn btn-danger">Delete!</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
