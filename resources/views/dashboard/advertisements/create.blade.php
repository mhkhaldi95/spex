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
                           href="#kt_ecommerce_add_product_general">Advertisement Info </a>
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
                              action="{{isset($item)?route('advertisements.store',['id'=>$item->id]):route('advertisements.store')}}"
                              autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
{{--                                <div class="col-12">--}}
{{--                                    <!--begin::Image input-->--}}

{{--                                    <div class="image-input image-input-empty image-input-outline mb-3" id="avatar" data-kt-image-input="true"--}}
{{--                                         style="background-image: url({{isset($item)?$item['image']:asset('assets/media/default.png')}})">--}}
{{--                                        <!--begin::Preview existing avatar-->--}}
{{--                                        <div class="image-input-wrapper w-150px h-150px"></div>--}}
{{--                                        <!--end::Preview existing avatar-->--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">--}}
{{--                                            <i class="bi bi-pencil-fill fs-7"></i>--}}
{{--                                            <!--begin::Inputs-->--}}
{{--                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />--}}
{{--                                            <input type="hidden" name="avatar_remove" />--}}
{{--                                            <!--end::Inputs-->--}}
{{--                                        </label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Cancel-->--}}
{{--                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">--}}
{{--														<i class="bi bi-x fs-2"></i>--}}
{{--													</span>--}}
{{--                                        <!--end::Cancel-->--}}
{{--                                        <!--begin::Remove-->--}}
{{--                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Image">--}}
{{--														<i class="bi bi-x fs-2"></i>--}}
{{--													</span>--}}
{{--                                        <!--end::Remove-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Image input-->--}}
{{--                                </div>--}}

                                <!--begin::Input group-->
                                <div class="col-12 mb-10">
                                    <label class="form-label">Content</label>
                                    <!--end::Label-->

                                    <!--begin::Editor-->
                                    <textarea class="form-control" name="description"  id="kt_ecommerce_add_product_description" rows="3">
                                                    {{isset($item)?$item['description']:old('description')}}
                                                </textarea>
                                    <!--end::Editor-->

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

{{--    <script src="{{asset('')}}assets/js/custom/save-product.js"></script>--}}


@endsection
