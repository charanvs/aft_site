<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

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

    public function JudgementsSearch(Request $request)
    {
        if ($request->input('fileno') && $request->input('year')) {
            $fileno = $request->input('fileno');
            $year = $request->input('year');
            $data = Judgement::where('file_no', '=', $fileno)->where('year', '=', $year)->get();
        } else if ($request->input('partyname')) {
            $partyname = $request->input('partyname');
            $data = Judgement::where('petitioner', 'like', '%' . $partyname . '%')->get();
        } else if ($request->input('padvocatename') or $request->input('radvocatename')) {
            $padvocatename = $request->input('padvocatename');
            $radvocatename = $request->input('radvocatename');

            if ($padvocatename) {
                $data = Judgement::where('padvocate', 'like', '%' . $padvocatename . '%')->get();
            }
            if ($radvocatename) {
                $data = Judgement::where('radvocate', 'like', '%' . $radvocatename . '%')->get();
            }
        } else if ($request->input('casetype')) {
            $casetype = $request->input('casetype');

            $data = Judgement::where('case_type', $casetype)->paginate(10);
        }
        return response()->json($data);
    } // end mehtod

    public function JudgementsSearchType($casetype)
    {

        $data = Judgement::where('case_type',  $casetype)->paginate(10);
        return response()->json($data);
    } // end mehtod

    public function JudgementsSearchAdvocate($advocate)
    {
        $data = Judgement::where('padvocate', 'like', '%' . $advocate . '%')->orWhere('radvocate', 'like', '%' . $advocate . '%')->paginate(10);
        return response()->json($data);
    } // end mehtod

    public function JudgementsSearchDate($casedate)
    {

        $data = Judgement::where('dod', '=',  $casedate)->paginate(10);
        // $query = Judgement::where('dod', $casedate);

        // dd($query->toSql(), $query->getBindings());

        return response()->json($data);
    } // end mehtod

    public function JudgementsSearchSubject($subject)
    {
        $data = Judgement::where('subject', 'like', '%' . $subject . '%')->paginate(10);
        return response()->json($data);
    } // end mehtod

    public function showPdf($id)
    {
        // Retrieve the judgement from the database
        $judgement = Judgement::findOrFail($id);

        // Get the PDF file path or URL
        // $pdfPath = $judgement->pdf_path;
        $pdfPath = "pdf/sample.pdf";

        // Serve the PDF file
        return response()->file(storage_path('app/public/' . $pdfPath));
    }

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
