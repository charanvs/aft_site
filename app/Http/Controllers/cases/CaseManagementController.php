<?php

namespace App\Http\Controllers\cases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseRegistration;
use Illuminate\Pagination\LengthAwarePaginator;

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
            $query->where('file_no', $request->input('fileno'))->where('year', $request->input('year'));
        }

        if ($request->has('partyname')) {
            $query->where('applicant', 'like', '%' . $request->input('partyname') . '%');
        }

        if ($request->has('advocate')) {
            $query->where('padvocate', 'like', '%' . $request->input('advocate') . '%')->orWhere('radvocate', 'like', '%' . $request->input('advocate') . '%');
        }

        if ($request->has('casetype')) {
            $query->where('case_type', $request->input('casetype'));
        }

        if ($request->has('casedate')) {
            $query->where('dor', $request->input('casedate'));
        }

        if ($request->has('subject')) {
            $query->where('subject', 'like', '%' . $request->input('subject') . '%');
        }

        // Paginate the results
        $cases = $query->paginate(10);

        // Return response as JSON with pagination links
        return response()->json([
            'data' => $cases->items(),
            'links' => $cases->links('pagination::bootstrap-4')->toHtml(),
            'from' => $cases->firstItem(),
        ]);
    } // end mehtod

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
