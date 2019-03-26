<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;

class AdminEditPageController extends Controller
{
    //
    public function expens(Page $page, Request $request)
    {
        if($request->isMethod('delete'))
        {
            $page->delete();
            return redirect()->route('pages')->with('status', 'Delete page - '. $page->name);
        }
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            $rules = [
                'name' => 'required|max:255',
                'alias'     =>  'required|max:255|unique:pages,alias,'.$input['id'],
                'text' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('page_edit', ['page' => $input['id']])->withErrors($validator)->withInput();
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
            $page->fill($input);
            if($page->update())
            {
                return redirect('admin/pages')->with('status', 'Update page');
            }
            return redirect('pages')->with('status', 'Update error!');
        }
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
