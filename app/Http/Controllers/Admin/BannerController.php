<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin;
use App\Banners;
use DB;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function manageBanners(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     	  $Banner = Banners::where('id',$request->input('id'))->first();
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.Banner\edit-banner')->with([
	          'adminData'=>$adminData,
	          'banners'=>$Banner
	          ]);
	        }
	        else
	        {
	          	$Banner = Banners::get();
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	          	return view ('admin.Banner\banner')->with([
	            	'adminData'=> $adminData,
	            	'banners' => $Banner
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
    public function addBanners(Request $request)
    {
        if($request->isMethod('get'))
        {
	        if($request->input('id'))
	     	{
	     	  $Banner = Banners::where('id',$request->input('id'))->first();
	          $adminData = admin::where('admin_id',session('admin_id'))->first();
	          return view('admin.Banner\edit-banner')->with([
	          'adminData'=>$adminData,
	          'banners'=>$Banner
	          ]);
	        }
	        else
	        {
	          	$adminData = admin::where('admin_id',session('admin_id'))->first();
	         	return view ('admin.Banner\edit-banner')->with([
	            'adminData'=> $adminData
	            ]);
	        }
        }
        if($request->isMethod('post'))
        {
            if($request->input('action') == 'add')
            {   

	            $adminData = admin::where('admin_id',session('admin_id'))->first();

	            $this->validate($request,[
	            "name" => "required|string",
	            "page" => "required",
	            "height" => "required",
	            "width" => "required",
	            "active" =>"required|numeric",
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
	           
	            $flag = DB::table('banners')->insertGetId($data);
		        if($flag > 0)
		        return redirect('/admindashboard/Banner/manage-banner')->with([
			                 'adminData'=> $adminData

			               ])->with('success','New Banner successfully added');
		        else
		        return redirect('/admindashboard/Banner/edit-banner')->with([
			                 'adminData'=> $adminData
			       
			               ])->with('success','Internal Server Error Occured');
            }
	        if($request->input('action') == 'edit')
	        {
	        	$adminData = admin::where('admin_id',session('admin_id'))->first();
	            $this->validate($request,[
	            "name" => "required|string",
	            "page" => "required",
	            "height" => "required",
	            "width" => "required",
	            "active" =>"required|numeric",
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
	            	$imageurl = Banners::where('id',$request->input('id'))->first();
	            	$imageurl = $imageurl->image_url;
	            }
	            $data = $request->all();
	            $data['image_url'] = $image_url;
	            unset($data['_token']);
	            unset($data['action']);
	            unset($data['submit']);
	            $flag = DB::table('banners')->where('id',$request->input('id'))->update($data);
	            if($flag > 0)
	              return redirect('/admindashboard/Banner/manage-banner')->with('success','Coupon successfully updated');
	            else
	              return redirect('/admindashboard/Banner/manage-banner')->with('success','Internal Server Error Occured');
	        }
        }
    
    }

    public function deleteBanner(Request $request)
    {
    	if($request->isMethod('get'))
	    {

	       $flag = DB::table('banners')->where('id',$request->input('id'))->delete();
	        if($flag > 0)
	        return redirect('/admindashboard/Banner/manage-banner')->with('success','Coupon successfully Deleted');
	        else
	        return redirect('/admindashboard/Banner/manage-banner')->with('success','Internal Server Error Occured');

	    }    
    }
}
