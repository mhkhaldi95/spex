<?php

namespace App\Http\Controllers\Collections;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collections\CollectionRequest;
use App\Http\Resources\Collections\CollectionResource;
use App\Models\Brand;
use App\Models\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CollectionController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = Collection::query()->with('brand')->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, CollectionResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Collections','active' => false],
        ];
        return view('dashboard.collections.index', [
            'page_title' =>'Collections',
            'page_breadcrumbs' => $page_breadcrumbs,
            'brands' => Brand::query()->get(),
        ]);
    }
    public function create($id = null)
    {
        $page_title = __('lang.create');
        if (isset($id)) {
            $page_title = __('lang.edit');
            try {
                $item = Collection::query()->filter()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => route('collections.index') , 'title' =>'Collections','active' => true],
            ['page' => '#' , 'title' =>isset($id)?'Edit':'Add','active' => false],
        ];
        return view('dashboard.collections.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => @$item?(new CollectionResource($item)):null ,
            'brands' => Brand::query()->get(),
        ]);
    }
    public function store(CollectionRequest $request, $id = null)
    {
        $data = $request->only(Collection::FILLABLE);


        DB::beginTransaction();
        try {

            $item = Collection::query()->updateOrCreate([
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
            $item = Collection::query()->filter()->findOrFail($id);
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
