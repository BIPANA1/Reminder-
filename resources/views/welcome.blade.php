
@extends('layout.main')
@section('content')
    <div class="container">
      <form action="/reminder" id="task-form" method="post">
        @csrf
        <h1>Task Notes</h1>
        <div class="items-wrap">
          <label for="task-date">Date: </label>
          <input type="date" id="task-date" name="date" required />
        </div>

        <div class="items-wrap">
          <label for="task-time">Time: </label>
          <input type="time" id="task-time" name="time" required />
        </div>

        <div class="items-wrap">
          <label for="task-details">Details: </label>
          <textarea name="task" id="task-details" placeholder="Write your task details" required></textarea>
        </div>

        <button type="submit">ADD TASK</button>
      </form>

      <div id="task-list"></div>
    </div>

     <!-- Beautiful Table -->
     <table class="table">
            <thead>
                <tr class="p-3">
                    <th scope="col"><i class="fa-solid fa-list-check"></i> Task</th>
                    <th scope="col"><i class="fa-regular fa-calendar-days"></i> Due Date</th>
                    <th scope="col"><i class="fa-solid fa-clock"></i> Time</th>
                    <th scope="col"><i class="fa-solid fa-person-walking"></i> Action</th>
                </tr>
            </thead>
            <tbody>
                 
          @foreach($reminders as $reminder)
                <tr>
                    <td>{{$reminder->task}}</td>

                    <td>{{$reminder->date}}</td> 

                    <td class="">{{$reminder->time}}</td>

                    <td>
                        
                            <a href="/edit/{{$reminder->id}}" class="text-success" style="text-decoration: none;"><i class="fa-solid fa-check text-success"></i> Update</a> |
                      
                        <a href="/reminder-delete/{{$reminder->id}}" class="text-danger" style="text-decoration: none;" ><i class="fa-solid fa-trash text-danger"></i> Remove</a>
                        
                    </td>
                </tr>
             @endforeach  
            </tbody>
        </table>
    </div>

    @endsection