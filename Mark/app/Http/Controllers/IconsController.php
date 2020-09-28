<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconsController extends Controller
{
    // Icons Feather
    public function icons_feather(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Icons"], ['name'=>"Feather Icons"]
      ];
      return view('/pages/icons-feather', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Icons Font Awesome
    public function icons_font_awesome(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Icons"], ['name'=>"Font Awesome"]
      ];
      return view('/pages/icons-font-awesome', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
}
