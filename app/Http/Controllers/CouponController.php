<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\admin;
use App\Categories;
use App\attributes;
use App\brands;
use Carbon\Carbon;
use App\selltype;
use File;
use Illuminate\Support\Facades\Validator;
use App\auction_categories;
use Session;
use Hash;
use App\coupon_code_rules;
use App\create_coupon_code;
use App\hunt_commission;
use App\paypal_transactions;
use App\Products;
use DB;

class CouponController extends Controller
{
	public function manage_coupons(Request $request)
	{
	  	session()->regenerate();
	  	if(session('usertype') == 'admin')
	  	{
	    	$adminData = admin::where('admin_id',session('admin_id'))->first();
	    	$seller_coupons = create_coupon_code::where('role_id', 3)->get();
	    	$admin_coupons = coupon_code_rules::where('created_by', 1)->get();
	    	return view('admin.manage-coupons')->with('adminData',$adminData)->with('scoupons', $seller_coupons)->with('acoupons', $admin_coupons);
	  	}
	  	else
	  	{
	    	return redirect('/admin');
	  	}
	}
    public function addCoupons(Request $request)
    {
	    if($request->isMethod('get'))
	    {

         	if(isset($_GET['id']))
         	{
		        $adminData = admin::where('admin_id',session('admin_id'))->first();
		        $coupons = DB::table('coupon_code_rules')->where('coupon_rule_id',$request->input('id'))->rst();
		        return view('admin.edit-coupons')->with([
		          'coupons'=>$coupons,
		          'adminData'=>$adminData
		          ]);

	        }
	        else
	        {
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view ('admin.edit-coupons')->with('adminData', $adminData);
	        }
      	}
      	if($request->isMethod('post'))
      	{
        
         	if($request->input('action') == 'add')
         	{   
             
              	$adminData = admin::where('admin_id',session('admin_id'))->first();
              	$seller_coupons = create_coupon_code::where('role_id', 3)->get();
              	$admin_coupons = coupon_code_rules::where('created_by', 1)->get();
              	$data = $request->all();
               	unset($data['_token']);
               	unset($data['submit']);
               	$flag = new coupon_code_rules;
               	$flag->coupon_rule_id = $request->input('coupon_rule_id');
               	$flag->coupon_id = $request->input('coupon_id');
               	$flag->minimum_amount = $request->input('minimum_amount');
               	$flag->maximum_amount = $request->input('maximum_amount');
               	$flag->created_by = session('admin_id');
               	$flag->updated_by = session('admin_id');
               	$flag->created_at = Carbon::now();
               	$flag->updated_at = Carbon::now();
               	$flag->save();
              	return view ('admin.manage-coupons')->with('adminData', $adminData)->with('scoupons', $seller_coupons)->with('acoupons', $admin_coupons)->with('success','Coupon Successfully added');
          	}
      
	        if($request->input('action') == 'edit')
	        {
	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['action']);
	            unset($data['submit']);
	            $flag = DB::table('coupon_code_rules')->where('coupon_rule_id',$request->input('coupon_rule_id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/manage-coupons')->with('success','Coupon successfully updated');
	            else
	              return redirect('/admindashboard/manage-coupons')->with('success','Internal Server Error Occured');
	        }
      	}
    }

	public function deleteCoupons(Request $request)
	{
	    if($request->isMethod('get'))
	    {
	      	$flag = DB::table('coupon_code_rules')->where('coupon_rule_id',$request->input('id'))->delete();
	      	if($flag > 0)
	      	return redirect('/admindashboard/manage-coupons')->with('success','Coupon successfully Deleted');
	      	else
	     return redirect('/admindashboard/manage-coupons')->with('success','Internal Server Error Occured');
	    }
	}

}
