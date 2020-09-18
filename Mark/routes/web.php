<?php
use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route url
Route::get('/dashboardAnalytics', 'DashboardController@dashboardAnalytics');

Route::get('/', function () {
    if(Auth::check()) {
      return redirect('/dashboardAnalytics');
    } else {
        return view('auth.login');
    }
  });

// // Route Dashboards
// Route::get('/dashboard-analytics', 'DashboardController@dashboardAnalytics');
// Route::get('/dashboard-ecommerce', 'DashboardController@dashboardEcommerce');


// // Route Apps
// Route::get('/app-email', 'EmailAppController@emailApp');
// Route::get('/app-chat', 'ChatAppController@chatApp');
// Route::get('/app-todo', 'ToDoAppController@todoApp');
// Route::get('/app-calender', 'CalenderAppController@calenderApp');
// Route::get('/app-ecommerce-shop', 'EcommerceAppController@ecommerce_shop');
// Route::get('/app-ecommerce-details', 'EcommerceAppController@ecommerce_details');
// Route::get('/app-ecommerce-wishlist', 'EcommerceAppController@ecommerce_wishlist');
// Route::get('/app-ecommerce-checkout', 'EcommerceAppController@ecommerce_checkout');
// Route::get('/app-file-manager', 'FileManagerController@file_manager');

// // Users Pages
// Route::get('/app-user-list', 'UserPagesController@user_list');
// Route::get('/app-user-view', 'UserPagesController@user_view');
// Route::get('/app-user-edit', 'UserPagesController@user_edit');

// // Route Data List
// Route::resource('/data-list-view','DataListController');
// Route::resource('/data-thumb-view', 'DataThumbController');


// // Route Content
// Route::get('/content-grid', 'ContentController@grid');
// Route::get('/content-typography', 'ContentController@typography');
// Route::get('/content-text-utilities', 'ContentController@text_utilities');
// Route::get('/content-syntax-highlighter', 'ContentController@syntax_highlighter');
// Route::get('/content-helper-classes', 'ContentController@helper_classes');

// // Route Color
// Route::get('/colors', 'ContentController@colors');

// // Route Icons
// Route::get('/icons-feather', 'IconsController@icons_feather');
// Route::get('/icons-font-awesome', 'IconsController@icons_font_awesome');

// // Route Cards
// Route::get('/card-basic', 'CardsController@card_basic');
// Route::get('/card-advance', 'CardsController@card_advance');
// Route::get('/card-statistics', 'CardsController@card_statistics');
// Route::get('/card-analytics', 'CardsController@card_analytics');
// Route::get('/card-actions', 'CardsController@card_actions');

// // Route Components
// Route::get('/component-alert', 'ComponentsController@alert');
// Route::get('/component-buttons', 'ComponentsController@buttons');
// Route::get('/component-breadcrumbs', 'ComponentsController@breadcrumbs');
// Route::get('/component-carousel', 'ComponentsController@carousel');
// Route::get('/component-collapse', 'ComponentsController@collapse');
// Route::get('/component-dropdowns', 'ComponentsController@dropdowns');
// Route::get('/component-list-group', 'ComponentsController@list_group');
// Route::get('/component-modals', 'ComponentsController@modals');
// Route::get('/component-pagination', 'ComponentsController@pagination');
// Route::get('/component-navs', 'ComponentsController@navs');
// Route::get('/component-navbar', 'ComponentsController@navbar');
// Route::get('/component-tabs', 'ComponentsController@tabs');
// Route::get('/component-pills', 'ComponentsController@pills');
// Route::get('/component-tooltips', 'ComponentsController@tooltips');
// Route::get('/component-popovers', 'ComponentsController@popovers');
// Route::get('/component-badges', 'ComponentsController@badges');
// Route::get('/component-pill-badges', 'ComponentsController@pill_badges');
// Route::get('/component-progress', 'ComponentsController@progress');
// Route::get('/component-media-objects', 'ComponentsController@media_objects');
// Route::get('/component-spinner', 'ComponentsController@spinner');
// Route::get('/component-toast', 'ComponentsController@toast');

// // Route Extra Components
// Route::get('/ex-component-avatar', 'ExtraComponentsController@avatar');
// Route::get('/ex-component-chips', 'ExtraComponentsController@chips');
// Route::get('/ex-component-divider', 'ExtraComponentsController@divider');

// // Route Forms
// Route::get('/form-select', 'FormsController@select');
// Route::get('/form-switch', 'FormsController@switch');
// Route::get('/form-checkbox', 'FormsController@checkbox');
// Route::get('/form-radio', 'FormsController@radio');
// Route::get('/form-input', 'FormsController@input');
// Route::get('/form-input-groups', 'FormsController@input_groups');
// Route::get('/form-number-input', 'FormsController@number_input');
// Route::get('/form-textarea', 'FormsController@textarea');
// Route::get('/form-date-time-picker', 'FormsController@date_time_picker');
// Route::get('/form-layout', 'FormsController@layouts');
// Route::get('/form-wizard', 'FormsController@wizard');
// Route::get('/form-validation', 'FormsController@validation');

// // Route Tables
// Route::get('/table', 'TableController@table');
// Route::get('/table-datatable', 'TableController@datatable');
// Route::get('/table-ag-grid', 'TableController@ag_grid');

// // Route Pages
// Route::get('/page-user-profile', 'PagesController@user_profile');
// Route::get('/page-faq', 'PagesController@faq');
// Route::get('/page-knowledge-base', 'PagesController@knowledge_base');
// Route::get('/page-kb-category', 'PagesController@kb_category');
// Route::get('/page-kb-question', 'PagesController@kb_question');
// Route::get('/page-search', 'PagesController@search');
// Route::get('/page-invoice', 'PagesController@invoice');
// Route::get('/page-account-settings', 'PagesController@account_settings');
// Route::get('/pricing', 'PagesController@pricing');

// // Route Authentication Pages
Route::get('/auth-login', 'AuthenticationController@login');
// Route::get('/auth-register', 'AuthenticationController@register');
// Route::get('/auth-forgot-password', 'AuthenticationController@forgot_password');
// Route::get('/auth-reset-password', 'AuthenticationController@reset_password');
// Route::get('/auth-lock-screen', 'AuthenticationController@lock_screen');

// // Route Miscellaneous Pages
// Route::get('/page-coming-soon', 'MiscellaneousController@coming_soon');
// Route::get('/error-404', 'MiscellaneousController@error_404');
// Route::get('/error-500', 'MiscellaneousController@error_500');
// Route::get('/page-not-authorized', 'MiscellaneousController@not_authorized');
// Route::get('/page-maintenance', 'MiscellaneousController@maintenance');

// // Route Charts & Google Maps
// Route::get('/chart-apex', 'ChartsController@apex');
// Route::get('/chart-chartjs', 'ChartsController@chartjs');
// Route::get('/chart-echarts', 'ChartsController@echarts');
// Route::get('/maps-google', 'ChartsController@maps_google');

// // Route Extension Components
// Route::get('/ext-component-sweet-alerts', 'ExtensionController@sweet_alert');
// Route::get('/ext-component-toastr', 'ExtensionController@toastr');
// Route::get('/ext-component-noui-slider', 'ExtensionController@noui_slider');
// Route::get('/ext-component-file-uploader', 'ExtensionController@file_uploader');
// Route::get('/ext-component-quill-editor', 'ExtensionController@quill_editor');
// Route::get('/ext-component-drag-drop', 'ExtensionController@drag_drop');
// Route::get('/ext-component-tour', 'ExtensionController@tour');
// Route::get('/ext-component-clipboard', 'ExtensionController@clipboard');
// Route::get('/ext-component-plyr', 'ExtensionController@plyr');
// Route::get('/ext-component-context-menu', 'ExtensionController@context_menu');
// Route::get('/ext-component-swiper', 'ExtensionController@swiper');
// Route::get('/ext-component-i18n', 'ExtensionController@i18n');

// // acess controller
// Route::get('/access-control', 'AccessController@index');
// Route::get('/access-control/{roles}', 'AccessController@roles');
// Route::get('/modern-admin', 'AccessController@home')->middleware('role:Admin');


Auth::routes();

Route::group(['middleware' => ['auth']], function() {

Route::post('/login/validate', 'Auth\LoginController@validate_api');

// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);

//CLIENTE
Route::get('/cliente/descargar', 'ClienteController@download')->name('cliente.download');
Route::post('cliente/search', 'ClienteController@search')->name('cliente.search');
Route::get('cliente/delete/{id}', 'ClienteController@delete')->name('cliente.delete');
Route::resource('cliente', 'ClienteController');

//EMPRESA
Route::get('/pdfempresas', 'ControllerPdf@PDFempresas')->name('descargarempresa');
//Route::get('/excelempresas', 'ControllerPdf@exportExcel')->name('descargarempresa');
Route::post('empresa/search', 'EmpresaController@search')->name('empresa.search');
Route::get('empresa/delete/{id}', 'EmpresaController@delete')->name('empresa.delete');
Route::resource('empresa', 'EmpresaController');

//VEHICULO
Route::get('/filtro/{id}', 'VehiculoController@filtro')->name('create.filtro');
Route::get('/total_select', 'VehiculoController@total_select');
Route::get('/pdfvehiculos', 'ControllerPdf@PDFvehiculos')->name('descargarvehiculo');
Route::get('vehiculo/search', 'VehiculoController@search')->name('vehiculo.search');
Route::get('vehiculo/delete/{id}', 'VehiculoController@delete')->name('vehiculo.delete');
Route::resource('vehiculo', 'VehiculoController');

//MARCA
Route::get('/marca/download', 'MarcaController@download')->name('marca.download');
Route::post('marca/search', 'MarcaController@search')->name('marca.search');
Route::get('marca/delete/{id}', 'MarcaController@delete')->name('marca.delete');
Route::resource('marca', 'MarcaController');

//MODELO
Route::get('/filtromod', 'ModeloController@filtro');
Route::get('/pdfmodelo', 'ControllerPdf@PDFmodelos')->name('descargarmodelo');
Route::post('modelo/search', 'ModeloController@search')->name('modelo.search');
Route::get('modelo/delete/{id}', 'ModeloController@delete')->name('modelo.delete');
Route::resource('modelo', 'ModeloController');

//TIPO
Route::get('/pdftipo', 'ControllerPdf@PDFtipos')->name('descargartipo');
Route::post('tipoVehiculo/search', 'TipoVehiculoController@search')->name('tipoVehiculo.search');
Route::get('tipoVehiculo/delete/{id}', 'TipoVehiculoController@delete')->name('tipoVehiculo.delete');
Route::resource('tipoVehiculo', 'TipoVehiculoController');






//PAIS
Route::get('pais/search','PaisController@Search')->name('pais.search');
Route::get('pais/descargar','PaisController@Download')->name('pais.download');
Route::get('pais/delete/{id}','PaisController@Delete')->name('pais.delete');
Route::resource('pais','PaisController');

//DEPTO
Route::get('depto/search','departamentoController@Search')->name('depto.search');
Route::get('depto/descargar','departamentoController@Download')->name('depto.download');
Route::get('depto/delete/{id}','departamentoController@Delete')->name('depto.delete');
Route::get('depto/searchByCountry/{id}','departamentoController@searchByCountry')->name('depto.searchByCountry');
Route::resource('depto','departamentoController');

//MUNICIPIO
Route::get('mun/search','MunicipioController@Search')->name('mun.search');
Route::get('mun/descargar','MunicipioController@Download')->name('mun.download');
Route::get('mun/delete/{id}','MunicipioController@Delete')->name('mun.delete');
Route::get('mun/searchByDepto/{id}','MunicipioController@searchByDepto')->name('mun.searchByDepto');
Route::resource('mun','MunicipioController');

//COTIZACIONES PARTICULAR
Route::get('/filtro_cliente/{id}', 'CotParticularController@filtro_cliente')->name('create.filtro_cliente');
Route::get('/filtro_vehiculo/{id}', 'CotParticularController@filtro_vehiculo')->name('create.filtro_vehiculo');
Route::get('/filtro/{id}', 'CotParticularController@filtro')->name('create.filtro');
Route::post('cotizacion-particular/search', 'CotParticularController@search')->name('cotparticular.search');
Route::get('cotizacion-particular/delete/{id}', 'CotParticularController@delete')->name('cotparticular.delete');
Route::get('/cotizacion-particular/descargar', 'CotParticularController@download')->name('cotparticular.download');
Route::get('/cotizacion-particular/cotizacionParticular/{id}', 'PDFController@particular')->name('cotizacionParticular.down');
Route::get('/cotizacion-particular/viewCotizacion/{id}', 'PDFController@ver')->name('cotizacionParticular.ver');
Route::resource('cotizacion-particular', 'CotParticularController');

//COTIZACIONES IGSS VEHICULO
Route::get('/filtro_clienteiv/{id}', 'CotIGSSVehiculoController@filtro_cliente')->name('create.filtro_cliente');
Route::get('/filtro_vehiculoiv/{id}', 'CotIGSSVehiculoController@filtro_vehiculo')->name('create.filtro_vehiculo');
Route::get('/filtroiv/{id}', 'CotIGSSVehiculoController@filtro')->name('create.filtro');
Route::post('cotizacion-vehiculo/search', 'CotIGSSVehiculoController@search')->name('cotigssvehiculo.search');
Route::get('cotizacion-vehiculo/delete/{id}', 'CotIGSSVehiculoController@delete')->name('cotigssvehiculo.delete');
Route::get('/cotizacion-vehiculo/descargar', 'CotIGSSVehiculoController@download')->name('cotigssvehiculo.download');
Route::get('/cotizacion-vehiculo/cotizacionVehiculo/{id}', 'PDFController@vehiculo')->name('cotizacionVehiculo.down');
Route::resource('cotizacion-vehiculo', 'CotIGSSVehiculoController');

//COTIZACIONES IGSS MOTO
Route::get('/filtro_clienteim/{id}', 'CotIGSSMotoController@filtro_cliente')->name('create.filtro_cliente');
Route::get('/filtro_vehiculoim/{id}', 'CotIGSSMotoController@filtro_vehiculo')->name('create.filtro_vehiculo');
Route::get('/filtroim/{id}', 'CotIGSSMotoController@filtro')->name('create.filtro');
Route::post('cotizacion-moto/search', 'CotIGSSMotoController@search')->name('cotigssmoto.search');
Route::get('cotizacion-moto/delete/{id}', 'CotIGSSMotoController@delete')->name('cotigssmoto.delete');
Route::get('/cotizacion-moto/descargar', 'CotIGSSMotoController@download')->name('cotigssmoto.download');
Route::resource('cotizacion-moto', 'CotIGSSMotoController');

});
