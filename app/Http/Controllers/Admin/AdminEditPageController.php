<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class AdminEditPageController extends Controller
{
    //
    public function expens(Page $page, Request $request)
    {
        if(view()->exists('admin.page_edit'))
        {
            $data = [
                'title' => 'Редактирование страницы - '. $page->name,
                'page' => $page
            ];
            return view('admin.page_edit', $data);
        }
    }
}
