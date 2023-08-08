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

<!-- Beautiful Dropdown Menu -->

<div class="row py-2">
  <div class="col-md-6">

  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="date_filter">Filter status:</label>

      <form method="get" action="/reminder-filter">
        <div class="input-group">
          <select class="form-select" name="date_filter">
            <option value="all" >All</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="missed">Missed</option>
          </select>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- Beautiful Table -->
<!-- Beautiful Table -->
<table class="table">
  <thead>
    <tr class="p-3">
      <th scope="col"><i class="fa-solid fa-list-check"></i> Task</th>
      <th scope="col"><i class="fa-regular fa-calendar-days"></i> Due Date</th>
      <th scope="col"><i class="fa-regular fa-calendar-days"></i> time</th>
      <th scope="col"><i class="fa-solid fa-circle-question"></i> Status</th>
      <th scope="col"><i class="fa-solid fa-person-walking"></i> Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reminders as $reminder)
    <tr>
      <td>{{ $reminder->task }}</td>
      <td>{{$reminder->date }}</td>
      <td>{{$reminder->time }}</td>
      <td class="{{ $reminder->status === 'Missed' ? 'text-danger' : ($reminder->status === 'Pending' ? 'text-primary' : ($reminder->status === 'Completed' ? 'text-success' : '')) }} text-bold">{{ $reminder->status }}</td>
      <td>
        @if($reminder->status === 'Pending')
        <a href="/reminder-edit/{{$reminder->id}}" class="text-success" style="text-decoration: none;"><i class="fa-solid fa-check text-success"></i> Done</a> |
        @endif
        <a href="/reminder-delete/{{$reminder->id}}" class="text-danger" style="text-decoration: none;"><i class="fa-solid fa-trash text-danger"></i> Remove</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<script>
  // JavaScript function to handle filter changes
  function applyFilter(status) {
    const filterForm = document.getElementById('filter-form');
    filterForm.date_filter.value = status;
    filterForm.submit();
  }
</script>


@endsection