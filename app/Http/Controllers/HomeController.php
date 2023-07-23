<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        $reminders = Reminder::all();
        return view('welcome',compact('reminders'));
    }
}
