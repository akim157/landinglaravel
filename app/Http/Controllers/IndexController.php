<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

class IndexController extends Controller
{
    //
    public function expens(Request $request)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text'  => 'required'
            ];
            $messages = [
                'required' => 'Поле :attribute обязательно для ввода!',
                'email' => 'В поле :attribute не верно указана почта!',
                'max' => 'В поле :attribute превышено количество символов, макисмально :max символов!'
            ];
            $this->validate($request, $rules, $messages);

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OrderShipped($request));
            return redirect()->route('home')->with('status', 'Email is send');
        }
        $pages = Page::all();
        $services = Service::all();
        $filters = Portfolio::distinct()->select('filter')->get();
        $portfolios = Portfolio::all();
        $peoples = People::get(['name', 'professia', 'images', 'text']);

        $menu = [];
        foreach($pages as $page)
        {
            $item = ['name' => $page->name, 'alias' => $page->alias];
            $menu[] = $item;
        }

        $item = ['name' => 'Services', 'alias' => 'service'];
        $menu[] = $item;

        $item = ['name' => 'Portfolio', 'alias' => 'Portfolio'];
        $menu[] = $item;

        $item = ['name' => 'Team', 'alias' => 'team'];
        $menu[] = $item;

        $item = ['name' => 'Contact', 'alias' => 'contact'];
        $menu[] = $item;


        $data = [
            'menu'  => $menu,
            'pages' => $pages,
            'services' => $services,
            'filters'   => $filters,
            'portfolios' => $portfolios,
            'peoples'   => $peoples
        ];
        return view('site.index', $data);
    }

    public function read(Page $page)
    {
        if(view()->exists('site.page'))
        {
            $data = [
                'title' => $page->name,
                'page' => $page
            ];
            return view('site.page', $data);
        }
        abort(404);
    }
}
