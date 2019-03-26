<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Validator;

class AdminAddPortfoliosController extends Controller
{
    //
    public function expens(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');

            $rules = [
                'name'      =>  'required|max:255',
                'filter'    =>  'required|max:100',
                'images'    =>  'required'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('portfolios')->withErrors($validator)->withInput();
            }
            if($request->hasFile('images'))
            {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }
            $portfolio = new Portfolio;
            $portfolio->fill($input);
            if($portfolio->save())
            {
                return redirect()->route('portfolios')->with('status','Portfolio save');
            }
            return redirect()->route('portfolios')->with('status', 'Error save');
        }
        if(view()->exists('admin.portfolio_add'))
        {
            $data = [
                'title' => 'Добавить портфолио'
            ];
            return view('admin.portfolio_add', $data);
        }
    }
}
