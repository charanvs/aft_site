<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Judgement;

use App\Models\JudgementOne;
use App\Models\JudgementTwo;
use App\Models\JudgementThree;
use App\Models\ReportableJudgement;

class JudgementController extends Controller
{
    public function ShowJudgements2015()
    {

        $judgements2015 = JudgementOne::latest()->select('case_type', 'file_no', 'year', 'petitioner', 'mod', 'dod', 'padvocate', 'radvocate')->get();
        return view('frontend.judgement2015', compact('judgements2015'));
    } // end mehtod

    public function JudgementsSearch(Request $request)
    {
        $query = Judgement::query();

        if ($request->has('fileno') && $request->has('year')) {
            $query->where('file_no', $request->fileno)->where('year', $request->year);
        }

        if ($request->has('partyname')) {
            $query->where('petitioner', 'LIKE', '%' . $request->partyname . '%');
        }

        if ($request->has('advocate')) {
            $query->where('padvocate', 'LIKE', '%' . $request->advocate . '%')->orWhere('radvocate', 'LIKE', '%' . $request->advocate . '%');
        }

        if ($request->has('casetype')) {
            $query->where('case_type', $request->casetype);
        }

        if ($request->has('casedate')) {
            $query->where('dod', $request->casedate);
        }

        if ($request->has('subject')) {
            $query->where('subject', 'LIKE', '%' . $request->subject . '%');
        }

        $judgements = $query->paginate(10);

        // return response()->json([
        //     'data' => $judgements->items(),
        //     'links' => $judgements->links('pagination::bootstrap-4')->toHtml(),
        //     'from' => $judgements->firstItem(),
        // ]);
        return response()->json($judgements);
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
        $data = Judgement::findOrFail($id);

        return response()->json($data);
    }

    public function ShowJudgementsData($id)
    {
        $judgement = Judgement::findOrFail($id);

        // Adjust this part according to your actual database structure
        $data = [
            'regno' => $judgement->reg_no,
            'year' => $judgement->year,
            'deptt' => $judgement->department,
            'associated' => $judgement->associated,
            'dor' => $judgement->dor,
            'padvocate' => $judgement->petitioner_advocate,
            'radvocate' => $judgement->respondent_advocate,
            'subject' => $judgement->subject,
            'petitioner' => $judgement->petitioner,
            'court_no' => $judgement->court_no,
            'remarks' => $judgement->remarks,
            'pdfUrl' => route('judgements.pdf', $judgement->id)
        ];

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

    public function ReportableJudgements()
    {
        $data = Judgement::where('reportable', '=', 'Y')->get();

        return view('frontend.judgements.reportable_judgements', compact('data'));
    }

    public function LargeBenchJudgements()
    {
        $data = Judgement::where('larger_bench', '=', 'Y')->get();

        return view('frontend.judgements.largebench_judgements', compact('data'));
    }
}
