@extends('dashboard.layout.master')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid  card card-flush h-lg-100" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mt-10">
                            <form id="kt_modal_add_user_form" class="form" method="POST"
                                  action="{{route('settings.store')}}" enctype="multipart/form-data">
                                @include('dashboard.validation.alerts')

                                @csrf

                                <!--begin:::Tabs-->
                                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                                    <!--begin:::Tab item-->
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                           href="#kt_ecommerce_add_product_general">Public Info</a>
                                    </li>
                                    <!--end:::Tab item-->
                                    <!--begin:::Tab item-->
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                           href="#kt_ecommerce_add_product_reviews">Social Media Info</a>
                                    </li>
                                    <!--end:::Tab item-->
                                </ul>
                                <!--end:::Tabs-->
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                         role="tab-panel">
                                        <div class="card card-flush py-4">
                                            <!--begin::Card body-->

                                            <div class="card-body pt-0">
                                                <div>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Site Icon</label>
                                                    <!--end::Label-->
                                                </div>

                                                <div class="image-input image-input-empty image-input-outline mb-3" id="avatar" data-kt-image-input="true"
                                                     style="background-image: url({{getSettingByKey($settings,'site_icon')->value }})">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="site_icon" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="site_icon" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Tax-->
                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Site Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="site_name" class="form-control mb-2"
                                                               placeholder="Site Name" value="{{getSettingByKey($settings,'site_name')->value }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                </div>
                                                <!--end:Tax-->
                                                <!--begin::Tax-->
                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Site Description</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea  name="site_description" class="form-control mb-2"
                                                        >
                                                            {{getSettingByKey($settings,'site_description')->value}}
                                                        </textarea>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                </div>
                                                <!--end:Tax-->

                                                <!--begin::Tax-->
                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="form-label d-block">{{__('lang.Tags')}}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input id="kt_ecommerce_add_product_tags" name="site_tags" class="form-control mb-2" value="{{getSettingByKey($settings,'site_tags')->value}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end:Tax-->
                                            </div>
                                            <!--end:Tax-->
                                            <!--end::Card header-->
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->

                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_ecommerce_add_product_reviews" role="tab-panel">
                                        <div class="card card-flush py-4">
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Tax-->
                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="form-label">{{__('lang.facebook_link')}}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="facebook_link" class="form-control mb-2"
                                                               placeholder="{{__('lang.facebook_link')}}" value="{{isset($item)?$item->facebook_link:old('facebook_link')}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end:Tax-->

                                                <!--begin::Tax-->
                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="form-label">{{__('lang.instagram_link')}}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="instagram_link" class="form-control mb-2"
                                                               placeholder="{{__('lang.instagram_link')}}" value="{{isset($item)?$item->instagram_link:old('instagram_link')}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end:Tax-->
                                            </div>
                                            <!--end:Tax-->
                                            <!--end::Card header-->
                                        </div>

                                    </div>
                                    <!--end::Tab pane-->

                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                        3
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="submit" class="btn btn-primary" id="kt_modal_add_role"
                                            data-kt-users-modal-action="submit">
                                        <span class="indicator-label">{{__('lang.submit')}}</span>
                                    </button>
                                </div>
                                <!--end::Actions-->

                            </form>
                        </div>

                        <!--end::Main column-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        ["#kt_ecommerce_add_product_tags"].forEach((e => {
            const t = document.querySelector(e);
            t && new Tagify(t, {
                whitelist: ["new", "trending", "sale", "discounted", "selling fast", "last 10"],
                dropdown: {maxItems: 20, classname: "tagify__inline__suggestions", enabled: 0, closeOnSelect: !1}
            })
        }))
    </script>

@endsection

