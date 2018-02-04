<?php

namespace App\Http\Controllers\Admin;

use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Overview of reports
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::orderBy('report_at', 'desc')
            ->with('files')
            ->paginate(50);

        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Report detail page
     *
     * @param Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Report $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Create a new report
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $report = new Report();

        return view('admin.reports.create', compact('report'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $report = $this->validateAndPersist($request);

        return redirect(route('admin.reports.show', $report->id));
    }

    /**
     * @param Report $report
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Report $report, Request $request)
    {
        $report = $this->validateAndPersist($request, $report);

        return redirect(route('admin.reports.show', $report->id));
    }

    /**
     * @param Report $report
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return back();
    }

    /**
     * @param Request $request
     * @param Report|null $report
     * @return Report
     */
    private function validateAndPersist(Request $request, Report $report = null)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $report = $report ?: new Report();
        $report->fill([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'is_visible' => $request->input('is_hidden') ? 0 : 1,
            'report_at' => Carbon::createFromFormat('Y-m-d H:i', $request->input('date') . ' ' . $request->input('time')),
        ]);

        // Only generate guid upon creation
        if (!$report->exists)
        {
            $report->guid = $report->generateGuid();
        }

        $report->save();

        return $report;
    }
}
