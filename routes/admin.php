<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\HomeFeatureController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\ProcessStepController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\ReferenceLogoController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceItemController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('hero-slides', HeroSlideController::class)->except(['show']);

    Route::get('home-content', [HomeContentController::class, 'edit'])->name('home-content.edit');
    Route::put('home-content', [HomeContentController::class, 'update'])->name('home-content.update');
    Route::post('home-features', [HomeFeatureController::class, 'store'])->name('home-features.store');
    Route::put('home-features/{homeFeature}', [HomeFeatureController::class, 'update'])->name('home-features.update');
    Route::delete('home-features/{homeFeature}', [HomeFeatureController::class, 'destroy'])->name('home-features.destroy');

    Route::post('process-steps', [ProcessStepController::class, 'store'])->name('process-steps.store');
    Route::put('process-steps/{processStep}', [ProcessStepController::class, 'update'])->name('process-steps.update');
    Route::delete('process-steps/{processStep}', [ProcessStepController::class, 'destroy'])->name('process-steps.destroy');

    Route::resource('services', ServiceController::class)->except(['show']);
    Route::post('services/{service}/items', [ServiceItemController::class, 'store'])->name('service-items.store');
    Route::put('service-items/{serviceItem}', [ServiceItemController::class, 'update'])->name('service-items.update');
    Route::delete('service-items/{serviceItem}', [ServiceItemController::class, 'destroy'])->name('service-items.destroy');

    Route::resource('sectors', SectorController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('certificates', CertificateController::class)->except(['show']);
    Route::resource('stats', StatController::class)->except(['show']);
    Route::resource('reference-logos', ReferenceLogoController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['show']);

    Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);
    Route::resource('blog-posts', BlogPostController::class)->except(['show']);

    Route::resource('job-postings', JobPostingController::class)->except(['show']);
    Route::get('job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');
    Route::get('job-applications/{jobApplication}', [JobApplicationController::class, 'show'])->name('job-applications.show');
    Route::put('job-applications/{jobApplication}', [JobApplicationController::class, 'update'])->name('job-applications.update');
    Route::delete('job-applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('job-applications.destroy');
    Route::get('job-applications/{jobApplication}/cv', [JobApplicationController::class, 'downloadCv'])->name('job-applications.cv');

    Route::resource('pages', PageController::class)->except(['show']);
    Route::post('pages/{page}/sections', [PageSectionController::class, 'store'])->name('page-sections.store');
    Route::put('page-sections/{pageSection}', [PageSectionController::class, 'update'])->name('page-sections.update');
    Route::delete('page-sections/{pageSection}', [PageSectionController::class, 'destroy'])->name('page-sections.destroy');

    Route::get('quote-requests', [QuoteRequestController::class, 'index'])->name('quote-requests.index');
    Route::get('quote-requests/{quoteRequest}', [QuoteRequestController::class, 'show'])->name('quote-requests.show');
    Route::put('quote-requests/{quoteRequest}', [QuoteRequestController::class, 'update'])->name('quote-requests.update');
    Route::delete('quote-requests/{quoteRequest}', [QuoteRequestController::class, 'destroy'])->name('quote-requests.destroy');

    Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::put('contact-messages/{contactMessage}', [ContactMessageController::class, 'update'])->name('contact-messages.update');
    Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

    Route::resource('users', UserController::class)->except(['show']);

    Route::get('system', [SystemController::class, 'index'])->name('system.index');
    Route::post('system/migrate', [SystemController::class, 'migrate'])->name('system.migrate');
    Route::post('system/seed', [SystemController::class, 'seed'])->name('system.seed');
    Route::post('system/clear-cache', [SystemController::class, 'clearCache'])->name('system.clear-cache');
    Route::match(['get', 'post'], 'system/storage-link', [SystemController::class, 'storageLink'])->name('system.storage-link');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
