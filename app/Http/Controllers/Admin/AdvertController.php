<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin;
use App\Model\Addscategory;
use App\Model\Adverts;
use DB;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
   public function manageAdverts(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     	  $advert = Adverts::where('id',$request->input('id'))->first();
	     	  $categoryId = Addscategory::get();
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.Advert\edit-advert')->with([
	          'adminData'=>$adminData,
	          'adverts'=>$advert,
	          'categoryId' => $categoryId
	          ]);
	        }
	        else
	        {
	          	$advert = Adverts::get();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view ('admin.Advert\advert')->with([
	            	'adminData'=> $adminData,
	            	'advert' => $advert
	            	
	            ]);
	        }
        }
        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
	            
	             //
            }
	        if($request->input('action') == 'edit')
	        {
	           //
	        }
        

      }
    
    }
    public function addAdverts(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if(isset($_GET['id']))
	     	{
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.edit-coupons')->with([
	          'adminData'=>$adminData,
	          ]);
	        }
	        else
	        {
	        	$categoryId = Addscategory::get();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	         	return view ('admin.Advert\edit-advert')->with([
	            'adminData'=> $adminData,
	            'categoryId'=>$categoryId
	            ]);
	        }
        }
        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
            	

	            $adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "alt" => "required|string",
	            "url" => "required",
	            "views" => "required|numeric",
	            "clicks" => "required|numeric",
	            "active" =>"required|numeric",
	            "advert_category_id"=>"required|numeric",
	            "viewed_at"=>"required",
	            "image_url" =>"required"
	            ]);

	            if($request->hasFile('image_url'))
	          	{
		            $image =$request->file('image_url');
		            $fileName = $image->getClientOriginalName();
		            $extension = $image->getClientMimeType();
		            $extension=array("jpeg","jpg","png","gif");
              	    $file_name=$_FILES["image_url"]["name"];
              	    $file_tmp=$_FILES["image_url"]["tmp_name"];
              	    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
	              	if(strtolower($ext))
	              	{
	              	 	$path = public_path().'/images/';
	              	 	if(!file_exists($path.$file_name))
	              	 	{
	              	 	    $filename=basename($file_name,$ext);
	              	 	    $newFileName=$filename.time().".".$ext;
	              	 	    move_uploaded_file($file_tmp=$_FILES["image_url"]["tmp_name"],$path.$newFileName);
	              	 	    $image_url = '/images/'.$newFileName;
	              	 	}
	              	}
	              	else
	              	{
	              		 dd('No image was found! Please upload another image');
	              	}
             
	            }
	            
	            $data = $request->all();
	            $data['image_url'] = $image_url;
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            $flag = DB::table('adverts')->insertGetId($data);
		        if($flag > 0)
		        return redirect('/admindashboard/Advert/manage-advert')->with([
			                 'adminData'=> $adminData

			               ])->with('success','New Advert successfully added');
		        else
		        return redirect('/admindashboard/Advert/edit-advert')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('success','Internal Server Error Occured');
            }
	        if($request->input('action') == 'edit')
	        {
	        	$adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "alt" => "required|string",
	            "url" => "required",
	            "views" => "required|numeric",
	            "clicks" => "required|numeric",
	            "active" =>"required|numeric",
	            "advert_category_id"=>"required|numeric",
	            "viewed_at"=>"required",
	            "image_url" =>"required"
	            ]);

	            if($request->hasFile('image_url'))
	          	{
		            $image = $request->file('image_url');
		            $fileName = $image->getClientOriginalName();
		            $extension = $image->getClientMimeType();
		            $extension=array("jpeg","jpg","png","gif");
              	    $file_name=$_FILES["image_url"]["name"];
              	    $file_tmp=$_FILES["image_url"]["tmp_name"];
              	    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
	              	if(strtolower($ext))
	              	{
	              	 	$path = public_path().'/images/';
	              	 	if(!file_exists($path.$file_name))
	              	 	{
	              	 	    $filename=basename($file_name,$ext);
	              	 	    $newFileName=$filename.time().".".$ext;
	              	 	    move_uploaded_file($file_tmp=$_FILES["image_url"]["tmp_name"],$path.$newFileName);
	              	 	    $image_url = '/images/'.$newFileName;
	              	 	}
	              	}
	              	else
	              	{
	              		 dd('No image was found! Please upload another image');
	              	}
	              	
	            }
	            else
	            {
	            	$imageurl = Adverts::where('id',$request->input('id'))->first();
	            	$imageurl = $imageurl->image_url;
	            }
	            $data = $request->all();
	            $data['image_url'] = $image_url;
	            unset($data['_token']);
	            unset($data['action']);
	            unset($data['submit']);
	            $flag = DB::table('adverts')->where('id',$request->input('id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/Advert/manage-advert')->with('success','Coupon successfully updated');
	            else
	              return redirect('/admindashboard/Advert/manage-advert')->with('success','Internal Server Error Occured');
	        }
        

      }
    
    }

    public function deleteAdvert(Request $request)
    {
    	if($request->isMethod('get'))
	    {

	       $flag = DB::table('adverts')->where('id',$request->input('id'))->delete();
	        if($flag > 0)
	        return redirect('/admindashboard/Advert/manage-advert')->with('success','Coupon successfully Deleted');
	        else
	        return redirect('/admindashboard/Advert/manage-advert')->with('success','Internal Server Error Occured');

	    }
    }
    
    public function manageAdvertcategory(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     	  $addscategories = Addscategory::where('id',$request->input('id'))->get();
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.Advert\advertcategory')->with([
	          'adminData'=>$adminData,
	          'addscategory'=>$addscategories
	          ]);
	        }
	        else
	        { 
	          $addscategories = Addscategory::get();
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view ('admin.Advert\advertcategory')->with([
	            'adminData'=> $adminData,
	            'addscategory'=>$addscategories
	            ]);
	        }
        }
        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
	           
	           //
            }
	        if($request->input('action') == 'edit')
	        {
	           //
	        }
        

      }
    
    }

    public function addAdvertcategory(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if(isset($_GET['id']))
	     	{
	     	  $addscategories = Addscategory::where('id',$request->input('id'))->first();		
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.Advert\edit-advert-category')->with([
	          'adminData'=>$adminData,
	          'addscategory'=>$addscategories
	          ]);
	        }
	        else
	        {
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view ('admin.Advert\edit-advert-category')->with([
	            'adminData'=> $adminData
	            ]);
	        }
        }
        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   
	            // $rule = CouponRules::where('created_by',1)->get();
	             $adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "type" => "required|string",
	            "height" => "required",
	            "width" => "required"
	            ]);
	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['submit']);
	            unset($data['action']);
	            $flag = DB::table('addscategories')->insertGetId($data);
		        if($flag > 0)
		        return redirect('/admindashboard/Advert/manage-advert-category')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('success','New Category successfully added');
		        else
		        return redirect('/admindashboard/Advert/edit-advert-category')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('success','Internal Server Error Occured');
		
            }
	        if($request->input('action') == 'edit')
	        {
	            $data = $request->all();
	            unset($data['_token']);
	            unset($data['action']);
	            unset($data['submit']);
	            $flag = DB::table('addscategories')->where('id',$request->input('id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/Advert/manage-advert-category')->with('success','Coupon successfully updated');
	            else
	              return redirect('/admindashboard/edit-advert-category')->with('success','Internal Server Error Occured');
	        }
        

      }
    
    }

    public function deleteAdvertcategory(Request $request)
    {
    	if($request->isMethod('get'))
	    {

	       $flag = DB::table('addscategories')->where('id',$request->input('id'))->delete();
	        if($flag > 0)
	        return redirect('/admindashboard/Advert/manage-advert-category')->with('success','Coupon successfully Deleted');
	        else
	        return redirect('/admindashboard/Advert/manage-advert-category')->with('success','Internal Server Error Occured');

	    }
    }
}
