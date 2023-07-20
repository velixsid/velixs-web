<?php

use App\Http\Controllers\Admin\AProductController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\LicenseController;
use App\Http\Controllers\Admin\OtherController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'admin',
    'middleware' => ['isadmin']
],function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('product')->group(function () {
        Route::get('/',[AProductController::class, 'index'])->name('admin.product.index');
        Route::get('/trash',[AProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('/trash/recovery/{id}',[AProductController::class, 'trash_recovery'])->name('admin.product.trash.recovery');
        Route::get('/json',[AProductController::class, 'json'])->name('admin.product.json');
        Route::post('/destroy',[AProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::post('/destroy/force',[AProductController::class, 'destroy_force'])->name('admin.product.destroy.force');

        Route::get('/create', [AProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [AProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [AProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [AProductController::class, 'update'])->name('admin.product.update');

        Route::get('/release/{id}', [AProductController::class, 'release'])->name('admin.product.release');
        Route::post('/release/{id}', [AProductController::class, 'release_update'])->name('admin.product.release.update');
        Route::get('/release/force/{id}', [AProductController::class, 'release_force'])->name('admin.product.release.force');

        Route::get('/tags',[AProductController::class, 'tags_index'])->name('admin.product.tags');
        Route::get('/tags/json',[AProductController::class, 'tags_index'])->name('admin.product.tags.json');
        Route::post('/tags/create',[AProductController::class, 'tags_create'])->name('admin.product.tags.create');
        Route::post('/tags/destroy',[AProductController::class, 'tags_destroy'])->name('admin.product.tags.destroy');
        Route::get('/tags/edit/{id}',[AProductController::class, 'tags_edit'])->name('admin.product.tags.edit');
        Route::post('/tags/update',[AProductController::class, 'tags_update'])->name('admin.product.tags.update');
    });

    Route::prefix('license')->group(function(){
        Route::get('/',[LicenseController::class, 'index'])->name('admin.license.index');
        Route::get('/json',[LicenseController::class, 'json'])->name('admin.license.json');
        Route::post('/ajax/generate-license-key',[LicenseController::class, 'generate_license_key'])->name('admin.license.generate.key');
        Route::post('/create',[LicenseController::class, 'create'])->name('admin.license.create');
        Route::post('/destroy',[LicenseController::class, 'destroy'])->name('admin.license.destroy');

        Route::get('/purchases',[LicenseController::class, 'purchases'])->name('admin.license.purchases');
        Route::get('/purchases/json',[LicenseController::class, 'purchases_json'])->name('admin.license.purchases.json');
        Route::post('/purchases/destroy',[LicenseController::class, 'purchases_destroy'])->name('admin.license.purchases.destroy');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
        Route::get('/json', [UsersController::class, 'json'])->name('admin.users.json');
        Route::post('/destroy', [UsersController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    });

    Route::get('/settings', [OtherController::class, 'settings'])->name('admin.settings');
    Route::post('/settings/update/meta', [OtherController::class, 'settings_meta'])->name('admin.settings.update.meta');
    Route::post('/settings/update/social', [OtherController::class, 'settings_social'])->name('admin.settings.update.social');
    Route::post('/settings/update/contact', [OtherController::class, 'settings_contact'])->name('admin.settings.update.contact');

    Route::prefix('files')->group(function(){
        Route::get('/',[FilesController::class, 'index'])->name('admin.files.index');
        Route::get('/tinymce',[FilesController::class, 'fortinymce'])->name('admin.files.fortinymce');
    });
});
