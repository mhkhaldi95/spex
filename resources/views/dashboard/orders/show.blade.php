@extends('dashboard.layout.master')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <!--begin::Post-->
            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                <!--begin::Order details-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{__('Order Details')}} (#{{$item->id}})</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                <!--begin::Date-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="20" height="21" viewBox="0 0 20 21"
                                                                             fill="none">
																			<path opacity="0.3"
                                                                                  d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                                  fill="currentColor"/>
																			<path
                                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                                fill="currentColor"/>
																		</svg>
																	</span>
                                            <!--end::Svg Icon-->Date Added</div>
                                    </td>
                                    <td class="fw-bolder text-end">{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s')}}</td>
                                </tr>
                                <!--end::Date-->
                                <!--begin::Payment method-->

                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-03-24-172858/core/html/src/media/icons/duotune/general/gen043.svg-->
                                            <span class="svg-icon svg-icon-2 me-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
</svg>
</span>
                                            <!--end::Svg Icon-->
                                            <!--end::Svg Icon-->{{__('lang.Status')}}</div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <div class="badge badge-light-{{getClassByStatus($item->status)}}">
                                            {{ucwords($item->status)}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-03-24-172858/core/html/src/media/icons/duotune/general/gen043.svg-->
                                            <span class="svg-icon svg-icon-2 me-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
</svg>
</span>
                                            <!--end::Svg Icon-->
                                            <!--end::Svg Icon-->Active/Deleted</div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <div class="badge badge-light-{{$item->is_deleted?'danger':'success'}}">
                                            {{$item->is_deleted?'Deleted':'Active'}}
                                        </div>
                                    </td>
                                </tr>
                                <!--end::Payment method-->

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Order details-->
                <!--begin::Customer details-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{__('Customer Details')}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                <!--begin::Customer name-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none">
																			<path opacity="0.3"
                                                                                  d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                                                  fill="currentColor"/>
																			<path
                                                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                                                fill="currentColor"/>
																		</svg>
																	</span>
                                            <!--end::Svg Icon-->Customer</div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">

                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <a href="#"
                                               class="text-gray-600 text-hover-primary">{{@$item->customer->name}}</a>
                                            <!--end::Name-->
                                        </div>
                                    </td>
                                </tr>
                                <!--end::Customer name-->
                                <!--begin::Customer email-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none">
																			<path opacity="0.3"
                                                                                  d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                                  fill="currentColor"/>
																			<path
                                                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                                fill="currentColor"/>
																		</svg>
																	</span>
                                            <!--end::Svg Icon-->{{__('Email')}}</div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{@$item->user->email}}</a>
                                    </td>
                                </tr>
                                <!--end::Payment method-->
                                <!--begin::Date-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none">
																			<path
                                                                                d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                                                fill="currentColor"/>
																			<path opacity="0.3" d="M19 4H5V20H19V4Z"
                                                                                  fill="currentColor"/>
																		</svg>
																	</span>
                                            <!--end::Svg Icon-->{{__('Phone')}}</div>
                                    </td>
                                    <td class="fw-bolder text-end">{{@$item->user->phone}}</td>
                                </tr>
                                <!--end::Date-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Customer details-->


            </div>
            <!--end::Post-->
            <div class="d-flex flex-column gap-7 gap-lg-10 mt-10">
                <!--begin::Product List-->
                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{__('Order')}} #{{$item->id}}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-175px">Product</th>
                                    <th class="min-w-175px">Color</th>
                                    <th class="min-w-70px ">Qty</th>
                                    <th class="min-w-100px ">Unit Price</th>
                                    <th class="min-w-100px ">Total</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                <!--begin::Products-->
                                @php
                                    $sub_total = 0;
                                @endphp
                                @foreach($item->items as $ite)

                                    <tr>
                                        <!--begin::Product-->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Thumbnail-->
                                                <a href="#" class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                          style="background-image:url({{$ite->image}});"></span>
                                                </a>
                                                <!--end::Thumbnail-->
                                                <!--begin::Title-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                       class="fw-bolder text-gray-600 text-hover-primary">{{$ite->product->name}}</a>
                                                    {{--                                                <div class="fs-7 text-muted">Delivery Date: 30/03/2022</div>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </td>
                                        <!--end::Product-->

                                        <!--begin::Quantity-->
                                        <td>
                                            <div class="badge badge-light-info">
                                                {{$ite->color}}
                                            </div>

                                         </td>
                                        <td>
                                            <div class="badge badge-light-primary">
                                                {{$ite->qty}}
                                            </div>
                                         </td>
                                        <td>
                                            <div class="badge badge-light-warning">
                                                {{$ite->price}}
                                            </div>
                                         </td>
                                        <td>
                                            <div class="badge badge-light-success">
                                                {{$ite->qty * $ite->price}}
                                            </div>
                                         </td>

                                        <!--end::Quantity-->

                                        @php
                                            $sub_total += $ite->quantity * $ite->price;
                                        @endphp
                                    </tr>
                                @endforeach
                                <!--end::Products-->
                                <!--begin::Subtotal-->
{{--                                <tr>--}}
{{--                                    <td colspan="4" class="text-end">{{__('Subtotal')}}</td>--}}
{{--                                    <td class="text-end">{{$sub_total}}</td>--}}
{{--                                </tr>--}}
                                <!--end::Subtotal-->
                                <!--begin::VAT-->
                                {{--                                <tr>--}}
                                {{--                                    <td colspan="4" class="text-end">VAT (0%)</td>--}}
                                {{--                                    <td class="text-end">$0.00</td>--}}
                                {{--                                </tr>--}}


                                <!--begin::Grand total-->
                                <tr>
                                    <td colspan="4" class="fs-3 text-dark ">Total</td>
                                    <td class="text-dark fs-3 fw-boldest ">
                                        <div class="badge badge-light-danger">
                                            {{$item->price}}
                                        </div>
                                    </td>
                                </tr>
                                <!--end::Grand total-->
                                </tbody>
                                <!--end::Table head-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Product List-->
            </div>
        </div>
    </div>

@endsection
