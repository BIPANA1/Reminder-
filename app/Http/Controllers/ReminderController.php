<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class ReminderController extends Controller
{  


    public function home(Request $request){
         $query = Reminder::query();
         $date = $request->date_filter;
         $reminders = $query->get();
         return response()-> view('home',compact('reminders'));
        
    }

public function reminder(Request $request)
{
    $reminder = new Reminder();
    $reminder->task = $request->task;
    $reminder->date = $request->date;
    $reminder->time = $request->time;
    
    // Assuming you have a 'completed' field in the Reminder model, you can set it initially to false.
    $reminder->completed = false;

    $dueDateTime = Carbon::parse($request->date . ' ' . $request->time);

    if ($dueDateTime->isPast()) {
        $reminder->status = 'Missed';
    } elseif ($request->status === 'completed') {
        $reminder->status = 'Completed';
        $reminder->completed = true;
    } else {
        $reminder->status = 'Pending';
    }

    $reminder->save();
    return redirect()->back();
}

public function showReminders(Request $request)
{
    
    $status = $request->query('date_filter', 'all'); // Get the status from the query parameter

    // Filter the reminders based on the selected status
    $remindersQuery = Reminder::query();
    
    if ($status === 'pending') {
        $remindersQuery->where('status', 'Pending');
    } elseif ($status === 'completed') {
        $remindersQuery->where('completed', true);
    } elseif ($status === 'missed') {
        $remindersQuery->where('status', 'Missed');
    }

    $reminders = $remindersQuery->get();

    return view('welcome', ['reminders' => $reminders, 'status' => $status]);
    }






    public function edit($id)
    {
        $reminder = Reminder::find($id);
        return view('edit', compact('reminder'));
    }



    public function update($id, Request $request)
    {
        $reminder = Reminder::find($id);
        $reminder->status = 'Completed';
        $reminder->update();
        return back();
    }

    public function destroy($id)
    {
        $data = Reminder::where('id', $id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        FacadesSession::flush();
        Auth::logout();
        return redirect('/');

    }

}
