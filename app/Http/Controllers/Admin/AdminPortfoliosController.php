<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;

class AdminPortfoliosController extends Controller
{
    //
    public function expens()
    {
        if(view()->exists('admin.portfolio'))
        {
            $portfolios = Portfolio::all();
            $data = [
                'title'         =>  'Портфолио',
                'portfolios'    =>  $portfolios
            ];
            return view('admin.portfolio', $data);
        }
    }
}
