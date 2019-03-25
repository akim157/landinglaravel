<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class AdminPagesController extends Controller
{
    //
    public function expens()
    {
        $pages = Page::all();
        $data = [
            'title' => 'Список страницы',
            'pages' => $pages
        ];
        return view('admin.pages', $data);
    }
}
