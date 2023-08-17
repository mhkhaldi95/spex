<?php

namespace App\Http\Resources\Orders;

use App\Constants\Enum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['customer_name'] =  view('dashboard.orders.partial.datatable_cols._customer_name',['item' => $this])->render();
        $data['price'] =  view('dashboard.orders.partial.datatable_cols._price',['item' => $this])->render();
        $data['created_at'] = Carbon::parse($data['created_at'])->format('Y-m-d H:i:s');
        $data['actions'] =  view('dashboard.orders.partial.datatable_cols._action',['item' => $this])->render();
        $data['status'] =  view('dashboard.orders.partial.datatable_cols._status',['item' => $this])->render();
        $data['check_delete'] =  view('dashboard.orders.partial.datatable_cols._check_delete',['item' => $this])->render();
        return  $data;

    }
    public function toShow(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'collection_id' => $this->collection_id,
            'master_image' => $this->avatar,
            'images' => @$this->images()->select('id','name')->get(),
            'tags' => $this->tags?(json_encode(convertTagsStringToObject($this->tags))):'',
            'status' => $this->status,
            'variations' => $this->variations,

        ];
    }
}
