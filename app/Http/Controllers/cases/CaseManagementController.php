<?php

namespace App\Http\Controllers\cases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseRegistration;

use Barryvdh\DomPDF\Facade\Pdf;


class CaseManagementController extends Controller
{
    public function ShowCases()
    {
        return view('cases.case_management');
    } // end mehtod
    public function CaseSearch(Request $request)
    {
        $query = CaseRegistration::query();

        if ($request->has('fileno') && $request->has('year')) {
            $query->where('file_no', $request->fileno)->where('year', $request->year);
        }

        if ($request->has('partyname')) {
            $query->where('applicant', 'LIKE', '%' . $request->partyname . '%');
        }

        if ($request->has('advocate')) {
            $query->where('padvocate', 'LIKE', '%' . $request->advocate . '%')->orWhere('radvocate', 'LIKE', '%' . $request->advocate . '%');
        }

        if ($request->has('casetype')) {
            $query->where('case_type', $request->casetype);
        }

        if ($request->has('casedate')) {
            $query->where('dol', $request->casedate);
        }

        if ($request->has('subject')) {
            $query->where('subject', 'LIKE', '%' . $request->subject . '%');
        }

        $cases = $query->paginate(10);

        // dd($cases);

        return response()->json($cases);
    }

    public function GeneratePDF($id)
    {

        // Fetch the case data using the ID
        $data = CaseRegistration::with('caseDependencies')->findOrFail($id);
        $data = $data->toArray();

        // Generate the PDF
        $pdf = Pdf::loadView('pdf.case_details', compact('data'));
        return $pdf->download('case_details.pdf');


        // return Pdf::loadFile(public_path() . '/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');


        // Return the PDF as a response
        // return $pdf->download('case_details.pdf');
    }



    public function ShowCasesData($id)
    {
        $data = CaseRegistration::with('caseDependencies')->findOrFail($id);

        return response()->json($data);
    }

    public function ShowCasesType($casetype)
    {

        $data = CaseRegistration::where('case_type',  $casetype)->paginate(10);
        return response()->json($data);
    } // end mehtod

    public function ShowCasesAdvocate($advocate)
    {
        $data = CaseRegistration::where('padvocate', 'like', '%' . $advocate . '%')->orWhere('radvocate', 'like', '%' . $advocate . '%')->paginate(10);
        return response()->json($data);
    } // end mehtod
}
