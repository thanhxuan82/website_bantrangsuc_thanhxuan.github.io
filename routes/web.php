<?php
use Illuminate\Http\Request;

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
//----------------------------------------User,login,register,logout----------------------------------------//
Route::get('/', function(Request $r){

    return view('user.index');
   // if(Auth::check()){
      //  return Redirect('/');
    //}else{
      //  return view('user.login');
    //}

});
Route::get('/login', function () {
     if(Auth::check()){
       return Redirect('/');
    }else{
       return view('user.login');
    }
    return view('user.login');
});
Route::get('/register',function(){
    return view('user.register');
});
Route::get('/store-user','UserController@store')->name('store-user');
Route::post('/login-user','UserController@post_login')->name('login-user');
Route::get('/logout',function(){
    Auth::logout();
    return Redirect('/');
});
///login facebook,google
Route::get('/login/{social}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback');
//-----------------------------profile,update--------------------------------------//
Route::group(['middleware' => 'CheckLogin'], function () {

    Route::get('/profile','UserController@profile');
    Route::POST('update-profile','UserController@update_profile')->name('update-profile');


});
//------------------------------------shop--------------------------------------------------------------
Route::get('/top','ProductController@topStar');
Route::get('/shop','ProductController@shop');
Route::get('/details/{id}','ProductController@details')->name('details');
Route::get('/voting','VoteController@voting')->name('vote-product');
Route::get('/comment','VoteController@comment')->name('comment');
//---------------------------------------Cart----------------------------------------------------------
Route::get('/addcart','CartController@AddCart')->name('addcart');
Route::get('/deleteitemcart','CartController@DeleteItemCart')->name('deleteitemcart');
Route::get('/deleteitemcartajax','CartController@DeleteItemCartAjax')->name('deleteitemcartajax');
Route::get('/list-cart','CartController@listCart');
Route::get('/deleteitemlistcartajax','CartController@DeleteItemListCart')->name('deleteitemlistcart');
Route::get('/updateitemcart','CartController@UpdateItemCart')->name('updateitemcart');
//---------------------------------------------payment-------------------------------------------------
Route::group(['middleware' => 'CheckLogin'], function () {

    Route::get('/payment','PaymentController@payment');

    Route::get('/success','PaymentController@success');
//--------------------------------------------------address---------------------------------------------
    Route::post('/addaddress','AddressController@store')->name('store-address');
    Route::get('/address','AddressController@infotAddress');
//----------------------------------------------------Order----------------------------------------------
Route::get('/order','OrderController@list');
});

Route::get('/test', function (Request $r ) {


    $vote=App\Vote::groupBy('product')
    ->selectRaw('sum(star) as sumStar, product')->orderByDesc('sumStar')->take(4)->get();

    foreach($vote as $v){
        echo $v->products->name;
        echo $v->sumStar;
    }
});













//------------------------------------------------admin-----------------------------------------------
Route::group(['middleware' => 'CheckUser'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        });
        Route::get('/list-product','ProductController@getall')->name('list-product');
        Route::get('/add-product', function () {
            return view('admin.add_product');
        });
        Route::get('update-product/{id}','ProductController@update')->name('updateproduct');
        Route::post('update-product/{id}','ProductController@postupdate');
        Route::get('delete-product/{id}','ProductController@delete');

        Route::post('/add-product', 'ProductController@store');

        Route::group(['prefix' => 'account'], function() {

            Route::get('list-all','UserController@listall')->name('listAccount');

            Route::get('update/{id}','UserController@update')->name('updateAccount');
            Route::post('update/{id}','UserController@postupdate');

            Route::get('create','UserController@create')->name('createAccount');
            Route::post('create','UserController@postcreate');

            Route::get('delete/{id}','UserController@delete');


        });

        Route::group(['prefix' => 'bill'], function() {

            Route::get('list-all','OrderController@listBill')->name('listBill');

            Route::get('delete/{id}','OrderController@deletebills');

            Route::get('status0/{id}','OrderController@status0');
            Route::get('status1/{id}','OrderController@status1');
            Route::get('status2/{id}','OrderController@status2');


        });
        Route::get('delete-comment/{id}','ProductController@deletecomment');
    });
});
Route::get('search-product','ProductController@searchProduct')->name('search-product');


//------------------------------------------------test-----------------------------------------------


Route::get('addcart/{id}','CartController@AddCart');
