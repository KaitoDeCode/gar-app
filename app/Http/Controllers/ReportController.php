<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Foto;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $foto_id)
    {
        $foto = Foto::where('id', $foto_id)->first();
        return view('pages.report.create', ['foto_id' => $foto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {

        $request->validate([
            'foto_id' => 'required|integer',
            'isi_report' => 'nullable|string'
        ]);


        Report::create([
            "user_id" => Auth::user()->id,
            "foto_id" => $request->foto_id,
            "isi_report" => $request->isi_report
        ]);



        // Redirect or perform any additional actions after storing the report

        return redirect()->route('explore')->with('success', 'Report submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report,$foto_id)
    {
        $dataReport = Report::where('foto_id',$foto_id)->get();

        return view('pages.report.index',compact('dataReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report_id)
    {
        // dump($report);
        $report_id->delete();
        return redirect()->back()->with('succes',"data report berhasil dihapus");
    }
}

