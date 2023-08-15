<div class="badge badge-light-{{$item->status == \App\Constants\Enum::PUBLISHED ?'success':($item->status == \App\Constants\Enum::INACTIVE?'danger':'')}}">
    {{$item->status == \App\Constants\Enum::PUBLISHED ? __('lang.Published'):($item->status == \App\Constants\Enum::INACTIVE?__('lang.Inactive'):'--')}}
</div>
