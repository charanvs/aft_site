<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Home()
    {
        return view('frontend.index');
    }
    public function Members()
    {
        $data = Team::all();
        return view('frontend.team', compact('data'));
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
