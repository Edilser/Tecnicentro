<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserStatsAppController extends Controller
{
    // User Settings App
    public function user_stats(){
      $breadcrumbs = [
        ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"User Settings"]
      ];

      return view('/pages/app-user-stats', [
        'breadcrumbs' => $breadcrumbs
      ]);
    }
}
