<?php

namespace App\Http\Resources\UserManagement\Customers;

use App\Constants\Enum;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'id' => view('dashboard.user_management.customers.partial.datatable_cols._id',[
                'item' => $this
            ])->render(),
            'name' => view('dashboard.user_management.customers.partial.datatable_cols._name',[
                'item' => $this
            ])->render(),
            'status' => view('dashboard.user_management.customers.partial.datatable_cols._status',[
                'item' => $this
            ])->render(),
            'actions' => view('dashboard.user_management.customers.partial.datatable_cols._action',[
                'item' => $this
            ])->render(),
            'phone' => $this->phone,
        ];
    }

}
