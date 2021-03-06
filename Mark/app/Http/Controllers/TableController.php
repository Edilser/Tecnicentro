<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    // Bootstrap Table
    public function table(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['name'=>"Table"]
      ];
      return view('/pages/table', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // Datatable
    public function datatable(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['name'=>"Datatable"]
      ];
      return view('/pages/table-datatable', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }

    // ag-Grid Table
    public function ag_grid(){
      $breadcrumbs = [
          ['link'=>"DashboardAnalytics",'name'=>"Home"], ['name'=>"agGrid Table"]
      ];
      return view('/pages/table-ag-grid', [
          'breadcrumbs' => $breadcrumbs
      ]);
    }
}
