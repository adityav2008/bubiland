<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\admin;
use App\Model\LuckyDrawList;

class LuckyDrawController extends Controller
{
    public function manage_lucky_draw(Request $request)
    {
        $adminData = admin::where('admin_id',session('admin_id'))->first();
        $lucky_draw_list = LuckyDrawList::get();
        return view('admin.lucky-draw.lucky-draw-event-list')->with([
            'adminData'=>$adminData,
            'event_list'=>$lucky_draw_list
        ]);
    }

    public function add_lucky_draw(Request $request)
    {
        if($request->isMethod('get'))
        {
            $adminData = admin::where('admin_id',session('admin_id'))->first();
            return view('admin.lucky-draw.add-lucky-draw')->with([
                'adminData'=>$adminData
            ]);
        }
        if($request->isMethod('post'))
        {

            $this->validate($request,[
              "event_name" => "required",
              "start_date" => "required|date",
              "end_date" => "required|date|after:start_date'",
              "prize" => "required",
              "bonus_point" => "required|numeric",
              "winner_no" => "required|numeric",
              "charge" => "required|numeric",
              "announcement_date" => "required|date",
              "status" => "required"
            ]);
            $data = $request->all();
            unset($data['_token']);
            $flag = LuckyDrawList::insertGetId($data);
            if($flag > 0)
            {
                return redirect('admindashboard/lucky-draw/manage-lucky-draw')->with([
                    'success' => 'Lucky Draw Event Added Successfully'
                ]);
            }
            else
            {
                return redirect('admindashboard/lucky-draw/manage-lucky-draw')->with([
                    'success' => 'Internal Server Error'
                ]);
            }

        }

    }
}
