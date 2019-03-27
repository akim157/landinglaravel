<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Validator;

class AdminAddServicesController extends Controller
{
    //
    public function expens(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');

            $rules = [
                'name' => 'required|max:255',
                'icon' => 'required|max:100',
                'text' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('service_add')->withErrors($validator)->withInput();
            }
            $service = new Service;
            $service->fill($input);
            if($service->save())
            {
                return redirect()->route('services')->with('status', 'Service add');
            }
            return redirect()->route('services')->with('status', 'Error service');
        }
        if(view()->exists('admin.service_add'))
        {
            $data = [
                'title' => 'Добавить услугу'
            ];
            return view('admin.service_add', $data);
        }
        abort(404);
    }
}
