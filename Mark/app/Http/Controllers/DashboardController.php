<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Empresa;


class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function DashboardAnalytics(){

        $emp = Empresa::first();
        

        Config::set(['emp.Empresa' => $emp->id]);
        $value = config('emp.Empresa');
        //dd($value);

       

        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/DashboardAnalytics', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce(){
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/dashboard-ecommerce', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}

