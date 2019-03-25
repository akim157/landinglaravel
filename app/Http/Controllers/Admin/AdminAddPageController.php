<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;

class AdminAddPageController extends Controller
{
    //
    public function expens(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            $rules = [
                'name' => 'required|max:255',
                'alias' => 'required|max:100|unique:pages,alias,'.$input['alias'],
                'images' => 'required',
                'text'  => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('page_add')->withErrors($validator)->withInput();
            }
            if($request->hasFile('images'))
            {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'assets/img', $input['images']);
                $page = new Page;
                $page->fill($input);
                if($page->save())
                {
                    return redirect()->route('pages')->with('status', 'Page added');
                }
                return redirect()->route('pages')->with('status', 'Add error');
            }
        }
        $data = ['title' => 'Add new page'];
        return view('admin.page_add', $data);
    }
}
