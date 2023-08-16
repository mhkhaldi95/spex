<?php

namespace App\Http\Controllers\UserManagement\Admins;

use App\Constants\Enum;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\Admins\AdminRequest;
use App\Http\Requests\UserManagement\Customers\CustomerRequest;
use App\Http\Resources\UserManagement\Admins\AdminResource;
use App\Http\Resources\UserManagement\Customers\CustomerResource;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = User::query()->orderByDesc('id')->admins()->filter()->paginate(\request()->get('length', 10),'*','*',getPageNumber($length));
            return datatable_response($items, null, AdminResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Admins','active' => false],
        ];
        return view('dashboard.user_management.admins.index', [
            'page_title' =>'Home',
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }

    public function create($id = null)
    {
        $page_title = __('create');
        if (isset($id)) {
            $page_title = __('edit');
            try {
                $item = User::query()->admins()->filter()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => route('admins.index') , 'title' =>'Admins','active' => true],
            ['page' => '#' , 'title' =>isset($id)?'Edit':'Add','active' => false],
        ];
        return view('dashboard.user_management.admins.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => @$item,
        ]);
    }
    public function store(AdminRequest $request, $id = null)
    {
        $data = $request->only(User::FILLABLE);
        if(isset($data['photo'])){
            $data['photo'] =  uploadFile($request,'user-photos','photo');
        }else{
            unset($data['photo']);
        }
        $data['role'] = Enum::ADMIN;
        DB::beginTransaction();
      try {
            $item = User::query()->updateOrCreate([
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
            $item = User::query()->admins()->findOrFail($id);
            $item->update([
                'is_deleted' =>!$item->is_deleted
            ]);
            return $this->response_json(true, StatusCodes::OK, 'Delete Successfully');
        } catch (QueryException $exception) {
            return $this->invalidIntParameter();
        }


    }

}
