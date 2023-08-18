<?php

namespace App\Http\Resources\Advertisements;

use App\Constants\Enum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
        $data['actions'] =  view('dashboard.advertisements.partial.datatable_cols._action',['item' => $this])->render();
        $data['status'] =  view('dashboard.advertisements.partial.datatable_cols._check_delete',['item' => $this])->render();

        return  $data;

    }
    public function toShow(){
        return [


        ];
    }
}
