<?php

namespace App\Http\Resources\Products;

use App\Constants\Enum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
        $data['id'] =  view('dashboard.products.partial.datatable_cols._id',['item' => $this])->render();
        $data['name'] =  view('dashboard.products.partial.datatable_cols._name',['item' => $this])->render();
        $data['avatar'] =   $this->avatar;
        $data['collection'] =  view('dashboard.products.partial.datatable_cols._collection',['item' => $this])->render();;
        $data['created_at'] = Carbon::parse($data['created_at'])->setTimezone('Asia/Gaza')->format('Y-m-d H:i:s');
        $data['actions'] =  view('dashboard.products.partial.datatable_cols._action',['item' => $this])->render();
        $data['status'] =  view('dashboard.products.partial.datatable_cols._status',['item' => $this])->render();
        $data['check_delete'] =  view('dashboard.products.partial.datatable_cols._check_delete',['item' => $this])->render();
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
