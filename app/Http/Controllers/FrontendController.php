<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Members()
    {
        return view('frontend.team');
    }
    public function DailyCauseList()
    {
        return view('frontend.calendar');
    }
    public function Vacancies()
    {
        return view('frontend.recruitment');
    }
}
