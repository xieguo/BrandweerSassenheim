<?php

namespace App\Console\Commands;

use App\Report;
use Base\Framework\Parser\P2000;
use Illuminate\Console\Command;

class P2000Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'p2000:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse the P2000 for reports in Sassenheim';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $parser = new P2000();
        $parser->parse(2);

        foreach ($parser->items() as $item)
        {
            $report = new Report();
            $report->title = $item['title'];
            $report->report_at = $item['created_at'];
            $report->guid = $report->generateGuid();
            $report->source = 'P2000';
            $report->is_visible = 0;

            // Does the same report already exist?
            if (Report::where('guid', $report->guid)->count())
            {
                continue;
            }

            $report->save();
        }
    }
}
