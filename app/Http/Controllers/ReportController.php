<?php

namespace App\Http\Controllers;

use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
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
            return redirect(route('reports.index'));
        }

        $years = Report::getDistinctYears();
        $reports = Report::orderBy('report_at', 'desc')
            ->with('files')
            ->whereYear('report_at', $year)
            ->where('is_visible', 1)
            ->paginate(50);

        return view('reports.index', compact('year', 'reports', 'years'));
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

        return view('reports.show', compact('report', 'related_reports'));
    }
}
