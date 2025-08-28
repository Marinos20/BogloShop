<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// ==========================
// FRONTEND
// ==========================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/collection', [FrontendController::class, 'AllProducts']);
Route::get('/collection/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collection/{category_slug}/{product_slug}', [FrontendController::class, 'product']);
Route::get('/search', [FrontendController::class, 'search'])->name('search.products');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/policy', [FrontendController::class, 'policy'])->name('policy');
Route::get('/condition', [FrontendController::class, 'condition'])->name('condition');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// ==========================
// BLOG PUBLIC
// ==========================
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog.index');       // Liste des articles avec pagination
Route::get('/blog/{slug}', [FrontendBlogController::class, 'show'])->name('blog.show');  // Détail article

// ==========================
// AUTH GUEST
// ==========================
Route::middleware('guest')->group(function () {
    Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');
    Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');
});

// ==========================
// WISHLIST / CART
// ==========================
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::get('/cart', [CartController::class, 'index']);

// ==========================
// LANGUE / DEVISE
// ==========================
Route::get('/lang/{locale}', [SettingsController::class, 'switchLang'])->name('lang.switch');
Route::get('/currency/{currency}', [SettingsController::class, 'switchCurrency'])->name('currency.switch');

// ==========================
// ROUTES AUTHENTIFIÉES
// ==========================
Route::middleware(['auth'])->group(function () {

    Route::middleware('verified')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/track-order/{tracking_no}', [ProfileController::class, 'track'])->name('track_order');
        Route::get('/checkout/{product_slug}', [CheckoutController::class, 'single'])->name('singleCheckout');
        Route::get('/checkout', [CheckoutController::class, 'index']);
        Route::get('/payment', [PaymentController::class, 'pay'])->name('payment');
        Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
        Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
        Route::get('/thank-you', [FrontendController::class, 'thankyou']);
    });

    Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('user.logout');

    Route::get('/email/verify', [FrontendAuthController::class, 'verifyEmail'])
        ->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [FrontendAuthController::class, 'emailVerify'])
        ->middleware(['auth', 'signed'])->name('verification.verify');
});

// ==========================
// ADMIN
// ==========================
Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'is_admin', 'admin_device'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Categories & Subcategories
        Route::resource('category', CategoryController::class)->only(['index', 'create', 'edit']);
        Route::resource('subcategory', SubCategoryController::class)->only(['index', 'create', 'edit']);

        // Produits / Couleurs / Commandes / Users
        Route::resource('product', ProductController::class);
        Route::resource('color', ColorController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('users', UserController::class);

        Route::get('/invoice/{id}', [OrderController::class, 'viewInvoice'])->name('order.invoice');

        // BLOG via BlogController + Livewire (ADMIN)
        Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
        Route::get('/blog/edit/{post}', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');

        // Logout admin
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'register']);
    });
});
