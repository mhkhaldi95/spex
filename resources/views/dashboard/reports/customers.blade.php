@extends('dashboard.layout.master')
@section('content')

    @php
        $data_from = null;
        $data_to = null;
        $is_exist_request_datefilter  = request('datefilter') && !empty(request('datefilter')) && !is_null(request('datefilter'));
        $is_exist_request_user_id  = request('user_id') && !empty(request('user_id')) && !is_null(request('user_id'));
        if($is_exist_request_datefilter){
            $data_from = explodeDate()[0];
            $data_to = explodeDate()[1];
        }
    @endphp
    <input type="hidden" id="date_from" value="{{$data_from}}">
    <input type="hidden" id="date_to" value="{{$data_to}}">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl customer-reports">

            <div class="card mb-4 p-5">
                <div class="card-body">
                    <form action="{{route('reports.customers')}}">
                        <div class="row g-5 g-xl-8">
                            <div class="col-lg-3 mt-1">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold ">From ــ To</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" name="datefilter"
                                       placeholder="Date Select" value=""/>

                                <!--end::Input-->
                            </div>
                            <!--begin::Col-->
                            <div class="col-lg-3 mt-1">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold ">Customers</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid  w-250px fw-bolder "
                                        data-kt-select2="true" data-placeholder="Customers"
                                        data-allow-clear="true" name="user_id" id="customer_filter">
                                    <option></option>
                                    @foreach($customers as $customer)
                                        <option
                                            value="{{$customer->id}}" {{request('user_id') == $customer->id?'selected':''}}>{{$customer->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-3 mt-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Col-->

                        </div>
                    </form>


                </div>

            </div>
            <!--begin::Row-->
            <div class="card p-5">
                <div class="card-body">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-info hoverable card-xl-stretch">
                                <!--begin::Body-->
                                <div class="card-body widget ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            </span>
                                    <!--end::Svg Icon-->

                                    <div class="fw-bold text-white fs-2">Orders Count :
                                        {{count($orders)}}
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-primary hoverable card-xl-stretch">
                                <!--begin::Body-->
                                <div class="card-body widget">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            </span>
                                    <!--end::Svg Icon-->

                                    <div class="fw-bold text-white fs-2">
                                        Purchase Product Count
                                        : {{count($products_purchase)}}
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-success hoverable card-xl-stretch">
                                <!--begin::Body-->
                                <div class="card-body widget">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            </span>
                                    <!--end::Svg Icon-->

                                    <div class="fw-bold text-white fs-2">
                                        Total Price
                                        : {{$total_amount}}
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h1> Orders</h1>
                            <small class="text-danger">note: Select a customer to show orders table </small>
                            @if($is_exist_request_user_id)
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="orders_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            #
                                        </th>
                                        <th class="min-w-125px">Price</th>
                                        <th class="min-w-125px">Created At</th>
                                        <th class=" min-w-70px">{{__('lang.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    @php
                                        @endphp
                                    @foreach($orders as $order)

                                        <tr>

                                            <!--begin::Quantity-->
                                            <td>
                                                {{$order->id}}

                                            </td><!--begin::Quantity-->
                                            <td>
                                                <div class="badge badge-light-success">
                                                    {{$order->price}}
                                                </div>

                                            </td>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{\Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s')}}
                                                </div>
                                            </td>

                                            <td>

                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                                    {{__('lang.actions')}}
                                                    <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="javascript:void(0)" class="menu-link px-3 order_details" data-order="{{json_encode($order,true)}}" data-items="{{json_encode($order->items,true)}}">
                                                            Details
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->





                                                </div>

                                            </td>


                                        </tr>
                                    @endforeach

                                    <!--end::Grand total-->
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h1> Products</h1>
                            <small class="text-danger">note: Select a customer to show Products table </small>
                            @if($is_exist_request_user_id)
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="products_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            #
                                        </th>
                                        <th class="w-10px pe-2">
                                            Product Name
                                        </th>
                                        <th class="w-10px pe-2">
                                            Purchases Count
                                        </th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->

                                    @foreach($products_purchase as $purchase)

                                        <tr>

                                            <!--begin::Quantity-->
                                            <td>
                                                {{$purchase->product->id}}

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center text-end">
                                                    <a href="#" class="symbol symbol-50px">
                                                        <span class="symbol-label" style="background-image:url({{$purchase->product->avatar}});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$purchase->product->name}}</a>
                                                        <!--end::Title-->
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$purchase->purchase_count}}
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach

                                    <!--end::Grand total-->
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h1> Collections</h1>
                            <small class="text-danger">note: Select a customer to show collections table </small>
                            @if($is_exist_request_user_id)
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="collections_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            #
                                        </th>
                                        <th class="min-w-125px">Collection Name</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    @php
                                        @endphp
                                    @foreach($collections as $collection)

                                        <tr>


                                            <td>
                                                {{$collection->id}}

                                            </td>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$collection->name}}
                                                </div>
                                            </td>



                                        </tr>
                                    @endforeach

                                    <!--end::Grand total-->
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h1> Brands</h1>
                            <small class="text-danger">note: Select a customer to show brands table </small>
                            @if($is_exist_request_user_id)
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="brands_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            #
                                        </th>
                                        <th class="min-w-125px">Brand Name</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    @php
                                        @endphp
                                    @foreach($brands as $brand)

                                        <tr>


                                            <td>
                                                {{$brand->id}}

                                            </td>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$brand->name}}
                                                </div>
                                            </td>



                                        </tr>
                                    @endforeach

                                    <!--end::Grand total-->
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Row-->
        </div>
    </div>

    <div class="modal" id="modal">
        <div class="modal-dialog" style="max-width: 75%;">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="text-align: center">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <!--begin::Table head-->
                                <thead>
                                <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-175px">Product</th>
                                    <th class="min-w-175px">Color</th>
                                    <th class="min-w-70px ">Qty</th>
                                    <th class="min-w-100px ">Unit Price</th>
                                    <th class="min-w-100px ">Total</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600" id="order-body">

                                </tbody>
                                <!--end::Table head-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->

                </div>
                <div class="modal-footer" style="justify-content:center">
                    <button type="button" id="closeLogModal" class="btn btn-danger">Close</button>
                </div>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        $(function () {

            $('#orders_table').dataTable({
                'pagingType': 'full_numbers',
                'lengthMenu': [[5], [5]],
                order: [],
            })
            $('#products_table').dataTable({
                'pagingType': 'full_numbers',
                'lengthMenu': [[5], [5]],
                order: [],
            })
            $('#collections_table').dataTable({
                'pagingType': 'full_numbers',
                'lengthMenu': [[5], [5]],
                order: [],
            })
            $('#brands_table').dataTable({
                'pagingType': 'full_numbers',
                'lengthMenu': [[5], [5]],
                order: [],
            })
            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });




            // $('input[name="datefilter"]').data('daterangepicker').setStartDate('03/01/2014');
            // $('input[name="datefilter"]').daterangepicker({ startDate: '03/05/2005', endDate: '03/06/2005' });


        });
        $(document).ready(function () {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            if (date_to && date_from) {
                $('input[name="datefilter"]').daterangepicker({startDate: date_from, endDate: date_to});
            }
            $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        })

        // Class definition

        $(document).on('click', '.order_details', function (e) {
            var order = $(this).data('order');
            var items = $(this).data('items');
            var row = ``;
            items.forEach(function(currentValue, index, array) {
                row+=`

                <tr>
                    <!--begin::Product-->
                    <td>
                        <div class="d-flex align-items-center">
                            <!--begin::Thumbnail-->
                            <a href="#" class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                          style="background-image:url(${currentValue.image});"></span>
                            </a>
                            <!--end::Thumbnail-->
                            <!--begin::Title-->
                            <div class="ms-5">
                                <a href="#"
                                   class="fw-bolder text-gray-600 text-hover-primary">${currentValue.product.name}</a>
                            </div>
                            <!--end::Title-->
                        </div>
                    </td>
                    <!--end::Product-->

                    <!--begin::Quantity-->
                    <td>
                        <div class="badge badge-light-info">
                            ${currentValue.color}
                </div>

            </td>
            <td>
                <div class="badge badge-light-primary">
                        ${currentValue.qty}
                </div>
            </td>
            <td>
                <div class="badge badge-light-warning">
                      ${currentValue.price}
                </div>
            </td>
            <td>
                <div class="badge badge-light-success">
                  ${currentValue.price * currentValue.qty}
                </div>
            </td>

            <!--end::Quantity-->


        </tr>


`
            });
            row +=`<tr>
        <td colspan="4" class="fs-3 text-dark ">Total</td>
        <td class="text-dark fs-3 fw-boldest ">
            <div class="badge badge-light-danger">
               ${order.price}
            </div>
        </td>
    </tr>`;
            $('#order-body').html(row)
            $('#modal').modal('show');
        });
        $('#closeLogModal').click(function (e) {
            $('#modal').modal('hide');
        });
    </script>
@endsection
