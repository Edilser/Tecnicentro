<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    // Content Grid
    public function grid(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Content"], ['name'=>"Grid"]
      ];
      return view('/pages/content-grid', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Content Typography
    public function typography(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Content"], ['name'=>"Typography"]
      ];
      return view('/pages/content-typography', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Content Text Utilities
    public function text_utilities(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Content"], ['name'=>"Text Utilities"]
      ];
      return view('/pages/content-text-utilities', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Content Syntax Highlighter
    public function syntax_highlighter(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Content"], ['name'=>"Syntax Highlighter"]
      ];
      return view('/pages/content-syntax-highlighter', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Content Helper Classes
    public function helper_classes(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Content"], ['name'=>"Helper Classes"]
      ];
      return view('/pages/content-helper-classes', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // UI Elements - Colors
    public function colors(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['name'=>"Colors"]
      ];
      return view('/pages/colors', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
}
