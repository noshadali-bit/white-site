<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\FrontEndEditorController;
use App\Http\Controllers\DashboardController;


// ---------------------------------------All View Pages---------------------------------------
Route::get('/', [IndexController::class, 'home'])->name('home');

Route::get('/product', [IndexController::class, 'product'])->name('product');
Route::get('/product-detail/{slug}', [IndexController::class, 'product_detail'])->name('product-detail');

Route::get('/categories', [IndexController::class, 'categories'])->name('categories');
Route::get('/sub_category/{slug}', [IndexController::class, 'sub_category'])->name('sub_category');

Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/sign-up', [IndexController::class, 'sign_up'])->name('sign_up');
Route::get('/testimonials', [IndexController::class, 'testimonials'])->name('testimonials');
Route::get('/check-slug', [IndexController::class, 'check_slug'])->name('check_slug');
// ---------------------------------------All View Pages---------------------------------------

// ---------------------------------------All View Form---------------------------------------
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/contact-us-submit', [UserController::class, 'contact_us_submit'])->name('contact-us-submit');
Route::post('/newsletter_submit', [UserController::class, 'newsletter_submit'])->name('newsletter_submit');
Route::post('/login', [UserController::class, 'login_submit'])->name('login-submit');
Route::post('/sign-up', [UserController::class, 'signup_submit'])->name('sign-up-submit');
Route::post('/add-review', [IndexController::class, 'add_review'])->name('add-review');
// ---------------------------------------All View Form---------------------------------------

// ---------------------------------------ORDERS Submitting---------------------------------------
Route::get('/order-submit', [CartController::class, 'order_submit'])->name('order.submit');
Route::post('/pay-status', [CartController::class, 'paystatus'])->name('paystatus');
Route::get('stripe', [CartController::class, 'stripePost'])->name('stripe.post');
Route::post('/subscription-create', [CartController::class, 'subscription_create'])->name('subscription.create');
Route::get('/payment-success', [CartController::class, 'checkout_landing'])->name('checkout_landing');
Route::get('/payment', [CartController::class, 'paysecure'])->name('paysecure');
Route::post('/pay-status', [CartController::class, 'paystatus'])->name('paystatus');
// ---------------------------------------ORDERS Submitting---------------------------------------

// ---------------------------------------Forget Password---------------------------------------
Route::get('/forget-password', [UserController::class, 'forget_password'])->name('forget-password');
Route::get('/forgot-password-message', [UserController::class, 'forgot_password_message'])->name('forgot-password-message');
Route::post('/forget-password-post', [UserController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/forget-password-token/{token}', [UserController::class, 'forget_password_token'])->name('forget-password-token');
Route::post('/forget-password-reset', [UserController::class, 'forget_password_reset'])->name('forget-password-reset');
// ---------------------------------------Forget Password---------------------------------------

Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

// ---------------------------------------Cart---------------------------------------
Route::post('update-cart', [CartController::class, 'updatecart'])->name('update-cart');
Route::get('remove-cart/{cart_id}', [CartController::class, 'removecart'])->name('remove-cart');
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::post('/place-order', [CartController::class, 'placeorder'])->name('placeorder');
// ---------------------------------------Cart---------------------------------------

// ---------------------------------------Admin---------------------------------------
Route::get('/admins', function () {
  return redirect('admin/login');
})->name('admin.admin');

Route::middleware(['guest'])->prefix('admin')->namespace('Admin')->group(function () {
  Route::get('/login', [AdminLoginController::class, 'get_login'])->name('admin.login');
  Route::post('/perform-login', [AdminLoginController::class, 'performLogin'])->name('admin.performLogin');
});

Route::middleware(['admin'])->prefix('admin')->namespace('admin')->group(function () {
  Route::get('/', function () {
    return redirect('/admin/dashboard');
  });
  Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('admin.dashboard');

  // ---------------------------------------Inquiries---------------------------------------
  Route::get('/inquiries-listing', [AdminDashController::class, 'inquiries_listing'])->name('admin.inquiries_listing');
  Route::get('/inquiries-listing/view/{id}', [AdminDashController::class, 'inquiries_listing_view'])->name('admin.inquiries_listing_view');
  Route::get('/inquiries-listing/delete/{id}', [AdminDashController::class, 'inquiries_listing_delete'])->name('admin.inquiries_listing_delete');
  // ---------------------------------------Inquiries---------------------------------------

  // ---------------------------------------Users---------------------------------------
  Route::get('/users-listing', [AdminDashController::class, 'users_listing'])->name('admin.users_listing');
  Route::get('/add-users', [AdminDashController::class, 'add_users'])->name('admin.add_users');
  Route::post('/create-users', [AdminDashController::class, 'create_users'])->name('admin.create_users');
  Route::get('/edit-users/{id}', [AdminDashController::class, 'edit_user'])->name('admin.edit_user');
  Route::post('/edit-users', [AdminDashController::class, 'update_user'])->name('admin.update_user');
  Route::get('/suspend-user/{id}', [AdminDashController::class, 'suspend_user'])->name('admin.suspend_user');
  Route::get('/delete-user/{id}', [AdminDashController::class, 'delete_user'])->name('admin.delete_user');
  // ---------------------------------------Users---------------------------------------

  // ---------------------------------------Logo Management---------------------------------------
  Route::get('/logo-management', [SiteSettingsController::class, 'showLogo'])->name('admin.showLogo');
  Route::post('/logo-management-save', [SiteSettingsController::class, 'saveLogo'])->name('admin.saveLogo');
  // ---------------------------------------Logo Management---------------------------------------

  // ---------------------------------------Social Management---------------------------------------
  Route::get('/contact-social-info', [SiteSettingsController::class, 'socialInfo'])->name('admin.socialInfo');
  Route::post('/contact-social-info', [SiteSettingsController::class, 'saveSocialInfo'])->name('admin.saveSocialInfo');
  // ---------------------------------------Social Management---------------------------------------

  // ---------------------------------------Testimonial Management---------------------------------------
  Route::get('/testimonial-listing', [AdminDashController::class, 'testimonial_listing'])->name('admin.testimonial_listing');
  Route::get('/add-testimonial', [AdminDashController::class, 'add_testimonial'])->name('admin.add_testimonial');
  Route::post('/create-testimonial', [AdminDashController::class, 'create_testimonial'])->name('admin.create_testimonial');
  Route::get('/edit-testimonial/{id}', [AdminDashController::class, 'edit_testimonial'])->name('admin.edit_testimonial');
  Route::post('/edit-testimonial', [AdminDashController::class, 'savetestimonial'])->name('admin.savetestimonial');
  Route::get('/suspend-testimonial/{id}', [AdminDashController::class, 'suspend_testimonial'])->name('admin.suspend_testimonial');
  Route::get('/delete-testimonial/{id}', [AdminDashController::class, 'delete_testimonial'])->name('admin.delete_testimonial');
  // ---------------------------------------Testimonial Management---------------------------------------

  // ---------------------------------------Invoice Management---------------------------------------
  Route::get('/invoice-listing', [AdminDashController::class, 'invoice_listing'])->name('admin.invoice_listing');
  Route::get('/add-invoice', [AdminDashController::class, 'add_invoice'])->name('admin.add_invoice');
  Route::post('/save-invoice', [AdminDashController::class, 'save_invoice'])->name('admin.save_invoice');
  Route::get('/delete-invoice/{id}', [AdminDashController::class, 'delete_invoice'])->name('admin.delete_invoice');
  // ---------------------------------------Invoice Management---------------------------------------

  // ---------------------------------------Reviews Management---------------------------------------
  Route::get('/reviews-listing', [AdminDashController::class, 'reviews_listing'])->name('admin.reviews_listing');
  Route::get('/view-review/{id}', [AdminDashController::class, 'edit_review'])->name('admin.edit_review');
  Route::get('/suspend-review/{id}', [AdminDashController::class, 'suspend_review'])->name('admin.suspend_review');
  Route::get('/delete-review/{id}', [AdminDashController::class, 'delete_review'])->name('admin.delete_review');
  // ---------------------------------------Reviews Management---------------------------------------

  // ---------------------------------------Newsletter Management---------------------------------------
  Route::get('/newsletter-listing', [AdminDashController::class, 'newsletter_listing'])->name('admin.newsletter_listing');
  Route::get('/newsletter-listing/view/{id}', [AdminDashController::class, 'newsletter_listing_view'])->name('admin.newsletter_listing_view');
  Route::get('/newsletter-listing/delete/{id}', [AdminDashController::class, 'newsletter_listing_delete'])->name('admin.newsletter_listing_delete');
  // ---------------------------------------Newsletter Management---------------------------------------

  // ---------------------------------------Products Management---------------------------------------
  Route::get('/products-listing', [ShopController::class, 'products_listing'])->name('admin.products_listing');
  Route::get('/view-product/{slug}', [ShopController::class, 'view_products'])->name('admin.view_products');
  Route::get('/add-product', [ShopController::class, 'add_products'])->name('admin.add_products');
  Route::get('/get-products', [ShopController::class, 'get_products'])->name('admin.get_products');
  Route::post('/create-product', [ShopController::class, 'create_products'])->name('admin.create_products');
  Route::get('/edit-product/{slug}', [ShopController::class, 'edit_products'])->name('admin.edit_products');
  Route::post('/edit-product', [ShopController::class, 'saveproducts'])->name('admin.saveproducts');
  Route::get('/suspend-product/{id}', [ShopController::class, 'suspend_products'])->name('admin.suspend_products');
  Route::get('/delete-product/{id}', [ShopController::class, 'delete_products'])->name('admin.delete_products');
  Route::get('/delete-other-img/{id}', [ShopController::class, 'delete_other_img'])->name('admin.delete_other_img');
  Route::post('/upload-csv-record', [ShopController::class, 'upload_csv_record'])->name('admin.upload_csv_record');
  // ---------------------------------------Products Management---------------------------------------

  Route::get('/get-sub-cat', [ShopController::class, 'get_sub_cat'])->name('admin.get_sub_cat'); 

  // ---------------------------------------Collection Management---------------------------------------
  Route::get('/collection-listing', [AdminDashController::class, 'collection_listing'])->name('admin.collection_listing');
  Route::get('/add-collection', [AdminDashController::class, 'add_collection'])->name('admin.add_collection');
  Route::post('/create-collection', [AdminDashController::class, 'create_collection'])->name('admin.create_collection');
  Route::get('/edit-collection/{id}', [AdminDashController::class, 'edit_collection'])->name('admin.edit_collection');
  Route::post('/edit-collection', [AdminDashController::class, 'savecollection'])->name('admin.savecollection');
  Route::get('/suspend-collection/{id}', [AdminDashController::class, 'suspend_collection'])->name('admin.suspend_collection');
  Route::get('/delete-collection/{id}', [AdminDashController::class, 'delete_collection'])->name('admin.delete_collection');
  // ---------------------------------------Collection Management---------------------------------------

  // ---------------------------------------category Management---------------------------------------
  Route::get('/category-listing', [AdminDashController::class, 'category_listing'])->name('admin.category_listing');
  Route::get('/add-category', [AdminDashController::class, 'add_category'])->name('admin.add_category');
  Route::post('/create-category', [AdminDashController::class, 'create_category'])->name('admin.create_category');
  Route::get('/edit-category/{id}', [AdminDashController::class, 'edit_category'])->name('admin.edit_category');
  Route::post('/edit-category', [AdminDashController::class, 'savecategory'])->name('admin.savecategory');
  Route::get('/suspend-category/{id}', [AdminDashController::class, 'suspend_category'])->name('admin.suspend_category');
  Route::get('/delete-category/{id}', [AdminDashController::class, 'delete_category'])->name('admin.delete_category');
  // ---------------------------------------category Management---------------------------------------

  // ---------------------------------------Subcategory Management---------------------------------------
  Route::get('/subcategory-listing', [AdminDashController::class, 'subcategory_listing'])->name('admin.subcategory_listing');
  Route::get('/add-subcategory', [AdminDashController::class, 'add_subcategory'])->name('admin.add_subcategory');
  Route::post('/create-subcategory', [AdminDashController::class, 'create_subcategory'])->name('admin.create_subcategory');
  Route::get('/edit-subcategory/{id}', [AdminDashController::class, 'edit_subcategory'])->name('admin.edit_subcategory');
  Route::post('/edit-subcategory', [AdminDashController::class, 'savesubcategory'])->name('admin.savesubcategory');
  Route::get('/suspend-subcategory/{id}', [AdminDashController::class, 'suspend_subcategory'])->name('admin.suspend_subcategory');
  Route::get('/delete-subcategory/{id}', [AdminDashController::class, 'delete_subcategory'])->name('admin.delete_subcategory');
  Route::post('/getsubcategory', [AdminDashController::class, 'getsubcategory'])->name('admin.getsubcategory');

  // ---------------------------------------banner Management---------------------------------------
  Route::get('/banner', [SiteSettingsController::class, 'homeSlider'])->name('admin.homeSlider');
  Route::get('/add-banner', [SiteSettingsController::class, 'addhomeSlider'])->name('admin.addhomeSlider');
  Route::post('/add-banner', [SiteSettingsController::class, 'createhomeSlider'])->name('admin.createhomeSlider');
  Route::get('/edit-banner/{id}', [SiteSettingsController::class, 'edithomeSlider'])->name('admin.edithomeSlider');
  Route::post('/edit-banner', [SiteSettingsController::class, 'updatehomeSlider'])->name('admin.updatehomeSlider');
  Route::get('/delete-home-slider/{id}', [SiteSettingsController::class, 'deletehomeSlider'])->name('admin.deletehomeSlider');
  Route::get('/suspend-home-slider/{id}', [SiteSettingsController::class, 'suspendhomeSlider'])->name('admin.suspendhomeSlider');
  // ---------------------------------------banner Management---------------------------------------

  // ---------------------------------------Orders Management---------------------------------------
  Route::get('/orders', [AdminDashController::class, 'orders_listing'])->name('admin.orders_listing');
  Route::get('/view-order/{id}', [AdminDashController::class, 'view_order'])->name('admin.view_order');
  Route::get('/delete-order/{id}', [AdminDashController::class, 'delete_order'])->name('admin.delete_order');
  Route::get('/order-status-update/{id}', [AdminDashController::class, 'order_status_update'])->name('admin.order_status_update');
  // ---------------------------------------Orders Management---------------------------------------

  // ---------------------------------------Welcome Baner Management---------------------------------------
  Route::get('/welcome-slider', [SiteSettingsController::class, 'welcomeSlider'])->name('admin.welcomeSlider');
  Route::get('/add-welcome-slider', [SiteSettingsController::class, 'addwelcomeSlider'])->name('admin.addwelcomeSlider');
  Route::post('/add-welcome-slider', [SiteSettingsController::class, 'createwelcomeSlider'])->name('admin.createwelcomeSlider');
  Route::get('/edit-welcome-slider/{id}', [SiteSettingsController::class, 'editwelcomeSlider'])->name('admin.editwelcomeSlider');
  Route::post('/edit-welcome-slider', [SiteSettingsController::class, 'updatewelcomeSlider'])->name('admin.updatewelcomeSlider');
  Route::get('/delete-welcome-slider/{id}', [SiteSettingsController::class, 'deletewelcomeSlider'])->name('admin.deletewelcomeSlider');
  Route::get('/suspend-welcome-slider/{id}', [SiteSettingsController::class, 'suspendwelcomeSlider'])->name('admin.suspendwelcomeSlider');
  // ---------------------------------------Welcome Baner Management---------------------------------------

  // ---------------------------------------cms  Management---------------------------------------
  Route::get('/cms-content', [SiteSettingsController::class, 'cms'])->name('admin.cms');
  Route::get('/cms-content-edit/{id}', [SiteSettingsController::class, 'edit_cms'])->name('admin.editCms');
  Route::post('/cms-content-update', [SiteSettingsController::class, 'update_cms'])->name('admin.updateCms');
  Route::post('/statusAjaxUpdateCustom', [FrontEndEditorController::class, 'statusAjaxUpdateCustom']);
  Route::post('/statusAjaxUpdate', [FrontEndEditorController::class, 'statusAjaxUpdate']);
  Route::post('/updateFlagOnKey', [FrontEndEditorController::class, 'updateFlagOnKey']);
  Route::post('/imageUpload', [FrontEndEditorController::class, 'imageUpload']);

  Route::get('/check_slug', [AdminDashController::class, 'check_slug'])->name('admin.check_slug');

  // ---------------------------------------cms Management---------------------------------------
  Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
  // ---------------------------------------Admin---------------------------------------
});

// ---------------------------------------User Dash---------------------------------------
Route::group(['middleware' => 'auth'], function () {

  Route::get('/sign-out', [UserController::class, 'signout'])->name('signout');
  Route::get('dashboard/password_change', [DashboardController::class, 'passwordchange'])->name('dashboard.passwordChange');
  Route::post('dashboard/update/password', [DashboardController::class, 'updatepassword'])->name('update.account.password');

  Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
  Route::get('dashboard/my-profile', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
  Route::get('dashboard/edit-profile', [DashboardController::class, 'editprofile'])->name('dashboard.editProfile');
  Route::post('dashboard/edit_profile', [DashboardController::class, 'saveprofile'])->name('dashboard.submitProfile');
  Route::get('dashboard/my-orders', [DashboardController::class, 'myorders'])->name('dashboard.myBookings');
  Route::get('dashboard/my-tickets', [DashboardController::class, 'mytickets'])->name('dashboard.mytickets');
  Route::get('dashboard/add-tickets', [DashboardController::class, 'addtickets'])->name('dashboard.addtickets');
  Route::post('dashboard/add-tickets-post', [DashboardController::class, 'createtickets'])->name('dashboard.createtickets');
  Route::post('dashboard/tickets-chat-post', [DashboardController::class, 'chatmessage'])->name('dashboard.chatmessage');
  Route::get('dashboard/view-ticket/{decrypt}', [DashboardController::class, 'viewticket'])->name('dashboard.viewticket');
  Route::get('dashboard/view-orders/{decrypt}', [DashboardController::class, 'vieworders'])->name('dashboard.viewAppointment');
  Route::get('/ticket-closed/{id}', [DashboardController::class, 'ticketclosed'])->name('dashboard.ticketclosed');
  Route::get('dashboard/delete-orders/{decrypt}', [DashboardController::class, 'deleteorders'])->name('dashboard.deleteAppointment');

  Route::get('/stripe-payment', [DashboardController::class, 'stripe_payment'])->name('stripe.payment');

  Route::get('dashboard/my-bookings', [DashboardController::class, 'mybookings'])->name('dashboard.bookings');
  Route::get('dashboard/view-bookings/{decrypt}', [DashboardController::class, 'viewbookings'])->name('dashboard.viewbooking');
  Route::get('dashboard/delete-bookings/{decrypt}', [DashboardController::class, 'deletebookings'])->name('dashboard.deletebooking');

});
// ---------------------------------------User Dash---------------------------------------