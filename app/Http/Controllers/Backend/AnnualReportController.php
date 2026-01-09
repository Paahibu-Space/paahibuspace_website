<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnualReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $all_reports = \App\Models\AnnualReport::orderBy('year', 'desc')->get();
        return view('backend.annual-report.index', compact('all_reports'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|string',
            'year' => 'required|string',
            'file_url' => 'required|file|mimes:pdf|max:20480', // 20MB Max
            'status' => 'nullable',
            'description' => 'nullable|string'
        ]);

        $filePath = null;
        if ($request->hasFile('file_url')) {
            $file = $request->file('file_url');
            $fileName = time() . '-' . \Str::slug($request->title) . '.' . $file->extension();
            $destinationPath = 'assets/uploads/annual-reports';
            $file->move($destinationPath, $fileName);
            $filePath = $destinationPath . '/' . $fileName;
        }

        \App\Models\AnnualReport::create([
            'title' => $request->title,
            'year' => $request->year,
            'file_url' => $filePath,
            'status' => $request->status === 'publish',
            'description' => $request->description
        ]);

        return redirect()->back()->with(['msg' => __('New Report Added'), 'type' => 'success']);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required|string',
            'year' => 'required|string',
            'file_url' => 'nullable|file|mimes:pdf|max:20480',
            'status' => 'nullable',
            'description' => 'nullable|string'
        ]);

        $report = \App\Models\AnnualReport::find($request->id);
        $filePath = $report->file_url;

        if ($request->hasFile('file_url')) {
            // Delete old file if exists
            if ($filePath && file_exists($filePath)) {
                try {
                    unlink($filePath);
                } catch (\Exception $e) {
                    // Ignore delete errors
                }
            }
            $file = $request->file('file_url');
            $fileName = time() . '-' . \Str::slug($request->title) . '.' . $file->extension();
            $destinationPath = 'assets/uploads/annual-reports';
            $file->move($destinationPath, $fileName);
            $filePath = $destinationPath . '/' . $fileName;
        }

        $report->update([
            'title' => $request->title,
            'year' => $request->year,
            'file_url' => $filePath,
            'status' => $request->status === 'publish',
            'description' => $request->description
        ]);

        return redirect()->back()->with(['msg' => __('Report Updated'), 'type' => 'success']);
    }

    public function delete($id) {
        $report = \App\Models\AnnualReport::find($id);
        if ($report) {
             if ($report->file_url && file_exists($report->file_url)) {
                try {
                    unlink($report->file_url);
                } catch (\Exception $e) {
                    // Ignore delete errors
                }
            }
            $report->delete();
        }
        return redirect()->back()->with(['msg' => __('Report Deleted'), 'type' => 'danger']);
    }
}
