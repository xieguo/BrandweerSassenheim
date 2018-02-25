<?php

namespace Tests\Feature;

use App\Report;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReportsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testReportOnHomepage()
    {
        $report = factory(Report::class)->create();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSeeText($report->title);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testReportDetailPage()
    {
        $report = factory(Report::class)->create();

        $response = $this->get($report->path);

        $response->assertStatus(200)
            ->assertSeeText($report->title);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testReportYearOverviewPage()
    {
        $report = factory(Report::class)->create([
            'report_at' => Carbon::now(),
        ]);

        $response = $this->get(route('reports.year', [$report->report_at->format('Y')]));

        $response->assertStatus(200)
            ->assertSeeText($report->title);
    }
}
