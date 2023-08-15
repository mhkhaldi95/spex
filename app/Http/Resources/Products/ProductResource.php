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
        return [
            'id' => view('dashboard.products.partial.datatable_cols._id',[
                'item' => $this
            ])->render(),
            'name' => view('dashboard.products.partial.datatable_cols._name',[
                'item' => $this
            ])->render(),
            'descriptiion' => $this->descriptiion,
            'price' =>  view('dashboard.products.partial.datatable_cols._price',[
                'item' => $this
            ])->render(),
            'avatar' => $this->avatar,
            'category' => @$this->category->name,
            'actions' => view('dashboard.products.partial.datatable_cols._action',[
                'item' => $this
            ])->render(),
            'status' => view('dashboard.products.partial.datatable_cols._status',[
                'item' => $this
            ])->render(),
            'price_after_discount' => $this->price_after_discount == $this->price? $this->price:$this->price_after_discount,

        ];
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
