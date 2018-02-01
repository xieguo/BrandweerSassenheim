<?php

namespace App\Http\Controllers;

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
     * @param int|null $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($year = null)
    {
        $year = intval($year ?: date('Y'));

        if ($year < 2000 || $year > date('Y'))
        {
            return redirect(route('report.index'));
        }

        $years = Report::getDistinctYears();
        $reports = Report::orderBy('report_at', 'desc')
            ->with('files')
            ->whereYear('report_at', $year)
            ->where('is_visible', 1)
            ->paginate(50);

        return view('report.index', compact('year', 'reports', 'years'));
    }

    /**
     * Report detail page
     *
     * @param Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($date, Report $report, $slug)
    {
        $related_reports = Report::orderBy('report_at', 'desc')
            ->where('report_at', '<', $report->report_at)
            ->limit(3)
            ->get();

        return view('report.show', compact('report', 'related_reports'));
    }

    /**
     * Create a new report
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $report = new Report();

        return view('report.create', compact('report'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $report = $this->validateAndPersist($request);

        return redirect($report->path . '/edit');
    }

    /**
     * @param Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    /**
     * @param Report $report
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Report $report, Request $request)
    {
        $report = $this->validateAndPersist($request, $report);

        return redirect($report->path);
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
            'guid' => $report->generateGuid(),
        ]);

        $report->save();

        return $report;
    }
}
