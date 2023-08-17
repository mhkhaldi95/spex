<?php

namespace App\Http\Controllers\Orders;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = Order::query()->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, OrderResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => '#' , 'title' =>'Orders','active' => false],
        ];
        return view('dashboard.orders.index', [
            'page_title' =>'Orders',
            'page_breadcrumbs' => $page_breadcrumbs,
            'customers' => User::query()->customers()->get(),
        ]);
    }
    public function show($id)
    {
            $page_title = 'Show';
            try {
                $item = Order::query()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>'Home','active' => true],
            ['page' => route('orders.index') , 'title' =>'Orders','active' => true],
            ['page' => '#' , 'title' =>'Show','active' => false],
        ];
        return view('dashboard.orders.show', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => $item ,
        ]);
    }
    public function changeStatus(Request $request,$id)
    {

        try {
            $item = Order::query()->findOrFail($id);
            $item->update([
                'status' => $request->status
            ]);
            return $this->returnBackWithSaveDone();
        } catch (QueryException $exception) {
            return $this->invalidIntParameter();
        }
    }

    public function delete($id){
        try {
            $item = Order::query()->filter()->findOrFail($id);
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
