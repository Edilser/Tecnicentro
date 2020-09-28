<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    // Card Basic
    public function card_basic(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Card"], ['name'=>"Basic Card"]
      ];
      return view('/pages/card-basic', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Card Advance
    public function card_advance(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Card"], ['name'=>"Advance Card"]
      ];
      return view('/pages/card-advance', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Card Statistics
    public function card_statistics(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Card"], ['name'=>"Statistics Card"]
      ];
      return view('/pages/card-statistics', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Card Analytics
    public function card_analytics(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Card"], ['name'=>"Analytics Card"]
      ];
      return view('/pages/card-analytics', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Card Actions
    public function card_actions(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"],['link'=>"DashboardAnalytics",'name'=>"Card"], ['name'=>"Card Actions"]
      ];
      return view('/pages/card-actions', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

}
