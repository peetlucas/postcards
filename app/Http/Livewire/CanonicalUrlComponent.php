<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;

class CanonicalUrlComponent extends Component
{
    public $canonicalUrl;

    public function render()
    {
        // Get the current URL
        $currentUrl = URL::full();
        $parts = parse_url($currentUrl);

        // Initialize an empty path
        $path = '';

        // Check if 'path' key exists
        if (isset($parts['path'])) {
            $path = $parts['path'];
        }

        // Get the query parameters
        parse_str(request()->getQueryString(), $query);

        // List of parameters to remove
        $parametersToRemove = ['utm_source', 'utm_medium', 'utm_campaign'];

        foreach ($parametersToRemove as $param) {
            unset($query[$param]);
        }

        // Keep the 'page' parameter if it exists
        if (isset($query['page'])) {
            $pageParam = $query['page'];
            $query = ['page' => $pageParam];
        }

        $newQuery = http_build_query($query);
        $newUrl = $path . '?' . $newQuery;

        $this->canonicalUrl = $newUrl;

        return view('livewire.canonical-url-component');
    }
}
