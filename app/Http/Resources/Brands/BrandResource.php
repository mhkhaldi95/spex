<?php

namespace App\Http\Resources\Brands;

use App\Constants\Enum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
        $data['id'] =  view('dashboard.brands.partial.datatable_cols._id',['item' => $this])->render();
        $data['name'] =  view('dashboard.brands.partial.datatable_cols._name',['item' => $this])->render();
        $data['actions'] =  view('dashboard.brands.partial.datatable_cols._action',['item' => $this])->render();
        $data['status'] =  view('dashboard.brands.partial.datatable_cols._status',['item' => $this])->render();
        return  $data;

    }
    public static function reports(){
        return [


        ];
    }
}
