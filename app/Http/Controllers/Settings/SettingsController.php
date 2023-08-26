<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{

    public function create()
    {
        $page_title = __('lang.settings');
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title'=>'Settings','active' => false],
        ];
        return view('dashboard.settings.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if(isset($data['site_icon'])){
            $data['site_icon'] =  uploadFile($request,'site-icons','site_icon');
        }else{
            unset($data['site_icon']);
        }
        if(isset($data['about_image'])){
            $data['about_image'] =  uploadFile($request,'site-icons','about_image');
        }else{
            unset($data['about_image']);
        }


        if(isset($data['site_tags'])){
            $data['site_tags'] = convertTagsObjectToString($data['site_tags']);
        }else{
            unset($data['site_tags']);
        }

        try {
            DB::beginTransaction();

            foreach ($data as $key=>$value){
                $row = Setting::query()->updateOrCreate([
                    'key' => $key
                ],
                [
                    'value' => $value,
                ]
                );


            }
            DB::commit();
            return $this->returnBackWithSaveDone();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->returnBackWithSaveDoneFailed();
        }
    }


}
