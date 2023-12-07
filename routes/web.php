<?php

use App\Http\Middleware\IsEmployee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerLogin;
use App\Http\Controllers\EmployeeLogin;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerRegister;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FEAccountController;
use App\Http\Controllers\FEProductController;
use App\Http\Controllers\CompanypicController;
use App\Http\Controllers\FEDashboardController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\CompanyCustomerController;
use App\Http\Controllers\CompanyEmployeeController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductDiscountController;
use App\Http\Controllers\FEAccountAddressController;
use App\Http\Controllers\FECheckOutController;

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

Route::get('/', function () {
    return redirect()->to('/online-shop');
    // return view('frontend.dashboard.index');
});
// Route::get('/home', function () {
//     // return redirect()->to(route('role.index'));
//     return view('frontend.dashboard.index');
// });


Route::prefix('auth')->group(function(){

    Route::controller(CustomerLogin::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login')->middleware('guest');
        Route::post('/login-attempt', 'loginAttempt')->name('login.attempt');
    
        Route::post('/logout', 'logout')->name('logout');
    
    });

    Route::controller(CustomerRegister::class)->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register')->middleware('guest');
        Route::post('/register-attempt', 'registerAttempt')->name('register.attempt');

        Route::get('/register-otp', 'otpRegister')->name('register.otp');
        Route::post('/register-otp-send', 'sendOtpProcess')->name('send.otp');
        Route::get('/register-input-otp', 'inputOtp')->name('input.otp');
        Route::post('/confirmation-otp', 'inputOtpProcess')->name('confirmation.otp');
    
    });    
});

Route::controller(EmployeeLogin::class)->prefix('management')->group(function () {
    Route::get('/login', 'showLoginForm')->name('employee.login')->middleware('guest');
    Route::post('/login-attempt', 'loginAttempt')->name('employee.login.attempt');

    Route::post('/logout', 'logout')->name('employee.logout');
});

Route::middleware([IsEmployee::class])->prefix('management')->group(function(){

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });
    
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer-view', 'index')->name('customer.index');
        Route::get('/customer-view/{id}', 'show')->name('customer.show');
        Route::get('/customer-insert', 'create')->name('customer.create');
        Route::post('/customer-create', 'store')->name('customer.store');
        Route::post('/customer-update/{id}', 'update')->name('customer.update');
        Route::post('/customer-reset-pass/{id}', 'reset_password')->name('customer.reset');
        Route::get('/customer-delete/{id}', 'customer_delete')->name('customer.delete');
    });
    
    //companypic
    Route::controller(CompanypicController::class)->group(function () {
        Route::get('/companypic-view', 'index')->name('companypic.index');
        Route::get('/companypic-view/{id}', 'show')->name('companypic.show');
        Route::get('/companypic-insert', 'create')->name('companypic.create');
        Route::post('/companypic-create', 'store')->name('companypic.store');
        Route::post('/companypic-update/{id}', 'update')->name('companypic.update');
        Route::get('/companypic-delete/{id}', 'delete')->name('companypic.delete');
    });
    
    // company 
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/company-view', 'index')->name('company.index');
        Route::get('/company-view/{id}', 'show')->name('company.show');
        Route::get('/company-insert', 'create')->name('company.create');
        Route::post('/company-create', 'store')->name('company.store');
        Route::post('/company-update/{id}', 'update')->name('company.update');
        Route::get('/company-delete/{id}', 'delete')->name('company.delete');
    });
    
    
    // employee 
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee-view', 'index')->name('employee.index');
        Route::get('/employee-view/{id}', 'edit')->name('employee.show');
        Route::get('/employee/{id}', 'show')->name('employee.detail');
        Route::get('/employee-change-pass/{id}', 'changePass')->name('employee.change.password');
        Route::get('/employee-save-pass/{id}', 'saveNewPass')->name('employee.save.password');
        // Route::get('/employee/{id}?', 'show')->name('employee.detail');
        Route::get('/employee-insert', 'create')->name('employee.create');
        Route::post('/employee-create', 'store')->name('employee.store');
        Route::post('/employee-update/{id}', 'update')->name('employee.update');
        Route::get('/employee-delete/{id}', 'destroy')->name('employee.delete');
        Route::get('/employee-upload/{id}', 'upload')->name('employee.upload');
        Route::get('/employee-contact/{id}', 'contact')->name('employee.contact');
        Route::get('/employee-bank/{id}', 'bank')->name('employee.bank');
        Route::post('/employee-updatefoto/{id}', 'uploadfoto')->name('employee.updatefoto');
        Route::get('/employee-change-password/{id}', 'editpassword')->name('employee.change.password');
        Route::post('/employee-update-password/{id}', 'updatepassword')->name('employee.password.update');
    });
    
    
    
    //role
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role-view', 'index')->name('role.index');
        Route::get('/role-view/{id}', 'show')->name('role.show');
        Route::get('/role-insert', 'create')->name('role.create');
        Route::post('/role-create', 'store')->name('role.store');
        Route::post('/role-update/{id}', 'update')->name('role.update');
        Route::get('/role-delete/{id}', 'delete')->name('role.delete');
    });
    
    
    //product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product-view', 'index')->name('product.index');
        Route::get('/product-view/{id}', 'show')->name('product.show');
        Route::get('/product-insert', 'create')->name('product.create');
        Route::get('/product-insert-detail', 'create_detail')->name('product.create.detail');
        Route::post('/product-create', 'store')->name('product.store');
        Route::post('/product-create-detail', 'store_detail')->name('product.store.detail');
        Route::post('/product-create-photo-detail', 'store_photo_detail')->name('product.store.photo.detail');
        Route::post('/product-update/{id}', 'update')->name('product.update');
        Route::post('/product-thumbnail-update/{id}', 'update_thumbnail')->name('product.thumbnail.update');
        Route::get('/product-delete/{id}', 'delete')->name('product.delete');
        Route::get('/product-delete-images/{id}', 'delete_product_images')->name('product.delete.images');
    });
    
    
    //product category
    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/product-category-view', 'index')->name('product-category.index');
        Route::get('/product-category-view/{id}', 'show')->name('product-category.show');
        Route::get('/product-category-insert', 'create')->name('product-category.create');
        Route::post('/product-category-create', 'store')->name('product-category.store');
        Route::post('/product-category-update/{id}', 'update')->name('product-category.update');
        Route::get('/product-category-delete/{id}', 'delete')->name('product-category.delete');
    });
    
    
    //discount
    Route::controller(DiscountController::class)->group(function () {
        Route::get('/discount-view', 'index')->name('discount.index');
        Route::get('/discount-view/{id}', 'show')->name('discount.show');
        Route::get('/discount-insert', 'create')->name('discount.create');
        Route::post('/discount-create', 'store')->name('discount.store');
        Route::post('/discount-update/{id}', 'update')->name('discount.update');
        Route::get('/discount-delete/{id}', 'delete')->name('discount.delete');
    });
    
    //product discount
    Route::controller(ProductDiscountController::class)->group(function () {
        Route::get('/product-discount-view', 'index')->name('product.discount.index');
        Route::get('/product-discount-view/{id}', 'show')->name('product.discount.show');
        Route::get('/product-discount-insert', 'create')->name('product.discount.create');
        Route::post('/product-discount-create', 'store')->name('product.discount.store');
        Route::post('/product-discount-update/{id}', 'update')->name('product.discount.update');
        Route::get('/product-discount-delete/{id}', 'delete')->name('product.discount.delete');
    });
    
    //customer address
    Route::controller(CustomerAddressController::class)->group(function () {
        Route::get('/customer-address-view', 'index')->name('customer.address.index');
        Route::get('/customer-address-view/{id}', 'show')->name('customer.address.show');
        Route::any('/customer-address-insert', 'create')->name('customer.address.create');
        Route::post('/customer-address-create', 'store')->name('customer.address.store');
        Route::post('/customer-address-update/{id}', 'update')->name('customer.address.update');
        Route::get('/customer-address-delete/{id}', 'delete')->name('customer.address.delete');
    });
    
    //product Info
    Route::controller(ProductInfoController::class)->group(function () {
        Route::get('/product-info-view', 'index')->name('product.info.index');
        Route::get('/product-info-view/{id}', 'show')->name('product.info.show');
        Route::get('/product-info-insert', 'create')->name('product.info.create');
        Route::post('/product-info-create', 'store')->name('product.info.store');
        Route::post('/product-info-update/{id}', 'update')->name('product.info.update');
        Route::get('/product-info-delete/{id}', 'delete')->name('product.info.delete');
    });
    
    //product Image
    Route::controller(ProductImageController::class)->group(function () {
        Route::get('/product-image-view', 'index')->name('product.image.index');
        Route::get('/product-image-view/{id}', 'show')->name('product.image.show');
        Route::get('/product-image-insert', 'create')->name('product.image.create');
        Route::post('/product-image-create', 'store')->name('product.image.store');
        Route::post('/product-image-update/{id}', 'update')->name('product.image.update');
        Route::get('/product-image-delete/{id}', 'delete')->name('product.image.delete');
    });
    
    //cart
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart-view', 'index')->name('cart.index');
        Route::get('/cart-view/{id}', 'show')->name('cart.show');
        Route::get('/cart-insert', 'create')->name('cart.create');
        Route::post('/cart-create', 'store')->name('cart.store');
        Route::post('/cart-test', 'test')->name('cart.test');
        Route::post('/cart-update/{id}', 'update')->name('cart.update');
        Route::get('/cart-delete/{id}', 'delete')->name('cart.delete');
    });
    
    //orders
    Route::controller(OrdersController::class)->group(function () {
        Route::get('/orders-view', 'index')->name('orders.index');
        Route::get('/orders-customer', 'customer_list')->name('orders.customer.view');
        Route::get('/orders-view/{id}', 'show')->name('orders.show');
        Route::get('/orders-view-cart', 'cart_list')->name('orders.cart.view');
        Route::get('/orders-insert', 'create')->name('orders.create');
        Route::post('/orders-create', 'store')->name('orders.store');
        Route::post('/orders-update/{id}', 'update')->name('orders.update');
        Route::get('/orders-delete/{id}', 'delete')->name('orders.delete');
        Route::get('/orders-detail/{id}', 'detail')->name('orders.detail');
        Route::post('/orders-detail-update/{id}', 'detailupdate')->name('orders.detail.update');
    });
    
    
    //company customer
    Route::controller(CompanyCustomerController::class)->group(function () {
        Route::get('/comopany-customer-view', 'index')->name('company.customer.index');
        Route::get('/comopany-customer-view/{id}', 'show')->name('company.customer.show');
        Route::get('/comopany-customer-insert', 'create')->name('company.customer.create');
        Route::post('/comopany-customer-create', 'store')->name('company.customer.store');
        Route::post('/comopany-customer-update/{id}', 'update')->name('company.customer.update');
        Route::get('/comopany-customer-delete/{id}', 'delete')->name('company.customer.delete');
    });
    
    
    //company customer
    Route::controller(CompanyEmployeeController::class)->group(function () {
        Route::get('/comopany-employee-view', 'index')->name('company.employee.index');
        Route::get('/comopany-employee-view/{id}', 'show')->name('company.employee.show');
        Route::get('/comopany-employee-insert', 'create')->name('company.employee.create');
        Route::post('/comopany-employee-create', 'store')->name('company.employee.store');
        Route::post('/comopany-employee-update/{id}', 'update')->name('company.employee.update');
        Route::get('/comopany-employee-delete/{id}', 'delete')->name('company.employee.delete');
    });

    
   
});



// FRONTEND 


Route::controller(FEDashboardController::class)->group(function () {
    Route::get('/home', 'index')->name('fe.dashboard');
    // Route::get('/', 'index')->name('fe.dashboard')->middleware('guest');
});


Route::group(['prefix' => 'online-shop'],function(){


    //product
    Route::controller(FEDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('fe.dashboard')->middleware('guest');
        // Route::get('/', 'index')->name('fe.dashboard')->middleware('guest');
    });

    Route::controller(FEProductController::class)->group(function () {
        Route::get('/product-detail/{code}', 'show')->name('fe.product');
        // Route::post('/add-cart', 'addCart')->name('fe.add.cart');
    });


    Route::group(['middleware' => 'is_customer'],function(){

        Route::controller(FEProductController::class)->group(function () {
            // Route::get('/product-detail/{code}', 'show')->name('fe.product');
            Route::post('/add-cart', 'addCart')->name('fe.add.cart');
        });
    
        Route::controller(FEAccountAddressController::class)->group(function () {
            Route::get('/add-address', 'create')->name('fe.add.address');
            Route::post('/save-address', 'store')->name('fe.save.address');
            Route::get('/edit-adddress/{id}', 'edit')->name('fe.edit.address');
            Route::post('/update-address/{id}', 'update')->name('fe.update.address');
            Route::get('/delete-address/{id}', 'delete')->name('fe.delete.address');
        });
        
        Route::controller(FEAccountController::class)->group(function () {
            Route::get('/edit-profile', 'index')->name('fe.editprofile');
            Route::get('/cart', 'cart')->name('fe.cart');
            Route::post('/update-cart', 'updateCart')->name('fe.update.cart');
            Route::get('/delete-cart/{id}', 'deleteItem')->name('fe.cart.delete');
            Route::post('/profile-update', 'update')->name('fe.profile.update');
        });
    
    
        Route::controller(FECheckOutController::class)->group(function () {
            Route::get('/checkout-input-detail', 'preCheckOut')->name('fe.pre.checkout');
            Route::post('/checkout', 'store')->name('fe.checkout');
            Route::get('/checkout-invoice/{id}', 'showInvoice')->name('fe.checkout.invoice');
        });

    });    
    //product


});
