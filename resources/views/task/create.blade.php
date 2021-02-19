@extends('master')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session()->get('message') }}
        </div>
    @endif

<h3>Create new Task</h3>
<a href="{{route('task.index')}}"><button class="btn btn-warning"><strong>< </strong>Go Back</button></a>
<hr>
<form action="{{route('task.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="task-content"><strong>Content: </strong></label>
        <input type="text" name="content" id="task-content" required>
    </div>
    <div class="form-group">
        <label for="task-user"><strong>Select User: </strong></label>
        <select name="user_id" id="task-user">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Create!</button>
</form>
@endsection
