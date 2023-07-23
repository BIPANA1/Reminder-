@extends('layout.main')
@section('content')

<div class="container">
      <form action="/reminder-edit/{{$reminder->id}}" id="task-form" method="post">
        @csrf
        <h1>Edit Notes</h1>
        <div class="items-wrap">
          <label for="task-date">Date: </label>
          <input type="date" id="task-date" name="date" value="{{$reminder->date}}" />
        </div>

        <div class="items-wrap">
          <label for="task-time">Time: </label>
          <input type="time" id="task-time" name="time" value="{{$reminder->time}}" />
        </div>

        <div class="items-wrap">
          <label for="task-details">Details: </label>
          <textarea
            name="task"
            id="task-details"
            placeholder="Write your task details"
            required
          >{{$reminder->task}}   </textarea>
        </div>

        <button type="submit">ADD TASK</button>
      </form>

      <div id="task-list"></div>
    </div>





@endsection