@extends('dashboard.layout.master')
@section('content')

    @php
        $data_from = null;
        $data_to = null;
        $is_exist_request_datefilter  = request('datefilter') && !empty(request('datefilter')) && !is_null(request('datefilter'));
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
                    <form action="{{route('reports.products')}}">
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
                            <!--begin::Col-->
                            <div class="col-lg-3 mt-1">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold ">Brands</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid  w-250px fw-bolder "
                                        data-kt-select2="true" data-placeholder="Brands"
                                        data-allow-clear="true" name="brand_id" id="brand_filter">
                                    <option></option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{$brand->id}}" {{request('brand_id') == $brand->id?'selected':''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-3 mt-1">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold ">Collections</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid  w-250px fw-bolder "
                                        data-kt-select2="true" data-placeholder="Collections"
                                        data-allow-clear="true" name="collection_id" id="collection_filter">
                                    <option></option>
                                    @foreach($collections as $collection)
                                        <option
                                            value="{{$collection->id}}" {{request('collection_id') == $collection->id?'selected':''}}>{{$collection->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <div class="col-lg-3 mt-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Col-->

                        </div>
                    </form>


                </div>

            </div>
            <!--begin::Row-->


            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="brands_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Product Name</th>
                                        <th class="min-w-125px">Purchase Count</th>
                                        <th class=" min-w-70px">{{__('lang.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    @php
                                        @endphp
                                    @foreach($mostPurchasedProducts as $product)

                                        <tr>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$product->product_name}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$product->purchase_count}}
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
                                                        <a href="javascript:void(0)" class="menu-link px-3 details_purchase"  data-id="{{$product->product_id}}">
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
                                    <th class="min-w-175px">Purchase Count</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600" id="body-table">


                                </tbody>
                                <!--end::Table head-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->

                </div>
                <div class="modal-footer" style="justify-content:center">
                    <button type="button" id="closeModal" class="btn btn-danger">Close</button>
                </div>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        $(function () {

            $('#brands_table').dataTable({
                'pagingType': 'full_numbers',
                'lengthMenu': [[10], [10]],
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


        $(document).on('click', '.details_purchase', function (e) {
            var product_id = $(this).data('id');

            KTApp.showPageLoading();
            axios.post('{{route('reports.products.purchase_details')}}', {
                'product_id': product_id,
            }).then(function (response) {

                var row = ``;
                response.data.items.forEach(function(currentValue, index, array) {
                    row+=`  <tr>

                                    <td>
                                        <div class="badge badge-light-info">
                                            ${currentValue.product_name}
                                        </div>

                                    </td>
                                    <td>
                                        <div class="badge badge-light-primary">
                                            ${currentValue.color}
                                        </div>

                                    </td>
                                    <td>
                                        <div class="badge badge-light-success">
                                             ${currentValue.purchase_count}
                                        </div>
                                    </td>

                                </tr>
                `
                });
                $('#body-table').html(row)
                $('#modal').modal('show');
                KTApp.hidePageLoading();
            });
            $('#closeModal').click(function (e) {
                $('#modal').modal('hide');
            });

            }).catch(function (error) {

                if (error.response && error.response.status === 401 && error.response.data.message === 'Unauthenticated.') {
                    window.location.reload();
                } else if (error.response && error.response.status === 419) {
                    window.location.reload();
                } else {
                    KTApp.hidePageLoading();
                }
            });






        // Class definition

    </script>
@endsection
