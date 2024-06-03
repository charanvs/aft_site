<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
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
        $data = Vacancy::all();
        return view('frontend.recruitment', compact('data'));
    }
}
