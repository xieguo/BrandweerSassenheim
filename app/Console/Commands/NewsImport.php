<?php

namespace App\Console\Commands;

use App\Article;
use Base\Framework\Parser\Xml;
use Illuminate\Console\Command;

class NewsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:import {source}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import news from the given source';

    protected $sources = [
        '112bollenstreek' => [
            'endpoint' => 'http://112bollenstreek.nl/rss/plaats/sassenheim',
        ],
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sourceName = $this->argument('source');

        if (!$source = array_get($this->sources, $sourceName))
        {
            throw new Exception('Invalid source');
        }

        $feed = new Xml(file_get_contents($source['endpoint']));
        $items = $feed->getArray('channel.item');

        foreach ($items as $item)
        {
            if ($this->getArticleBySourceNameAndGuid($sourceName, $item['guid'])->count())
            {
                continue;
            }

            $article = new Article();
            $article->type = Article::TYPE_NEWS;
            $article->title = $item['title'];
            $article->description = trim($item['description']);
            $article->source = $sourceName;
            $article->source_link = $item['link'];
            $article->source_guid = $item['guid'];
            $article->is_visible = 0;
            $article->is_frontpage = 1;

            if ($enclosure = $item['enclosure'])
            {
                $article->image = array_get($enclosure, '@attributes.url');
            }
            
            $article->save();
        }
    }

    /**
     * Returns an Article by its source and guid
     * 
     * @return Collection|null
     */
    private function getArticleBySourceNameAndGuid($sourceName, $guid)
    {
        return Article::where([
            'source' => $sourceName,
            'source_guid' => $guid
        ])->get();
    }
}
