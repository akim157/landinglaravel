<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class AdminServicesController extends Controller
{
    //
    public function expens()
    {
        if(view()->exists('admin.services'))
        {
            $services = Service::all();
            $data = [
                'title' => 'Сервисы',
                'services' => $services
            ];
            return view('admin.services',$data);
        }
    }
}
