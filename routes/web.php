<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminContactLeadsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Site\BlogsController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProjectsController;
use App\Http\Controllers\Site\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServicesController::class, 'show'])->name('services.show');

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');

Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
    Route::patch('/services/{service}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::patch('/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::patch('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::patch('/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    Route::get('/faqs', [AdminFaqController::class, 'index'])->name('admin.faqs.index');
    Route::get('/faqs/create', [AdminFaqController::class, 'create'])->name('admin.faqs.create');
    Route::post('/faqs', [AdminFaqController::class, 'store'])->name('admin.faqs.store');
    Route::get('/faqs/{faq}/edit', [AdminFaqController::class, 'edit'])->name('admin.faqs.edit');
    Route::patch('/faqs/{faq}', [AdminFaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/faqs/{faq}', [AdminFaqController::class, 'destroy'])->name('admin.faqs.destroy');

    Route::get('/contacts', [AdminContactLeadsController::class, 'index'])->name('admin.contacts.index');
    Route::post('/contacts/{contact}/mark-read', [AdminContactLeadsController::class, 'markRead'])->name('admin.contacts.mark-read');
    Route::delete('/contacts/{contact}', [AdminContactLeadsController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'update'])->name('admin.settings.update');
});

require __DIR__.'/auth.php';
