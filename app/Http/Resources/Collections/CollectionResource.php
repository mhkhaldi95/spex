<?php

namespace App\Http\Resources\Collections;

use App\Constants\Enum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
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
        $data['id'] =  view('dashboard.collections.partial.datatable_cols._id',['item' => $this])->render();
        $data['name'] =  view('dashboard.collections.partial.datatable_cols._name',['item' => $this])->render();
        $data['brand'] =  view('dashboard.collections.partial.datatable_cols._brand',['item' => $this])->render();
        $data['actions'] =  view('dashboard.collections.partial.datatable_cols._action',['item' => $this])->render();
        $data['status'] =  view('dashboard.collections.partial.datatable_cols._status',['item' => $this])->render();
        return  $data;

    }
    public function toShow(){
        return [


        ];
    }
}
