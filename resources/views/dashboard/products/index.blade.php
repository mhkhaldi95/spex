@extends('dashboard.layout.master')
@section('content')
    @php
        use \App\Constants\Enum;
    @endphp
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
                            <!--end::Svg Icon-->
                            <input type="text" id="search"  class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <div class="w-100 mw-150px">

                        </div>
                        <!--begin::Add product-->
                        <a href="{{route('products.index')}}" class="btn btn-primary">Add Product</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-0 mb-0"></div>
                <!--end::Separator-->
                <!--begin::Advance form-->
                <div class="collapse show" id="kt_advanced_search_form">


                    <!--begin::Row-->
                    <div class="row g-8" style="margin-left: 10px">
                        <!--begin::Row-->
                        <div class="row g-8 academic-dev">

                            <!--begin::Col-->
                            <div class="col-lg-3 ">

                                <!--begin::Input-->
                                <select class="form-select form-select-solid  w-250px fw-bolder "
                                        data-kt-select2="true" data-placeholder="Status"
                                        data-allow-clear="true" id="status_filter">
                                    <option></option>
                                    <option value="{{\App\Constants\Enum::PUBLISHED}}" >{{__('lang.Published')}}</option>
                                    <option value="{{\App\Constants\Enum::INACTIVE}}" >{{__('lang.Inactive')}}</option>


                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-3 ">

                                <!--begin::Input-->
                                <select class="form-select form-select-solid  w-250px fw-bolder "
                                        data-kt-select2="true" data-placeholder="Collections"
                                        data-allow-clear="true" id="collection_filter">
                                    <option></option>
                                    @foreach($collections as $collection)
                                     <option value="{{$collection->id}}" >{{$collection->name}}</option>
                                    @endforeach

                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->




                            <!--begin::Col-->



                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Advance form-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-3 mb-0"></div>
                <!--end::Separator-->
                <!--begin::Card body-->
                <div class="card-body pt-0 trip-index">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
{{--                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
{{--                                    <input class="form-check-input" id="all_checked" type="checkbox"--}}
{{--                                           data-kt-check="true"--}}
{{--                                           data-kt-check-target="#kt_customers_table .form-check-input" value="1"/>--}}
{{--                                </div>--}}
                                #
                            </th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Collection</th>
                            <th class="min-w-125px">Created At</th>
                            <th class="min-w-125px"> Status(Published)</th>
                            <th class="min-w-125px"> Status(Deleting)</th>
                            <th class="text-end min-w-70px">{{__('lang.actions')}}</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">


                        </tbody>
                        <!--end::Table body-->

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
@section('scripts')

    <script>
        var dt;
        $(document).ready(function () {

            "use strict";
            // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            // $('#date_from').attr('disabled',true)



            // Class definition
            var KTDatatablesServerSide = function () {
                // Shared variables
                var table;

                var filterPayment;

                // Private functions
                var initDatatable = function () {
                    dt = $("#datatable").DataTable({
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        'pagingType': 'full_numbers',
                        'lengthMenu': [[10, 20, 50, 100], [10, 20, 50, 100]],
                        order: [],
                        stateSave: false,
                        select: {
                            style: 'multi',
                            selector: 'td:first-child input[type="checkbox"]',
                            className: 'row-selected'
                        },
                        ajax: {
                            url: "{{route('products.index')}}",
                            error: function(xhr, error, thrown) {
                                var status = xhr.status; // Get the status code
                                if(status == 401 || status == 419){
                                    KTApp.hidePageLoading();
                                    window.location.reload()
                                }

                            },

                        },
                        preDrawCallback: function(settings) {
                            KTApp.showPageLoading();
                        },


                        drawCallback: function(settings) {
                            KTApp.hidePageLoading();
                            $('#all_checked').prop('checked', false);

                        },
                        columns: [
                            {data: 'id'},
                            {data: 'name'},
                            {data: 'collection'},
                            {data: 'created_at'},
                            {data: 'status'},
                            {data: 'check_delete'},
                            {data: 'actions'},
                        ],
                        columnDefs: [

                            {
                                targets: 0,
                                orderable: false,
                                lassName: 'text-start',
                            },
                            {
                                targets: 1,
                                orderable: false,

                            },
                            {
                                targets: 2,
                                orderable: false,
                            },

                            {
                                targets: 3,
                                orderable: false,

                            },
                            {
                                targets: 4,
                                orderable: false,

                            },
                            {
                                targets: 5,
                                orderable: false,

                            },
                            {
                                targets: -1,
                                orderable: false,
                                className: 'text-end',
                            },
                        ],

                    });

                    table = dt.$;

                    dt.on('draw', function (response) {
                        handleDeleteRows();
                        initToggleToolbar();
                        KTMenu.createInstances();
                        toggleToolbars();
                    });


                }

                var handleSearchDatatable = function () {

                    var searchParams = {};

                    // Function to add search parameter to the searchParams object
                    function addSearchParam(filterId, column) {
                        $(filterId).change(function () {
                            searchParams[column] = $(this).val().toLowerCase().toLowerCase();
                            dt.search(JSON.stringify(searchParams)).draw();
                        });
                    }



                    addSearchParam('#status_filter', 'status');
                    addSearchParam('#collection_filter', 'collection_id');
                    addSearchParam('#search', 'search');



                }

                // Init toggle toolbar
                var initToggleToolbar = function () {
                    // Toggle selected action toolbar
                    // Select all checkboxes
                    const container = document.querySelector('#datatable');
                    const checkboxes = container.querySelectorAll('[type="checkbox"]');
                    // Select elements

                    // Toggle delete selected toolbar
                    checkboxes.forEach(c => {
                        // Checkbox on click event
                        c.addEventListener('click', function () {
                            setTimeout(function () {
                                toggleToolbars();
                            }, 50);
                        });
                    });

                    // Deleted selected rows



                }
                // Delete customer
                var handleDeleteRows = () => {
                    // Select all delete buttons
                    const deleteButtons = document.querySelectorAll('.delete_row');

                    deleteButtons.forEach(d => {
                        // Delete button on click
                        d.addEventListener('click', function (e) {
                            e.preventDefault();

                            // Select parent row
                            const parent = e.target.closest('tr');
                            var record_id = $(this).data('id');
                            // Get customer name
                            const customerName = parent.querySelectorAll('td')[1].innerText;

                            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Are you sure you want to delete" + customerName + "?",
                                icon: "warning",
                                showCancelButton: true,
                                buttonsStyling: false,
                                confirmButtonText: "Yes!",
                                cancelButtonText: "No",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-danger",
                                    cancelButton: "btn fw-bold btn-active-light-primary"
                                }
                            }).then(function (result) {
                                if (result.value) {
                                    // Simulate delete request -- for demo purpose only
                                    Swal.fire({
                                        text: "Deleting " + customerName,
                                        icon: "info",
                                        buttonsStyling: false,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function () {
                                        Swal.fire({
                                            text: "Deleted " + customerName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            // delete row data from server and re-draw datatable
                                            var url = '{{route("products.delete",[":id"])}}';
                                            url = url.replace(':id', record_id);

                                            axios.post(url).then(function (response) {
                                                dt.draw();
                                            }).catch(function (error) {
                                                if (error.response && error.response.status === 401 && error.response.data.message === 'Unauthenticated.') {
                                                    window.location.reload();
                                                } else if (error.response && error.response.status === 419) {
                                                    window.location.reload();
                                                }
                                            });

                                        });
                                    });
                                } else if (result.dismiss === 'cancel') {
                                    Swal.fire({
                                        text: customerName + " Not Delete.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    });
                                }
                            });
                        })
                    });
                }

                // Toggle toolbars
                var toggleToolbars = function () {
                    // Define variables
                    const container = document.querySelector('#datatable');
                    const selectedCount = document.querySelector('[data-kt-customer-table-select="selected_count"]');


                    // const toolbarClosedSelected = document.querySelector('[data-kt-customer-table-toolbar="closed_selected"]');

                    // Select refreshed checkbox DOM elements
                    const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

                    // Detect checkboxes state & count
                    let checkedState = false;
                    let count = 0;

                    // Count checked boxes
                    allCheckboxes.forEach(c => {
                        if (c.checked) {
                            checkedState = true;
                            count++;
                        }
                    });

                    // Toggle toolbars
                    if (checkedState) {
                        selectedCount.innerHTML = count;

                    } else {
                    }
                }
                // Public methods

                return {
                    init: function () {
                        initDatatable();
                        initToggleToolbar();
                        handleSearchDatatable();
                        handleDeleteRows();
                        // toggleToolbars();
                    }
                }
            }();


            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                KTDatatablesServerSide.init();
            });

            // Class definition


            $('#all_checked').change(function () {
                const headerAllCheck = document.querySelector('#datatable').querySelectorAll('[type="checkbox"]');
                if (this.checked) {

                    headerAllCheck.forEach((element) => {
                        element.checked = true
                    });
                } else {
                    headerAllCheck.forEach((element) => {
                        element.checked = false
                    });
                }
                $('#all_checked').val(this.checked);
            });





        });

    </script>





@endsection
