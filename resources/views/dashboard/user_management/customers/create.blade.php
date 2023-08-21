@extends('dashboard.layout.master')
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->


            <div class="card p-5">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 form p-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item ">
                        <a class="nav-link text-active-primary pb-4 active"
                           data-bs-toggle="tab"
                           href="#kt_ecommerce_add_product_general">Customer Info </a>
                    </li>
                    <!--end:::Tab item-->
                    @if(isset($item))
                        <li class="nav-item"><a class="nav-link text-active-primary pb-4 "
                            >|</a></li>
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4"
                               data-bs-toggle="tab"
                               href="#kt_ecommerce_add_product_reviews">Orders</a>
                        </li>
                        <!--end:::Tab item-->
                    @endif
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active"
                         id="kt_ecommerce_add_product_general"
                         role="tab-panel">
                        <!--end:::Tabs-->
                        @include('dashboard.validation.alerts')
                        <!--begin::Form-->
                        <form id="kt_docs_formvalidation_text" class="form p-4" method="post"
                              action="{{isset($item)?route('customers.store',['id'=>$item->id]):route('customers.store')}}"
                              autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col-4 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">Name</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="Name" value="{{isset($item)?$item->name:old('name')}}"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="col-4 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">{{__('phone')}}</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" name="phone" class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__('phone')}}"
                                           value="{{isset($item)?$item->phone:old('phone')}}"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-4 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">Email</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" name="email"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="Email"
                                           value="{{isset($item)?$item->email:old('email')}}"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->


                            </div>
                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col-6 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">{{__('password')}}</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="password" name="password"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__('password')}}" value=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold  mb-2">Password Confirmation</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__('password_confirmation')}}" value=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>


                            <!--begin::Actions-->
                            <button id="kt_docs_formvalidation_text_submit1" type="submit"
                                    onclick="disableButtonAndSubmitForm('kt_docs_formvalidation_text_submit1','kt_docs_formvalidation_text')"
                                    class="btn btn-primary">
                        <span class="indicator-label">
                           {{__('submit')}}
                        </span>
                                <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                            </button>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <div class="tab-pane fade show form p-4 "
                         id="kt_ecommerce_add_product_reviews"
                         role="tab-panel">
                    </div>
                </div>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')




@endsection
