<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\DeleteController;
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

// Route::get('/linkstorage', function () {
//     \Artisan::call('storage:link');
// });

// optimize
Route::get('/clear', function() 
{
    \Artisan::call('optimize');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    return "Cache is cleared";
});

// you can do something 
// Route::get('/xhr', function() {
//     // DB::table('admx')->insert(['name' => 'Vadim', 'email' => 'xxx@gmail.com', 'password' => Hash::make('0202sx')]);
//     return "O>K.";
    
// });

//  Route::get('/go_hash', [AdminController::class, 'hash']);

// test/uniT_test/debuging
Route::get('test', [AdminController::class, 'test']);

/*home page*/
Route::get('/', [MainController::class, 'home']);
// Route::get('/')



/*products show all/ filters/ sortings*/
Route::post('/filter', [MainController::class, 'findItem']);
Route::get('/products', [MainController::class, 'ShowProducts']);
Route::get('/product/{id}', [MainController::class, 'ShowItem']);
Route::get('/products/brand/{name}', [MainController::class, 'showItems']);
Route::get('/products/cat/{name}', [MainController::class, 'showItems']);
Route::get('/products/price/{name}', [MainController::class, 'showItems']);
// проверить переменную как то на данные что такого нет из бд сверить
// данные на последний ключь и з бд и редирект 

/* send comment */
Route::get('/send_recall', [MainController::class, 'sendRecall']);

/*login - logout - request Admin*/
Route::get('/login_x', [AdminController::class, 'login_x']);
Route::get('logout', [AdminController::class, 'logout']);
Route::post('/sendx', [AdminController::class, 'send_x']);

/* About us */
Route::get('/contact', [MainController::class, 'contact']);

/*Login/logout/registration User */
Route::get('/login', [MainController::class, 'login']);
Route::get('/registration', [MainController::class, 'registration']);
Route::get('/cart', [MainController::class, 'payUser']);
/* go inside */
Route::post('/comeIn', [MainController::class, 'comeIn']);
Route::post('/registrationIn', [MainController::class, 'registrationIn']);

/* only auth  /update/image/name... */
Route::get('/user', [MainController::class, 'showUser']);
Route::post('/upd', [MainController::class, 'updateUserData']);
Route::get('/logout', [MainController::class, 'logout']);
// test only test
Route::post('/pull', [AdminController::class, 'test_getting_data_in_the_fill']);

/**
* Only admin
*/
Route::middleware(['adm', 'revalidate'])->group(function(){
    // hosting not have CLI
    // but you can use Artisan commands
    
    // Route::get('/run_migrate', function(){
    //     \Artisan::call('migrate:refresh --path=/database/migrations/2021_07_01_002654_create_products_table.php'); 
    // });

    // Route::get('create_m', function(){
    //     \Artisan::call('make:model MiniImg -m');
    //     \Artisan::call('make:model Social -m');
    //     return "создал модель и миграцию";
    // });

    // Route::get('m_ready', function(){
    //     \Artisan::call('migrate');
    //     return "миграция запущена";
    // });
    
    /**
     * AddController method`s
     */
    Route::post('/add_slide', [AddController::class, 'add_slider']);
    Route::post('/add_piece', [AddController::class, 'add_pieces']);
    Route::post('/add_partner', [AddController::class, 'add_partner']);
    Route::post('/add_foo/{id}', [AddController::class, 'add_Fo_Itms']);
    Route::post('/add_icon', [AddController::class, 'add_mini']);
    Route::post('/add_icons', [AddController::class, 'add_soc']);
    
    /**
     * DeleteController method`s
     */
    Route::get('/delete_opt/{id}', [DeleteController::class, 'delete_slider_opt']);
    Route::get('/delete_piece/{id}', [DeleteController::class, 'delete_piece']);
    Route::get('/delete_partner/{id}', [DeleteController::class, 'delete_partners']);
    Route::get('/del_mini/{id}', [DeleteController::class, 'delete_mini']);
    Route::get('/del_icon/{id}', [DeleteController::class, 'delete_icon']);

    Route::get('/say', [AddController::class, 'say']);
    // admin config redactor for main page
    Route::get('/edito_admin', [AdminController::class, 'editAdmin']);
    // all items 
    Route::get('/items', [AdminController::class, 'showItems']);
	// admin main
    Route::get('/admin', [AdminController::class, 'admin']);
    // view add
    Route::get('/add', [AdminController::class, 'addItem']);
    // view update
    Route::get('/update/{id}', [AdminController::class, 'update_item']);    
    // add argument
    Route::post('/add_arx', [AdminController::class, 'addArx']);
    // add pro_args
    Route::post('/add_proargs', [AdminController::class, 'procats_save']);
    // destroy argument
    Route::get('/del_arg/{id}', [AdminController::class, 'del_item_arg']);
    // add item
    Route::post('/added', [AdminController::class, 'add']);
    // Update item
    Route::put('/current_up/{id}', [AdminController::class, 'upd']);
    // destroy item
    Route::get('/destroy/{id}', [AdminController::class, 'destroy']);
    // control args
    Route::get('/controllargs', [AdminController::class, 'controlArgs']);
});
