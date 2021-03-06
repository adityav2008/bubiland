<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the controller to call when that URI is requested.

|

*/



Route::get('/', 'UserController@index');
Route::get('/index', 'UserController@index');
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@dologin');
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@doregister');
Route::get('/buyerdashboard', 'UserController@buyerdashboard');
Route::get('/logout','UserController@logout');
Route::get('/verify/{confirmationcode}/{userid}','UserController@verify');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/buyerdashboard/changesellerpassword', 'DashboardController@changeSellerPassword');

// route for captcha created by kartik.
Route::get('/refereshcapcha', 'UserController@refereshCapcha');
// end captcha route here.

Route::post('/buyerdashboard/changesellerpassword', 'DashboardController@dochangeSellerPassword');
Route::get('/buyerdashboard/changepmethod', 'DashboardController@changepmethod');
Route::post('/buyerdashboard/changepmethod', 'DashboardController@dochangepmethod');
Route::get('/buyerdashboard/updateprofile', 'DashboardController@updateprofile');
Route::post('/buyerdashboard/updateprofile', 'DashboardController@doupdateprofile');
Route::get('/buyerdashboard/sellitem','DashboardController@sellitem');
Route::post('/buyerdashboard/sellitem','DashboardController@dosellitem');
Route::get('/buyerdashboard/getsubcategory','DashboardController@getsubcategory');
Route::post('/buyerdashboard/sellstepone','ProductController@sellstepone');
Route::get('/buyerdashboard/sellsteptwo','ProductController@sellsteptwo');
Route::post('/buyerdashboard/sellsteptwo','ProductController@dosellsteptwo');
Route::get('/buyerdashboard/sellstepthree','ProductController@sellstepthree');
Route::post('/buyerdashboard/sellstepthree','ProductController@dosellstepthree');
Route::get('/buyerdashboard/sellpreview','ProductController@sellpreview');
Route::post('/buyerdashboard/sellpreview','ProductController@dosellpreview');
Route::get('/admin','AdminController@adminlogin');
Route::post('/adminlogin','AdminController@doadminlogin');
Route::get('/admindashboard','AdminController@admindashboard');
Route::get('/admindashboard/managecategories','AdminController@managecategories');
Route::get('/admindashboard/viewsubcategories','AdminController@viewsubcategories');
Route::get('/admindashboard/managebrands','AdminController@managebrands');
Route::get('/admindashboard/auctioncategories','AdminController@auctioncategories');

Route::get('/admindashboard/add-auction-category','AdminController@addAuctionCategories');
Route::post('/admindashboard/add-auction-category','AdminController@addAuctionCategories');

Route::get('/admindashboard/addproductcategory','AdminController@addproductcategory');
Route::post('/admindashboard/addproductcategory','AdminController@doaddproductcategory');
Route::get('/admindashboard/editproductcategory','AdminController@editproductcategory');
Route::post('/admindashboard/editproductcategory','AdminController@doeditproductcategory');
Route::get('/admindashboard/deleteproductcategory','AdminController@deleteproductcategory');
Route::get('/admindashboard/addbrand','AdminController@addbrand');
Route::post('/admindashboard/addbrand','AdminController@doaddbrand');
Route::get('/admindashboard/editbrands','AdminController@editbrands');
Route::post('/admindashboard/editbrands','AdminController@doeditbrands');
Route::get('/admindashboard/deletebrand','AdminController@deletebrand');
Route::get('/admindashboard/addsubcategory','AdminController@addsubcategory');
Route::post('/admindashboard/addsubcategory','AdminController@doaddsubcategory');
Route::get('/admindashboard/deletesubcategory','AdminController@deletesubcategory');
Route::post('/admindashboard/editsubcategory','AdminController@doeditsubcategory');
Route::get('/admindashboard/editsubcategory','AdminController@editsubcategory');
Route::get('/buyerdashboard/deletepmethod','DashboardController@deletepmethod');
Route::get('/buyerdashboard/addpmethod','DashboardController@addpmethod');
Route::post('/buyerdashboard/addpmethod','DashboardController@doaddpmethod');
// edited by kartik.
Route::get('/listing','ProductController@listing');
// end here.
Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addToCart'
	]);
Route::get('/shopping-cart', [
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingCart'
	]);
Route::get('/remove-from-cart/{id}', [
		'uses' => 'ProductController@getRemoveFromCart',
		'as' => 'product.removeFromCart'
	]);
Route::get('/remove-cart-item/{id}', [
		'uses' => 'ProductController@getRemove',
		'as' => 'product.removeCartItem'
	]);
Route::get('payment', array(

    'as' => 'payment',

    'uses' => 'paypalAdaptiveController@postPayment',

));
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'paypalAdaptiveController@getPaymentStatus',
));
Route::get('/buyerdashboard/hunt-an-item','DashboardController@huntanitem');
Route::post('/buyerdashboard/hunt-an-item','DashboardController@dohuntanitem');
Route::get('/hunt-listing','ProductController@huntlisting');
Route::post('/send-buyer-message','UserController@sendmessage');
Route::get('/product-detail/{id}','ProductController@showproductdetail');
Route::get('/buyerdashboard/messages','DashboardController@user_messages');
Route::get('/swap-listing','ProductController@swaplisting');
Route::get('/swap-detail/{id}','ProductController@showswapdetail');
Route::post('/buyerdashboard/swapconfirmbuyer/{id}','DashboardController@swapconfirmbuyer');
Route::get('/buyerdashboard/view-swap-request', 'DashboardController@viewswaprequest');
Route::get('/payment-swaps/{id}', array(
    'uses' => 'paypalAdaptiveController@splitPaySwapSeller',
));

// set route for review by kartik.
Route::get('product-detail','ProductController@reviewProduct');
// end here.

Route::get('payment/sellerswapstatus', array(
    'as' => 'payment.sellerswapstatus',
    'uses' => 'paypalAdaptiveController@viewreportSwapSeller',
));
Route::get('buyerdashboard/view-confirm-swap-request', 'DashboardController@viewconfirmswaprequest');
Route::get('payment-swapb/{id}', array(
    'uses' => 'paypalAdaptiveController@splitPaySwapBuyer',
));
Route::get('payment/buyerswapstatus', array(
    'as' => 'payment.buyerswapstatus',
    'uses' => 'paypalAdaptiveController@viewreportSwapBuyer',
));
Route::get('/buyerdashboard/sell-leads','DashboardController@sell_leads');
Route::get('/buyerdashboard/buy-leads','DashboardController@buy_leads');
Route::get('/buyerdashboard/deletemessage/{id}','DashboardController@delete_message');
Route::get('/hunt-detail/{id}','ProductController@hunt_detail');
Route::post('/hunt-detail/{id}','ProductController@hunt_product_detail');
Route::get('/buyerdashboard/manage-product-attributes','DashboardController@managepattributes');
Route::get('/empty-cart', 'ProductController@empty_cart');
Route::get('/category/{id}', 'ProductController@showcategory');
Route::get('/subcategory/{id}', 'ProductController@showsubcategory');
Route::get('/buyerdashboard/manage-coupons', 'DashboardController@manage_coupons');
Route::get('/buyerdashboard/add-coupon', 'DashboardController@add_coupons');
Route::post('/buyerdashboard/add-coupon', 'DashboardController@doadd_coupons');
Route::get('/buyerdashboard/delete-coupon/{id}', 'DashboardController@delete_coupon');
Route::get('/buyerdashboard/update-coupon/{id}', 'DashboardController@update_coupon');
Route::post('/buyerdashboard/update-coupon/{id}', 'DashboardController@doupdate_coupon');
Route::get('/buyerdashboard/manage-rules/{id}', 'DashboardController@manage_rules');
Route::get('/buyerdashboard/add-rule/{id}', 'DashboardController@add_rules');
Route::post('/buyerdashboard/add-rule/{id}', 'DashboardController@doadd_rules');
Route::get('/buyerdashboard/delete-rule/{id}', 'DashboardController@delete_rules');
Route::get('/buyerdashboard/update-rule/{id}', 'DashboardController@update_rules');
Route::post('/buyerdashboard/update-rule/{id}', 'DashboardController@doupdate_rules');

Route::get('/admindashboard/manage-coupons', 'AdminController@manage_coupons');
//prashant kumar 17_may
Route::get('/admindashboard/add-coupons', 'AdminController@addCoupons');
Route::post('/admindashboard/add-coupons', 'AdminController@addCoupons');
Route::get('/admindashboard/add-coupons/delete', 'AdminController@deleteCoupons');

Route::get('/admindashboard/add-coupons/manage','AdminController@manageCouponRules');
Route::get('/admindashboard/add-coupons/manage/delete','AdminController@deleteCouponRules');
Route::post('/admindashboard/add-coupons/manage','AdminController@manageCouponRules');

Route::get('/admindashboard/seller-coupon','AdminController@addSellerCoupons');
Route::get('/admindashboard/seller-coupons','AdminController@addSellerCoupons');
Route::post('/admindashboard/seller-coupons','AdminController@addSellerCoupons');
Route::get('/admindashboard/seller-coupon/delete','AdminController@deleteSellerCoupons');

//prashant kumar 17_may
Route::get('/search', 'ProductController@search');
Route::post('/buyerdashboard/hunt-product-detail/{id}', 'ProductController@hunt_product_detail');
Route::get('/buyerdashboard/view-hunt-request', 'DashboardController@view_hunt_request');
Route::get('/buyerdashboard/view-hunt/{id}', 'DashboardController@do_view_hunt_request');
Route::get('/buyerdashboard/confirm-hunt-buyer/{id}', 'paypalAdaptiveController@buyer_confirm_hunt');
Route::get('payment/buyerhuntstatus', array(
    'as' => 'payment.buyerhuntstatus',
    'uses' => 'paypalAdaptiveController@getBuyerHuntPaymentStatus',
));
Route::get('/buyerdashboard/view-confirm-hunt-request', 'DashboardController@view_confirm_hunt');
Route::get('/buyerdashboard/confirm-hunt-seller/{id}', 'PaypalController@seller_confirm_hunt');
Route::get('payment/aellerhuntstatus', array(
    'as' => 'payment.sellerhuntstatus',
    'uses' => 'PaypalController@getSellerHuntPaymentStatus',
));
Route::get('/buyerdashboard/seller-view-hunt/{id}', 'DashboardController@view_seller_hunt');
Route::get('buyerdashboard/view-buyer-swap/{id}', 'DashboardController@view_buyer_swap');
Route::get('admindashboard/hunting-commission', 'AdminController@hunting_commission');
Route::get('admindashboard/update-hunt-commission/{id}', 'AdminController@view_update_commission');
Route::post('admindashboard/update-hunt-commission/{id}', 'AdminController@do_view_update_commission');
Route::get('admindashboard/manage-reports','AdminController@manage_reports');
Route::get('adaptive', 'paypalAdaptiveController@splitPay');
Route::get('viewreport', 'paypalAdaptiveController@viewreport');
Route::get('manage-attributes/{id}','ProductController@manage_attributes');
Route::post('manage-attributes/{id}','ProductController@do_manage_attributes');
Route::get('forgot-password','UserController@forgotPassword');
Route::post('forgot-password','UserController@doForgotPassword');

// prashant kumar

Route::get('change-email','UserController@changeEmail');

Route::post('change-email','UserController@doChangeEmail');

// prashant kumar
Route::get('reset/{code}/{id}','UserController@changePassword');
Route::post('reset/{code}/{id}','UserController@doChangePassword');
Route::get('admindashboard/manage-products','AdminController@manage_products');
Route::get('admindashboard/update-product/{id}','AdminController@update_products');
Route::post('admindashboard/update-product/{id}','AdminController@do_update_products');
Route::get('buyerdashboard/add-attribute-groups','DashboardController@add_attribute_group');
Route::post('buyerdashboard/add-attribute-groups','DashboardController@do_add_attribute_group');
Route::get('buyerdashboard/add-attributes/{id}','DashboardController@add_attributes');
Route::post('buyerdashboard/add-attributes/{id}','DashboardController@do_add_attributes');
Route::get('buyerdashboard/getAttributes','DashboardController@get_attributes');
Route::get('buyerdashboard/manage-attributes/{id}','DashboardController@manage_attributes');
Route::get('buyerdashboard/delete-attributes/{id}','DashboardController@delete_attributes');
Route::get('buyerdashboard/change-attribute/{id}','DashboardController@change_attribute');
Route::post('buyerdashboard/change-attribute/{id}','DashboardController@do_change_attribute');
Route::get('invoice/{id}', 'ProductController@getInvoice');
Route::get('buyerdashboard/swap-transactions','DashboardController@swap_transactions');
Route::get('buyerdashboard/hunt-transactions','DashboardController@hunt_transactions');
Route::get('buyerdashboard/manage-shipping','DashboardController@manage_shipping');
Route::post('buyerdashboard/manage-shipping','DashboardController@do_manage_shipping');
Route::post('buyerdashboard/getToShipping','DashboardController@getToCountries');

Route::group(["prefix"=>"admindashboard"],function(){
	Route::group(["prefix"=>"achievement"],function(){

		Route::get("manage-category","Admin\AchievementController@manage_category");
		Route::group(["prefix"=>"manage-category"],function(){
			Route::any("add","Admin\AchievementController@add_category");
			Route::any("edit/{id?}","Admin\AchievementController@edit_category");
			Route::get("delete/{id}","Admin\AchievementController@delete_category");
		});

		Route::get("manage-achievement","Admin\AchievementController@manage_achievement");
		Route::group(["prefix"=>"manage-achievement"],function(){
			Route::any("add","Admin\AchievementController@add_achievement");
			Route::any("edit/{id?}","Admin\AchievementController@edit_achievement");
			Route::get("delete/{id}","Admin\AchievementController@delete_achievement");
		});
	});
	Route::group(["prefix"=>"lucky-draw"],function(){
		Route::get("manage-lucky-draw","Admin\LuckyDrawController@manage_lucky_draw");
		Route::any("add","Admin\LuckyDrawController@add_lucky_draw");
		Route::any("edit/{id?}","Admin\AchievementController@edit_achievement");
		Route::get("delete/{id}","Admin\AchievementController@delete_achievement");
	});

	Route::group(["prefix"=>"Advert"],function(){
		Route::get("manage-advert","Admin\AdvertController@manageAdverts");
		Route::get("edit-advert","Admin\AdvertController@addAdverts");
		Route::get("edit-advert/delete","Admin\AdvertController@deleteAdvert");
		Route::post("edit-advert","Admin\AdvertController@addAdverts");
		Route::get("manage-advert-category","Admin\AdvertController@manageAdvertcategory");
		Route::get("edit-advert-category","Admin\AdvertController@addAdvertcategory");
		Route::get("edit-advert-category/delete","Admin\AdvertController@deleteAdvertcategory");
		Route::post("edit-advert-category","Admin\AdvertController@addAdvertcategory");
	});

	Route::group(["prefix"=>"Banner"],function(){
		Route::get("manage-banner","Admin\BannerController@manageBanners");
		Route::get("edit-banner","Admin\BannerController@addBanners");
		Route::get("manage-banner/delete","Admin\BannerController@deleteBanner");
		Route::post("edit-banner","Admin\BannerController@addBanners");
	});

	Route::group(["prefix"=>"Buyer"],function(){
		Route::get("manage-buyer","Admin\UserController@manageBuyers");
		Route::get("edit-buyer","Admin\UserController@addBuyers");
		Route::get("manage-buyer/delete","Admin\UserController@deleteBuyer");
		Route::any("manage-buyer/view","Admin\UserController@viewBuyer");
		Route::any("manage-buyer/block","Admin\UserController@blockBuyer");
		Route::post("edit-buyer","Admin\UserController@addBuyers");
	});

	Route::group(["prefix"=>"Seller"],function(){
		Route::get("manage-seller","Admin\UserController@manageSellers");
		Route::get("edit-seller","Admin\UserController@addSellers");
		Route::get("manage-seller/delete","Admin\UserController@deleteSeller");
		Route::any("manage-seller/auction","Admin\UserController@viewSellerAuction");
		Route::any("manage-seller/view-auction/auction","Admin\UserController@viewauctionDetail");
		Route::any("manage-seller/view","Admin\UserController@viewSeller");
		Route::any("manage-seller/block","Admin\UserController@blockSeller");
		Route::post("edit-seller","Admin\UserController@addSellers");
	});
});
