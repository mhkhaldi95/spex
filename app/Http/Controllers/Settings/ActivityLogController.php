<?php

namespace App\Http\Controllers\Settings;

use App\Constants\Enum;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\ActivityLogResource;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = ActivityLog::query()->with(['causer'])->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, ActivityLogResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Activity Logs','active' => false],
        ];
        return view('dashboard.settings.activity_log.index', [
            'page_title' =>'Activity Logs',
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }

    public function get_subject_types()
    {
        $data = config('activitylog.types');
        $data = collect($data)->map(function ($item, $key) {
            return [
                'key' => $key,
                'label' => $item['label']
            ];
        })->values()->toArray();

        return $this->response_api(true, StatusCodes::OK, Enum::DONE_SUCCESSFULLY, ['types' => $data]);

    }
}
