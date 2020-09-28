<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // User Profile
     public function user_profile(){
        $pageConfigs = [
          'sidebarCollapsed' => true
      ];

      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Profile"]
      ];

      return view('/pages/page-user-profile', [
          'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs
      ]);
    }

    // FAQ
    public function faq(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"FAQ"]
      ];
      return view('/pages/page-faq', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Knowledge Base
    public function knowledge_base(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Knowledge Base"]
      ];
      return view('/pages/page-knowledge-base', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Knowledge Base Category
    public function kb_category(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['link'=>"/page-knowledge-base",'name'=>"Knowledge Base"], ['name'=>"Category"]
      ];
      return view('/pages/page-kb-category', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Knowledge Base Question
    public function kb_question(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['link'=>"/page-knowledge-base",'name'=>"Knowledge Base"], ['link'=>"/page-kb-category",'name'=>"Category"], ['name'=>"Question"]
      ];
      return view('/pages/page-kb-question', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Search
    public function search(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Search"]
      ];
      return view('/pages/page-search', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Invoice
    public function invoice(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Invoice"]
      ];
      return view('/pages/page-invoice', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Account Settings
    public function account_settings(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Account Settings"]
      ];
      return view('/pages/page-account-settings', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
    public function pricing(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['link'=>"DashboardAnalytics",'name'=>"Pages"], ['name'=>"Pricing"]
      ];
      return view('/pages/pricing', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
}
