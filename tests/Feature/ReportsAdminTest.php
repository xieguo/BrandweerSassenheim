<?php

namespace Tests\Feature;

use App\Report;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReportsAdminTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanCreateReport()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = [
            'title' => 'Test report',
            'date' => date('Y-m-d'),
            'time' => date('H:i'),
            'address' => 'Test street 123',
            'city' => 'Test city',
        ];

        $response = $this->followingRedirects()
            ->post(route('admin.reports.store'), $attributes);

        $response->assertStatus(200);

        foreach ($attributes as $value)
        {
            $response->assertSee($value);
        }
    }

    public function testCanPaginateReports()
    {
        factory(Report::class, 51)->create();

        $response = $this->get(route('admin.reports.index'));

        // Confirm we see the "next" page link
        $response->assertSee('rel="next"');

        $response = $this->get(route('admin.reports.index', ['page' => 2]));

        // Confirm we see the "next" page link
        $response->assertSee('rel="prev"');
    }
}
