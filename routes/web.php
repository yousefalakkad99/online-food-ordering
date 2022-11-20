<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\IndexComponent;
use App\Http\Livewire\SelectCategoryComponent;
use App\Http\Livewire\testComponent;

use App\Http\Livewire\Admin\DailymealsComponent;
use App\Http\Livewire\Admin\EditDailymealsComponent;
use App\Http\Livewire\Admin\AddDailymealsComponent;

use App\Http\Livewire\Admin\FoodComponent;
use App\Http\Livewire\Admin\EditFoodComponent;
use App\Http\Livewire\Admin\AddFoodComponent;

use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\AddCategoryComponent;

use App\Http\Livewire\Admin\GallaryComponent;
use App\Http\Livewire\Admin\AddGallaryComponent;


use App\Http\Livewire\Admin\ContactComponent;
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

Route::get('/',IndexComponent::class)->name('index');
Route::get('/select-category/{category_id}',SelectCategoryComponent::class)->name('select.category');



// Route::middleware(['auth'])->group(function(){

//     Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
// });

Route::middleware(['auth','authadmin'])->group(function(){

     //*********************************************Begin Category****************************************************** */
      Route::get('/admin/category',CategoryComponent::class)->name('admin.category');
      Route::get('/admin/add/category',AddCategoryComponent::class)->name('admin.add.category');
      Route::get('/admin/edit/category/{category_id}',EditCategoryComponent::class)->name('admin.edit.category');
     //*********************************************End Categoty***************************************************** */

      //*********************************************Begin Daily Meal****************************************************** */
      Route::get('/admin/daily-meal',DailymealsComponent::class)->name('admin.dailymeal');
      Route::get('/admin/add/daily-meal',AddDailymealsComponent::class)->name('admin.add.dailymeal');
      Route::get('/admin/edit/daily-meal/{dailymeal_id}',EditDailymealsComponent::class)->name('admin.edit.dailymeal');
      //*********************************************End Daily Meal***************************************************** */

      //*********************************************Begin Food****************************************************** */
      Route::get('/admin/food',FoodComponent::class)->name('admin.food');
      Route::get('/admin/add/food',AddFoodComponent::class)->name('admin.add.food');
      Route::get('/admin/edit/food/{food_id}',EditFoodComponent::class)->name('admin.edit.food');
      //*********************************************End Food***************************************************** */

      //*********************************************Begin Gallary****************************************************** */
      Route::get('/admin/Gallary',GallaryComponent::class)->name('admin.Gallary');
      Route::get('/admin/add/Gallary',AddGallaryComponent::class)->name('admin.add.Gallary');

      //*********************************************End Gallary***************************************************** */

      Route::get('/admin/contact',ContactComponent::class)->name('admin.contact');

});
require __DIR__.'/auth.php';
