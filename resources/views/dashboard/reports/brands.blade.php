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

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('reports.brands')}}">
                        <div class="row g-5 g-xl-8">
                            <div class="col-lg-6 mt-1">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold ">From ــ To</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" name="datefilter"
                                       placeholder="Date Select" value=""/>

                                <!--end::Input-->
                            </div>
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


            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="brands_table" >
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Brand Name</th>
                                        <th class="min-w-125px">Purchase Count</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Products-->
                                    @php
                                        @endphp
                                    @foreach($mostPurchasedBrands as $brand)

                                        <tr>
                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$brand->brand_name}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="badge badge-light-info">
                                                    {{$brand->purchase_count}}
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

        // Class definition

    </script>
@endsection
