<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use App\User;
use App\admin;
use App\Products;
use DB;
use App\user_messages;
use Redirect;
use App\Categories;
use URL;
use Mail;
use App\Helper\GetCountryHelper;

class UserController extends Controller
{
	//Buyer section
    public function manageBuyers(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     		$country = GetCountryHelper::getCountryList();
	     	  	$buyers = User::where([
	     	  	                      'is_buyer'=> 1,
	     	  	                      'user_id'=> $request->input('id')
	     	  	                    ])->first();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view('admin.Buyer.edit-buyer')->with([
		          'adminData'=>$adminData,
		          'buyers'=>$buyers,
		          'country' => $country
		          ]);
	        }
	        else
	        {
	        	$country = GetCountryHelper::getCountryList();
	          	$buyers = User::where('is_buyer',1)->paginate(10);
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view ('admin.Buyer.buyer')->with([
	            	'adminData'=> $adminData,
	            	'buyers' => $buyers,
	            	'country' => $country
	            ]);
	        }
        }
    }

    public function addBuyers(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     		$country = GetCountryHelper::getCountryList();
	            $adminData = admin::where('admin_id',session('admin_id'))->first();
	            return view('admin.Buyer\edit-buyer')->with([
			          'adminData'=>$adminData,
			          'country' => $country
                    ]);
	        }
	        else
	        {	
	        	$country = GetCountryHelper::getCountryList();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	         	return view ('admin.Buyer\edit-buyer')->with([
	            'adminData'=> $adminData,
	            'country' => $country
	            ]);
	        }
        }

        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
	            $adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "first_name" => "required|string",
	            "last_name" => "required|string",
	            "email" => "required|email|unique:users",
	            "password" => "required|min:6|alpha_num",
	            "status" =>"required|numeric",
	            "mobile_number" =>"required",
	            "address1" => "required|string|max:255",
	            "postal_code" => "required",
	            "country" => "required|string",
	            "paypal_email"=>"required|email",
	            "newsletter" => "required",
	            "password" =>"required"
	            ]);

	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            $data['is_buyer'] = 1;
	            $data['password'] = Hash::make('password');
	     	           
	            $flag = DB::table('users')->insertGetId($data);
		        if($flag > 0)
		        	return redirect('/admindashboard/Buyer/manage-buyer')->with([
			                 'adminData'=> $adminData

			               ])->with('success','New Buyer successfully added');
		        else
		        	return redirect('/admindashboard/Buyer/edit-buyer')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('warning','Internal Server Error Occured');
            }
	        if($request->input('action') == 'edit')
	        {
	        	$adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "first_name" => "required|string",
	            "last_name" => "required|string",
	            "email" => "required|email|unique:users",
	            "password" => "required|min:6|alpha_num",
	            "status" =>"required|numeric",
	            "mobile_number" =>"required",
	            "address1" => "required|string|max:255",
	            "postal_code" => "required",
	            "country" => "required|string",
	            "paypal_email"=>"required|email",
	            "newsletter" => "required",
	            "password" =>"required"
	            ]);

	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            unset($data['id']);
	            $data['is_buyer'] = 1;
	            $data['password'] = Hash::make('password');

	            $flag = DB::table('users')->where('user_id',$request->input('id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/Buyer/manage-buyer/view?id='.$request->input('id'))->with('success','Buyer successfully updated');
	            else
	              return redirect('/admindashboard/Buyer/manage-buyer')->with('warning','Internal Server Error Occured');
	        }
        }
    
    }

    public function deleteBuyer(Request $request)
    {
    	if($request->isMethod('get'))
	    {	
	    
	        $flag = DB::table('users')->where('user_id',$request->input('id'))->delete();
	        if($flag > 0)
	        return redirect('/admindashboard/Buyer/manage-buyer')->with('success','Buyer successfully Removed');
	        else
	        return redirect('/admindashboard/Buyer/manage-buyer')->with('warning','Internal Server Error Occured');
	    }    
    }

    public function viewBuyer(Request $request)
    {
    	if($request->isMethod('get'))
	    {

	        $buyers = User::where(['is_buyer'=> 1,'user_id'=> $request->input('id')])->first();
	        $adminData = admin::where('admin_id',session('admin_id'))->first();
	        return view('admin.Buyer.view-buyer')->with([
	        'adminData'=>$adminData,
	        'buyers'=>$buyers
	        ]);
	    }   
    }

    public function blockBuyer(Request $request)
    {
    	if($request->isMethod('get'))
	    {
	    	$data = $request->all();
	    	unset($data['id']);
	    	$adminData = admin::where('admin_id',session('admin_id'))->first();
	    	$user = DB::table('users')->where('user_id',$request->input('id'))->first();
	    	if($user->status == 1)
	    	   $data['status'] = 0;
	    	else
	    		$data['status'] = 1;

	    	$flag = DB::table('users')->where('user_id',$request->input('id'))->update($data);
	          if($flag > 0)
	          	if($user->status == 1)
	    	   		return redirect('/admindashboard/Buyer/manage-buyer')->with('success','User successfully Unblock');
	    		else
	    			return redirect('/admindashboard/Buyer/manage-buyer')->with('info','User successfully Blocked');
	          
	          else
	          return redirect('/admindashboard/Buyer/manage-buyer')->with('success','Internal Server Error Occured');
	    }  
    }

    //seller section 
    public function manageSellers(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     		$country = GetCountryHelper::getCountryList();
	     	  	$sellers = User::where([
	     	  	                      'is_seller'=> 1,
	     	  	                      'user_id'=> $request->input('id')
	     	  	                    ])->first();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view('admin.Seller.edit-seller')->with([
		          'adminData'=>$adminData,
		          'sellers'=>$sellers,
		          'country' => $country
		          ]);
	        }
	        else
	        {
	        	$country = GetCountryHelper::getCountryList();
	          	$sellers = User::where('is_seller',1)->paginate(10);
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view ('admin.Seller.seller')->with([
	            	'adminData'=> $adminData,
	            	'sellers' => $sellers,
	            	'country' => $country
	            ]);
	        }
        }
    }

    public function addSellers(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     		$country = GetCountryHelper::getCountryList();
	            $adminData = admin::where('admin_id',session('admin_id'))->first();
	            return view('admin.Seller.edit-seller')->with([
			          'adminData'=>$adminData,
			          'country' => $country
                    ]);
	        }
	        else
	        {	
	        	$country = GetCountryHelper::getCountryList();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	         	return view ('admin.Seller.edit-seller')->with([
	            'adminData'=> $adminData,
	            'country' => $country
	            ]);
	        }
        }

        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
	            $adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "first_name" => "required|string",
	            "last_name" => "required|string",
	            "email" => "required|email|unique:users",
	            "password" => "required|min:6|alpha_num",
	            "status" =>"required|numeric",
	            "mobile_number" =>"required",
	            "address1" => "required|string|max:255",
	            "postal_code" => "required",
	            "country" => "required|string",
	            "paypal_email"=>"required|email",
	            "newsletter" => "required",
	            "password" =>"required"
	            ]);

	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            $data['is_seller'] = 1;
	            $data['password'] = Hash::make('password');
	     	           
	            $flag = DB::table('users')->insertGetId($data);
		        if($flag > 0)
		        	return redirect('/admindashboard/Seller/manage-seller')->with([
			                 'adminData'=> $adminData

			               ])->with('success','New Seller successfully added');
		        else
		        	return redirect('/admindashboard/Seller/edit-seller')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('warning','Internal Server Error Occured');
            }
	        if($request->input('action') == 'edit')
	        {
	        	$adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "first_name" => "required|string",
	            "last_name" => "required|string",
	            "email" => "required|email|unique:users",
	            "password" => "required|min:6|alpha_num",
	            "status" =>"required|numeric",
	            "mobile_number" =>"required",
	            "address1" => "required|string|max:255",
	            "postal_code" => "required",
	            "country" => "required|string",
	            "paypal_email"=>"required|email",
	            "newsletter" => "required",
	            "password" =>"required"
	            ]);

	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            unset($data['id']);
	            $data['is_seller'] = 1;
	            $data['password'] = Hash::make('password');

	            $flag = DB::table('users')->where('user_id',$request->input('id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/Seller/manage-seller/view?id='.$request->input('id'))->with('success','Buyer successfully updated');
	            else
	              return redirect('/admindashboard/Seller/manage-seller')->with('warning','Internal Server Error Occured');
	        }
        }
    
    }

    public function deleteSeller(Request $request)
    {
    	if($request->isMethod('get'))
	    {	
	    
	        $flag = DB::table('users')->where('user_id',$request->input('id'))->delete();
	        if($flag > 0)
	        return redirect('/admindashboard/Seller/manage-seller')->with('success','Seller successfully Removed');
	        else
	        return redirect('/admindashboard/Seller/manage-seller')->with('warning','Internal Server Error Occured');
	    }    
    }

    public function viewSeller(Request $request)
    {
    	if($request->isMethod('get'))
	    {

	        $sellers = User::where(['is_seller'=> 1,'user_id'=> $request->input('id')])->first();
	        $adminData = admin::where('admin_id',session('admin_id'))->first();
	        return view('admin.Seller.view-seller')->with([
	        'adminData'=>$adminData,
	        'sellers'=>$sellers
	        ]);
	    }   
    }

    public function blockSeller(Request $request)
    {
    	if($request->isMethod('get'))
	    {
	    	$data = $request->all();
	    	unset($data['id']);
	    	$adminData = admin::where('admin_id',session('admin_id'))->first();
	    	$user = DB::table('users')->where('user_id',$request->input('id'))->first();
	    	if($user->status == 1)
	    	   $data['status'] = 0;
	    	else
	    		$data['status'] = 1;

	    	$flag = DB::table('users')->where('user_id',$request->input('id'))->update($data);
	          if($flag > 0)
	          	if($user->status == 1)
	    	   		return redirect('/admindashboard/Seller/manage-seller')->with('success','User successfully Unblock');
	    		else
	    			return redirect('/admindashboard/Seller/manage-seller')->with('info','User successfully Blocked');
	          
	          else
	          return redirect('/admindashboard/Seller/manage-seller')->with('success','Internal Server Error Occured');
	    }  
    }

    
    public function viewsellerAuction(Request $request)
    {
    	if($request->isMethod('get'))
	    {
	    	$products = Products::where([
	    		'seller_id' => $request->input('id'),
	    		'sell_type_id'=>'3'
	    		])->get();
	        $sellers = User::where(['is_seller'=> 1,'user_id'=> $request->input('id')])->first();
	        $adminData = admin::where('admin_id',session('admin_id'))->first();
	        return view('admin.Seller.auction-product')->with([
	        'adminData'=>$adminData,
	        'sellers'=>$sellers,
	        'products'=>$products
	        ]);
	    }   
    }

    public function viewauctionDetail(Request $request)
    {
    	if($request->isMethod('get'))
	    {
	    	$products = Products::where([
	    		'product_id' => $request->input('id'),
	    		'sell_type_id'=>'3'
	    		])->first();
	        //$sellers = User::where(['is_seller'=> 1,'user_id'=> $request->input('id')])->first();
	        $adminData = admin::where('admin_id',session('admin_id'))->first();
	        return view('admin.Seller.view-seller-auction')->with([
	        'adminData'=>$adminData,
	        //'sellers'=>$sellers,
	        'products'=>$products
	        ]);
	    } 
	    // if($request->isMethod('post'))
	    // {
	    // 	dd($request->all());
	    // 	$products = Products::where([
	    // 		'seller_id' => $request->input('id'),
	    // 		'sell_type_id'=>'3'
	    // 		])->get();
	    //     $sellers = User::where(['is_seller'=> 1,'user_id'=> $request->input('id')])->first();
	    //     $adminData = admin::where('admin_id',session('admin_id'))->first();
	    //     return view('admin.Seller.view-seller-auction')->with([
	    //     'adminData'=>$adminData,
	    //     'sellers'=>$sellers,
	    //     'products'=>$products
	    //     ]);
	    // }  
    }
}
