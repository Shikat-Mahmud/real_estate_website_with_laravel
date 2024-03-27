<?php

use App\Models\ApplicationSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\FrontController;

use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Admin\AmenitieController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\BookPropertyController;
use App\Http\Controllers\Admin\PropertyManageController;
use App\Http\Controllers\Admin\PropertyStatusController;
use App\Http\Controllers\Admin\location\LocationController;
use App\Http\Controllers\Admin\property\PropertytypeController;
use App\Http\Controllers\ProfileController as ControllersProfileController;

use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\ProTypeController;
use App\Http\Controllers\Admin\ProLocationController;
use App\Http\Controllers\Admin\FeturePropertyController;
use App\Http\Controllers\Admin\PartnerSectionController;
use App\Http\Controllers\Admin\FaqSectionController;

//privacy part
Route::get('/privacy', [PrivacyController::class, 'privacy'])->name('privacy.index');
Route::get('/privacy/edit', [PrivacyController::class, 'edit'])->name('privacy.edit');
Route::patch('/privacy/{id}/update', [PrivacyController::class, 'update'])->name('privacy.update');

Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/term and condition',[FrontController::class,'term'])->name('term');
Route::get('/privacy and policy',[FrontController::class,'privacy'])->name('privacy');
Route::get('/frequenty ask question',[FrontController::class,'ask'])->name('faq');


Route::post('/contact-form', [ContactController::class, 'contactForm'])->name('contact.form');
Route::get('/contact-message',[ContactController::class,'contactMessage'])->name('contact.message');


Route::get('/Property-Details/{id}',[FrontController::class,'PropertyDetails'])->name('property.details');

//Book Property
Route::post('book-property/store', [BookPropertyController::class, 'storeData'])->name('book-property.storeData');

Route::get('get-property-by-type/{id}', [FrontController::class, 'getPropertyByType'])->name('get-property-by-type');

Route::get('get-property-by-location/{id}', [FrontController::class, 'getPropertyByLocation'])->name('get-property-by-location');

Route::post('send-message', [FrontController::class, 'sendMessage'])->name('send-message');
//Route::post('find-property', [FrontController::class, 'findProperty'])->name('find-property');
Route::match(['get', 'post'], 'find-property', [FrontController::class, 'findProperty'])->name('find-property');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'dashboard'])->name('user-dashboard');
    Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile_update', [ProfileController::class, 'update'])->name('profile.update');

    // Update Password
    Route::get('/change_password', [ProfileController::class, 'changePass'])->name('change.password');
    Route::post('/update_password', [ProfileController::class, 'updatePass'])->name('update.password');

    Route::get('/booking_profile',[ProfileController::class,'bookingdetails']);
    Route::get('booking-conversation', [ProfileController::class, 'BookingConversation'])->name('booking-conversation');

    Route::get('get-chat-details/{id}', [ProfileController::class, 'chatDetails'])->name('get-chat-details');
    Route::post('send-chat-message', [ProfileController::class, 'sendChatMessage'])->name('send-chat-message');

});
require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {

    // admin setting routes
Route::prefix('application-setting')->group(function() {
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::get('/cache-clear', [SettingController::class, 'cachClear'])->name('cache-clear');
    Route::get('/email-setting', [SettingController::class, 'emailSetting'])->name('email-setting');
    Route::get('/send-test-email', [SettingController::class, 'emailTesting'])->name('send-test-email');
    Route::get('/database-backup', [SettingController::class, 'databaseBackup'])->name('database-backup');

    Route::post('/setting-update', [SettingController::class, 'update'])->name('setting-update');
    Route::post('/email-setting-update', [SettingController::class, 'emailSettingUpdate'])->name('email-setting-update');

    Route::get('application-cache-clear', [SettingController::class, 'cachClear'])->name('application-cache-clear');


    Route::get('/user_details', [UserController::class, 'details'])->name('user.details');
    Route::get('/user_details_show/{id}', [UserController::class, 'show'])->name('user.details.show');
    Route::get('/delete-user/{id}', [UserController::class,'destroy'])->name('user.delete');
    Route::get('/edit-user/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('/update-user/{id}', [UserController::class,'update'])->name('user.update');

    Route::resource('about', AboutPageController::class);
    Route::resource('term', TermController::class);

    Route::get('/conversation-messages', [ChatController::class, 'getConversation'])->name('conversation.message');
    Route::get('admin-chat-details/{id}', [ChatController::class, 'adminChatDetails'])->name('admin-chat-details');
});

    Route::get('/booking_details', [BookPropertyController::class, 'bookingDetails'])->name('booking.details');
    Route::get('/edit-booking/{id}', [BookPropertyController::class,'editBooking'])->name('booking.edit');
    Route::post('/update-booking/{id}', [BookPropertyController::class,'updateBooking'])->name('booking.update');
    Route::get('/delete-booking/{id}', [BookPropertyController::class,'destroyBooking'])->name('booking.delete');

    Route::get('/agent-message',[BookPropertyController::class,'agentMessage'])->name('agent.message');

    Route::get('/admin', [AdminController::class,'showTotal'])->name('admin-dashboard');
    Route::get('admin-edit', [AdminController::class, 'adminEdit'])->name('admin-edit');
    Route::post('admin-update', [AdminController::class, 'adminUpdate'])->name('admin-update');

    Route::get('/add-status', [PropertyStatusController::class,'create'])->name('status.create');
    Route::post('/new-status', [PropertyStatusController::class,'store'])->name('status.store');
    Route::get('/manage-status', [PropertyStatusController::class,'index'])->name('status.index');
    Route::get('/delete-status/{id}', [PropertyStatusController::class,'destroy'])->name('status.destroy');
    Route::get('/edit-status/{id}', [PropertyStatusController::class,'edit'])->name('status.edit');
    Route::post('/update-status/{id}', [PropertyStatusController::class,'update'])->name('status.update');

    Route::get('change-password', [PasswordController::class, 'changePassword'])->name('change-password');
    Route::post('update-password', [PasswordController::class, 'updatePassword'])->name('update-password');


    Route::resource('amenities', AmenitieController::class);
    Route::resource('properties', PropertyManageController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('partners', PartnerController::class);

    Route::get('/addproperty-type', [PropertytypeController::class,'create'])->name('propertyType.create');
    Route::post('/newproperty-type', [PropertytypeController::class,'store'])->name('propertyType.store');
    Route::get('/manageproperty-type', [PropertytypeController::class,'index'])->name('propertyType.index');
    Route::get('/delete-property-type/{id}', [PropertytypeController::class,'destroy'])->name('propertyType.delete');
    Route::get('/edit-property-type/{id}', [PropertytypeController::class,'edit'])->name('propertyType.edit');
    Route::post('/update-property-type/{id}', [PropertytypeController::class,'update'])->name('propertyType.update');


    Route::get('/add-location', [LocationController::class,'create'])->name('location.create');
    Route::post('/new-location', [LocationController::class,'store'])->name('location.store');
    Route::get('/manage-location', [LocationController::class,'index'])->name('location.index');
    Route::get('/delete-location/{id}', [LocationController::class,'destroy'])->name('location.delete');
    Route::get('/edit-location/{id}', [LocationController::class,'edit'])->name('location.edit');
    Route::post('/update-location/{id}', [LocationController::class,'update'])->name('location.update');


    // Title Settings
    Route::resource('hero-section', HeroSectionController::class);
    Route::resource('protype-section', ProTypeController::class);
    Route::resource('prolocation-section', ProLocationController::class);
    Route::resource('fetureproperty-section', FeturePropertyController::class);
    Route::resource('partner-section', PartnerSectionController::class);
    Route::resource('faq-section', FaqSectionController::class);

});
