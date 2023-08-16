@extends('dashboard.layout.master')
@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->


            <div class="card">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 form p-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item ">
                        <a class="nav-link text-active-primary pb-4 active"
                           data-bs-toggle="tab"
                           href="#kt_ecommerce_add_product_general">Collection Info </a>
                    </li>
                    <!--end:::Tab item-->

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active"
                         id="kt_ecommerce_add_product_general"
                         role="tab-panel">
                        <!--end:::Tabs-->
                        @include('dashboard.validation.alerts')
                        <!--begin::Form-->
                        <form id="kt_docs_formvalidation_text" class="form p-4" method="post"
                              action="{{isset($item)?route('collections.store',['id'=>$item->id]):route('collections.store')}}"
                              autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col-6 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">Brands</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid   fw-bolder "
                                            data-kt-select2="true" data-placeholder="Brands" name="brand_id"
                                            data-allow-clear="true" id="brand_filter">
                                        <option></option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{isset($item)?($item->brand_id == $brand->id?'selected':''):''}}>{{$brand->name}}</option>
                                        @endforeach


                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-6 mb-10">
                                    <!--begin::Label-->
                                    <label class=" fw-semibold  mb-2">Name</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="Name" value="{{isset($item)?$item->name:old('name')}}"/>
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
