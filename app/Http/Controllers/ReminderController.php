<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{     
   

        public function reminder(Request $request){
            $reminder = new Reminder();
             $reminder->task = $request->task;
             $reminder->date = $request->date;
              $reminder->time = $request->time;
             
           
            $reminder->save();
            return redirect()->back();
        }
    
        public function edit($id){
            $reminder = Reminder::find($id);
            return view('edit',compact('reminder'));
        }
        public function update($id, Request $request)
        {
            $reminder = Reminder::find($id);
             $reminder->task = $request->task;
             $reminder->date = $request->date;
              $reminder->time = $request->time;
            $reminder->update();
            return view('welcome');
        }
    
        public function destroy($id)
        {
            $data = Reminder::where('id',$id)->first();
            $data->delete();
            return redirect()->back();
        }
    }
    

