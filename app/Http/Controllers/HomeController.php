<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class HomeController extends Controller
{
    public function welcome(Request $request): Response
    {
        // $reminders = Reminder::all();
        $query = Reminder::query();
        $date = $request->date_filter;
        $reminders = $query->get();
        return response()-> view('welcome',compact('reminders'));
    }
}
