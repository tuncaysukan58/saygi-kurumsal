<?php

use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\CareerController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\SectorController;
use App\Http\Controllers\Site\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kurumsal', [PageController::class, 'show'])->defaults('slug', 'kurumsal')->name('page.kurumsal');
Route::get('/surdurulebilirlik', [PageController::class, 'show'])->defaults('slug', 'surdurulebilirlik')->name('page.surdurulebilirlik');
Route::get('/kvkk', [PageController::class, 'show'])->defaults('slug', 'kvkk')->name('page.kvkk');
Route::get('/sayfa/{slug}', [PageController::class, 'show'])->name('page.show');

Route::get('/hizmetler', [ServiceController::class, 'index'])->name('services.index');
Route::get('/hizmetler/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/sektorler', [SectorController::class, 'index'])->name('sectors.index');
Route::get('/sektorler/{sector:slug}', [SectorController::class, 'show'])->name('sectors.show');

Route::get('/projeler', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projeler/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/kariyer', [CareerController::class, 'index'])->name('career.index');
Route::post('/kariyer/basvuru', [CareerController::class, 'apply'])->name('career.apply');

Route::get('/iletisim', [ContactController::class, 'index'])->name('contact.index');
Route::post('/iletisim/mesaj', [ContactController::class, 'send'])->name('contact.send');
Route::post('/teklif', [ContactController::class, 'quote'])->name('contact.quote');
