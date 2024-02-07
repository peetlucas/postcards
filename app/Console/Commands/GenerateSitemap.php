<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Postcard;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $postsitmap = Sitemap::create();
        Postcard::get()->each(function (Postcard $postcard) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/?page={$postcard->id}")
                    ->setLastModificationDate(Carbon::now())
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}
