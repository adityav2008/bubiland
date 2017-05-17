<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin;
use Validator;
use App\Model\AchievementCategory;
use App\Model\AchievementList;

class AchievementController extends Controller
{
    public function manage_category(Request $request)
    {
        $adminData = admin::where('admin_id',session('admin_id'))->first();
        $category_list = AchievementCategory::get();
        return view("admin.achievement.category-list")->with([
            "adminData"=>$adminData,
            "category_list"=>$category_list
        ]);
    }

    public function add_category(Request $request)
    {
        if($request->isMethod('get'))
        {
            $adminData = admin::where('admin_id',session('admin_id'))->first();
            return view("admin.achievement.add-category")->with([
                "adminData"=>$adminData
            ]);
        }
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'name' => 'required',
                'status' => 'required'
              ]);
            $data = $request->all();
            unset($data['_token']);
            $flag = AchievementCategory::insertGetId($data);
            if($flag > 0)
             return redirect('admindashboard/achievement/manage-category')->with('success','New Achievement Category Added Successfully');
            else
             return redirect('admindashboard/achievement/manage-category')->with('error','Internal Server Error');

        }

    }

    public function edit_category(Request $request,$id='')
    {
        if($request->isMethod('get'))
        {
            $category_data = AchievementCategory::where('id',$id)->first();
            $adminData = admin::where('admin_id',session('admin_id'))->first();
            return view("admin.achievement.edit-category")->with([
                "adminData"=>$adminData,
                "category_data"=>$category_data
            ]);
        }
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'name' => 'required',
                'status' => 'required'
              ]);
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            $flag = AchievementCategory::where('id',$request['id'])->update($data);
            if($flag > 0)
             return redirect('admindashboard/achievement/manage-category')->with('success','Achievement Category Updated Successfully');
            else
             return redirect('admindashboard/achievement/manage-category')->with('error','Internal Server Error');
        }
    }

    public function delete_category($id)
    {
        $flag = AchievementCategory::where('id',$id)->delete();
        $adminData = admin::where('admin_id',session('admin_id'))->first();
        if($flag > 0)
        {
            return view("admin.achievement.category-list")->with([
                "success" => "Achievement Category Deleted Successfully",
                "adminData"=>$adminData
            ]);
        }
        else
        {
            return view("admin.achievement.category-list")->with([
                "success" => "Internal Server Error",
                "adminData"=>$adminData
            ]);
        }

    }

    public function manage_achievement(Request $request)
    {
        $adminData = admin::where('admin_id',session('admin_id'))->first();
        $achievement_list = AchievementList::get();
        return view("admin.achievement.achievement-list")->with([
            "adminData"=>$adminData,
            "achievement_list"=>$achievement_list
        ]);
    }

    public function add_achievement(Request $request)
    {
        if($request->isMethod('get'))
        {
            $adminData = admin::where('admin_id',session('admin_id'))->first();
            $achievement_category = AchievementCategory::where('status',1)->get();
            return view("admin.achievement.add-achievement")->with([
                "adminData"=>$adminData,
                "achievement_category"=>$achievement_category
            ]);
        }
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                "achievement_name" => "required",
                "description" => "required",
                "amount" => "required|numeric",
                "bonus_point" => "required|numeric",
                "achievement_type" => "required",
                "expiry_date" => "required|date",
                "status" => "required"
              ]);
            $data = $request->all();
            unset($data['_token']);
            $flag = AchievementList::insertGetId($data);
            if($flag > 0)
             return redirect('admindashboard/achievement/manage-achievement')->with('success','New Achievement Added Successfully');
            else
             return redirect('admindashboard/achievement/manage-achievement')->with('error','Internal Server Error');

        }

    }

    public function edit_achievement(Request $request,$id='')
    {
        if($request->isMethod('get'))
        {
            $achievement = AchievementList::where('id',$id)->first();
            $adminData = admin::where('admin_id',session('admin_id'))->first();
            $achievement_category = AchievementCategory::where('status',1)->get();
            return view("admin.achievement.edit-achievement")->with([
                "adminData"=>$adminData,
                "achievement"=>$achievement,
                "achievement_category"=>$achievement_category
            ]);
        }
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                "achievement_name" => "required",
                "description" => "required",
                "amount" => "required|numeric",
                "bonus_point" => "required|numeric",
                "achievement_type" => "required",
                "expiry_date" => "required|date",
                "status" => "required"
              ]);
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            $flag = AchievementList::where('id',$request['id'])->update($data);
            if($flag > 0)
             return redirect('admindashboard/achievement/manage-achievement')->with('success','Achievement Updated Successfully');
            else
             return redirect('admindashboard/achievement/manage-achievement')->with('error','Internal Server Error');
        }
    }

    public function delete_achievement($id)
    {
        $flag = AchievementList::where('id',$id)->delete();
        $adminData = admin::where('admin_id',session('admin_id'))->first();
        if($flag > 0)
        {
            return redirect('admindashboard/achievement/manage-achievement')->with([
                "success" => "Achievement Deleted Successfully",
                "adminData"=>$adminData
            ]);
        }
        else
        {
            return redirect('admindashboard/achievement/manage-achievement')->with([
                "success" => "Internal Server Error",
                "adminData"=>$adminData
            ]);
        }

    }
}
