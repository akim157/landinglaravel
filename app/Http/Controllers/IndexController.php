<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;

class IndexController extends Controller
{
    //
    public function expens()
    {
        $pages = Page::all();
        $services = Service::all();
        $filters = Portfolio::distinct('filter')->get();
        $portfolios = Portfolio::all();

        $data = [
            'pages' => $pages,
            'services' => $services,
            'filters'   => $filters,
            'portfolios' => $portfolios
        ];
        return view('site.index', $data);
    }
}
