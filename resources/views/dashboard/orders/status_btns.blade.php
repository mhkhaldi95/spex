@php
    use \App\Constants\Enum;
@endphp

<form action="{{route('orders.changeStatus',$item->id)}}" method="post" id="form">
    @csrf
    @if($item->status == Enum::NEW)
        <input type="hidden" name="status" value="{{Enum::PREPARATION}}">
        <button type="submit" class="btn btn-warning">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::PREPARATION)}}
                </span>
        </button>
    @elseif($item->status == Enum::PREPARATION)
        @csrf
        <input type="hidden" name="status" value="{{Enum::SHIPPED}}">
        <a href="javascript:void(0)" class="btn btn-danger return-back" data-status="{{Enum::NEW}}">
                <span class="indicator-label">
                 {{ucwords(Enum::NEW)}} <- Back
                </span>
        </a>
        <button type="submit" class="btn btn-secondary">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::SHIPPED)}}
                </span>
        </button>
    @elseif($item->status == Enum::SHIPPED)
        @csrf
        <input type="hidden" name="status" value="{{Enum::CLEARANCE}}">
        <a href="javascript:void(0)" class="btn btn-danger return-back" data-status="{{Enum::PREPARATION}}">
                <span class="indicator-label">
                 {{ucwords(Enum::PREPARATION)}} <- Back
                </span>
        </a>
        <button type="submit" class="btn btn-dark">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::CLEARANCE)}}
                </span>
        </button>
    @elseif($item->status == Enum::CLEARANCE)
        @csrf
        <input type="hidden" name="status" value="{{Enum::DELIVERING}}">
        <a href="javascript:void(0)" class="btn btn-danger return-back" data-status="{{Enum::SHIPPED}}">
                <span class="indicator-label">
                 {{ucwords(Enum::SHIPPED)}} <- Back
                </span>
        </a>
        <button type="submit" class="btn btn-info">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::DELIVERING)}}
                </span>
        </button>
    @elseif($item->status == Enum::DELIVERING)
        @csrf
        <input type="hidden" name="status" value="{{Enum::DELIVERED}}">

        <a href="javascript:void(0)" class="btn btn-danger return-back" data-status="{{Enum::CLEARANCE}}">
                <span class="indicator-label">
                 {{ucwords(Enum::CLEARANCE)}} <- Back
                </span>
        </a>
        <button type="submit" class="btn btn-success">
                <span class="indicator-label">
                  Convert-> {{ucwords(Enum::DELIVERED)}}
                </span>
        </button>
    @endif
</form>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.return-back').click(function () {
                var status = $(this).data('status');
                $(this).closest('form').find('input[name="status"]').val(status);
                $('#form').submit()
            })
        })
    </script>
@endsection
