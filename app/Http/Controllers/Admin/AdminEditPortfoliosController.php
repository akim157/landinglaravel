<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Validator;

class AdminEditPortfoliosController extends Controller
{
    //
    public function expens(Portfolio $portfolio, Request $request)
    {
        if($request->isMethod('delete'))
        {
            $portfolio->delete();
            return redirect()->route('portfolios')->with('status', 'Portfolio delete');
        }
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');

            $rules = [
                'name' => 'required|max:255',
                'filter' => 'required|max:100'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('portfolio_edit')->withErrors($validator)->withInput();
            }
            if($request->hasFile('images'))
            {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }
            else
            {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);
            $portfolio->fill($input);
            if($portfolio->update())
            {
                return redirect()->route('portfolios')->with('status', 'Portfolio update');
            }
            return redirect()->route('portfolio')->with('status', 'Update error');
        }
        if(view()->exists('admin.portfolio_edit'))
        {
            $data = [
                'title' => 'Редактирование портфолио - '.$portfolio->name,
                'portfolio' => $portfolio
            ];
            return view('admin.portfolio_edit', $data);
        }
    }
}
