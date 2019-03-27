<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Validator;

class AdminEditServicesController extends Controller
{
    //
    public function expens(Service $service, Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');

            $rules = [
                'name' => 'requried|max:255',
                'icon' => 'required|max:100',
                'text' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->route('service_edit')->withErrors($validator)->withInput();
            }
            $service->fill($input);
            if($service->update())
            {
                return redirect()->route('services')->with('status', 'Update service');
            }
            return redirect()->route('services')->with('status', 'Error update');
        }
        if(view()->exists('admin.service_edit'))
        {
            $data = [
                'title' => 'Редактировать услугу - '. $service->name,
                'service' => $service
            ];
            return view('admin.service_edit', $data);
        }
    }
}
