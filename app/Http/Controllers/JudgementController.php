<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judgement;

use App\Models\JudgementOne;
use App\Models\JudgementTwo;
use App\Models\JudgementThree;


class JudgementController extends Controller
{
    public function ShowJudgements2015()
    {

        $judgements2015 = JudgementOne::latest()->select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->get();
        return view('frontend.judgement2015', compact('judgements2015'));
    } // end mehtod

    public function ShowJudgementsFileno(Request $request)
    {
        $fileno = $request->input('fileno');
        $year = $request->input('year');
        $data = Judgement::where('file_no', '=', $fileno)->where('year', '=', $year)->get();

        return response()->json($data);
        // $file_no = $request->fileno;
        // $year = $request->year;

        // $judgements = Judgement::latest()->select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->where('file_no', '=', $file_no)->where('year', '=', $year)->get();
        // return view('frontend.judgements.judgementssearch', compact('judgements'));
        // $data = Judgement::select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->where('file_no', '=', '25')->get(); // Fetch your data using Eloquent or any other method
        // return response()->json($data);
    } // end mehtod

    public function ShowJudgementsData($id)
    {
        $data = Judgement::findOrFail($id);

        return response()->json($data);
    }

    public function ShowJudgements()
    {
        return view('frontend.judgements.judgements');
    } // end mehtod

    public function ShowJudgements2020()
    {

        $judgements2020 = JudgementTwo::latest()->select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->get();
        return view('frontend.judgement2020', compact('judgements2020'));
    } // end mehtod

    public function ShowJudgements2024()
    {

        $judgements2024 = JudgementThree::latest()->select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->get();
        return view('frontend.judgement2024', compact('judgements2024'));
    } // end mehtod
}
