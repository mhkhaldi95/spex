<?php

namespace App\Http\Controllers\Brands;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandRequest;
use App\Http\Resources\Brands\BrandResource;
use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = Brand::query()->with('collections')->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, BrandResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Brands','active' => false],
        ];
        return view('dashboard.brands.index', [
            'page_title' =>'Brands',
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }
    public function create($id = null)
    {
        $page_title = __('lang.create');
        if (isset($id)) {
            $page_title = __('lang.edit');
            try {
                $item = Brand::query()->filter()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => route('brands.index') , 'title' =>'Brands','active' => true],
            ['page' => '#' , 'title' =>isset($id)?'Edit':'Add','active' => false],
        ];
        return view('dashboard.brands.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => @$item?(new BrandResource($item)):null ,
        ]);
    }
    public function store(BrandRequest $request, $id = null)
    {
        $data = $request->only(Brand::FILLABLE);


        DB::beginTransaction();
        try {

            if(isset($data['image'])){
                $data['image'] =  uploadFile($request,'brands-image','image');
            }
            $item = Brand::query()->updateOrCreate([
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
            $item = Brand::query()->filter()->findOrFail($id);
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
