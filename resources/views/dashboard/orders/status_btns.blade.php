@php
   use \App\Constants\Enum;
@endphp
@if($item->status == Enum::NEW)
    <form action="{{route('orders.changeStatus',$item->id)}}" method="post">
        @csrf
        <input type="hidden" name="status" value="{{Enum::PREPARATION}}">
        <button  type="submit" class="btn btn-warning">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::PREPARATION)}}
                </span>
        </button>
    </form>
    @elseif($item->status == Enum::PREPARATION)
    <form action="{{route('orders.changeStatus',$item->id)}}" method="post">
        @csrf
        <input type="hidden" name="status" value="{{Enum::SHIPPED}}">
        <button  type="submit" class="btn btn-secondary">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::SHIPPED)}}
                </span>
        </button>
    </form>
    @elseif($item->status == Enum::SHIPPED)
    <form action="{{route('orders.changeStatus',$item->id)}}" method="post">
        @csrf
        <input type="hidden" name="status" value="{{Enum::CLEARANCE}}">
        <button  type="submit" class="btn btn-dark">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::CLEARANCE)}}
                </span>
        </button>
    </form>
    @elseif($item->status == Enum::CLEARANCE)
    <form action="{{route('orders.changeStatus',$item->id)}}" method="post">
        @csrf
        <input type="hidden" name="status" value="{{Enum::DELIVERING}}">
        <button  type="submit" class="btn btn-info">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::DELIVERING)}}
                </span>
        </button>
    </form>
    @elseif($item->status == Enum::DELIVERING)
    <form action="{{route('orders.changeStatus',$item->id)}}" method="post">
        @csrf
        <input type="hidden" name="status" value="{{Enum::DELIVERED}}">
        <button  type="submit" class="btn btn-success">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::DELIVERED)}}
                </span>
        </button>
    </form>
@endif
