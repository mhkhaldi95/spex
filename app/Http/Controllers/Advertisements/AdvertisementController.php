<?php

namespace App\Http\Controllers\Advertisements;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisements\AdvertisementRequest;
use App\Http\Resources\Advertisements\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdvertisementController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = Advertisement::query()->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, AdvertisementResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Advertisements','active' => false],
        ];
        return view('dashboard.advertisements.index', [
            'page_title' =>'Advertisements',
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }
    public function create($id = null)
    {
        $page_title = __('lang.create');
        if (isset($id)) {
            $page_title = __('lang.edit');
            try {
                $item = Advertisement::query()->filter()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => route('advertisements.index') , 'title' =>'Advertisements','active' => true],
            ['page' => '#' , 'title' =>isset($id)?'Edit':'Add','active' => false],
        ];
        return view('dashboard.advertisements.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => @$item?(new AdvertisementResource($item)):null ,
        ]);
    }
    public function store(AdvertisementRequest $request, $id = null)
    {
        $data = $request->only(Advertisement::FILLABLE);


        DB::beginTransaction();
        try {

            if(isset($data['image'])){
                $data['image'] =  uploadFile($request,'advertisements-image','image');
            }
            $item = Advertisement::query()->updateOrCreate([
                'id' => $id,
            ], $data);


            DB::commit();

            return $this->returnBackWithSaveDone();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->returnBackWithSaveDoneFailed();
        }
    }

    public function delete($id){
        try {
            $item = Advertisement::query()->filter()->findOrFail($id);
        } catch (QueryException $exception) {
            return $this->invalidIntParameter();
        }
        $item->update([
            'is_deleted' => !$item->is_deleted
        ]);
        if($item){
            return $this->response_json(true, StatusCodes::OK, 'delete done');

        }
        return $this->response_json(false, StatusCodes::INTERNAL_ERROR, 'general error');

    }



}
