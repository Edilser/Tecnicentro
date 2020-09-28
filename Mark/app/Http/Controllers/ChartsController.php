<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    // Apex Charts
    public function apex(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Charts & Maps"], ['name'=>"Apex"]
      ];
      return view('/pages/chart-apex', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Chartjs Charts
    public function chartjs(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Charts & Maps"], ['name'=>"Chartjs"]
      ];
      return view('/pages/chart-chartjs', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Echarts Charts
    public function echarts(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Charts & Maps"], ['name'=>"Echarts"]
      ];
      return view('/pages/chart-echarts', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Google Maps
    public function maps_google(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Maps"], ['name'=>"Google Maps"]
      ];
      return view('/pages/maps-google', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
}
