@extends('dashboard.layout.master')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form">

            </form>

            <form action="{{route('products.store',isset($item)?$item['id']:null)}}" method="post" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                @if(isset($item))
                <input type="hidden" name="id" value="{{$item['id']}}">
                @endif
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('lang.Thumbnail')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">

                            <!--begin::Image input-->

                            <div class="image-input image-input-empty image-input-outline mb-3" id="avatar" data-kt-image-input="true"
                                 style="background-image: url({{isset($item)?$item['master_image']:asset('assets/media/default.png')}})">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="master_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
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

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('lang.Status')}}</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->

                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->


                            <select class="form-select form-select-solid  w-250px fw-bolder "
                                    data-kt-select2="true" data-placeholder="Status" name="statusindex.blade.php"
                                    data-allow-clear="true" id="status_filter">
                                <option></option>
                                <option value="{{\App\Constants\Enum::PUBLISHED}}" {{isset($item)?$item['status'] == \App\Constants\Enum::PUBLISHED?'selected':'':''}}>{{__('lang.Published')}}</option>
                                <option value="{{\App\Constants\Enum::INACTIVE}}" {{isset($item)?$item['status'] == \App\Constants\Enum::INACTIVE?'selected':'':''}}>{{__('lang.Inactive')}}</option>

                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('lang.Product Details')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label">Collections</label>
                            <!--end::Label-->
                            <!--begin::Select2-->

                            <select class="form-select mb-2" data-control="select2" name="collection_id" data-placeholder="{{__('lang.Select an option')}}" data-allow-clear="true" >
                                {{--                                multiple="multiple"--}}
                                <option></option>
                                @foreach($collections as $collection)
                                    <option value="{{$collection->id}}" {{isset($item)?($item['collection_id'] == $collection->id ? 'selected' : ''):''}}>{{$collection->name}}</option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            {{--                            <div class="text-muted fs-7 mb-7">{{__('lang.Add product to a category.')}}</div>--}}
                            <!--end::Description-->
                            <!--end::Input group-->
                            <!--begin::Button-->
                            <a href="{{route('collections.create')}}" class="btn btn-light-primary btn-sm mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
														<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
													</svg>
												</span>
                                <!--end::Svg Icon-->Create new collection</a>
                            <!--end::Button-->
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label d-block">{{__('lang.Tags')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="kt_ecommerce_add_product_tags" name="tags" class="form-control mb-2" value="{{isset($item)?($item['tags']):old('tags')}}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            {{--                            <div class="text-muted fs-7">Add tags to a product.</div>--}}
                            <!--end::Description-->
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    @include('dashboard.validation.alerts')

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" class="form-control mb-2"
                                                       placeholder="Name" value="{{isset($item)?$item['name']:old('name')}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end:Tax-->
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea class="form-control" name="description"  id="kt_ecommerce_add_product_description" rows="3">
                                                    {{isset($item)?$item['description']:old('description')}}
                                                </textarea>
                                                <!--end::Editor-->
                                                <input type="hidden" id="description_hidden" value=" {{isset($item)?$item['description']:''}}">
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end:Tax-->
                                    <!--end::Card header-->
                                </div>

                            </div>
                        </div>

                        <!--end::Tab pane-->
                    </div>

                    <!--begin::Variations-->
                    <div class="card card-flush py-4 mt-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Variations</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="" data-kt-ecommerce-catalog-add-product="auto-options">

                                <!--begin::Repeater-->
                                <div id="product_options">
                                    <!--begin::Form group-->
                                    <div class="form-group">

                                        <div data-repeater-list="product_options" class="d-flex flex-column gap-3">


                                            @if(isset($item) && isset($item['variations']))
                                                @foreach($item['variations'] as $variations)
                                            <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                <!--begin::Input-->
                                                  <input type="text" class="form-control mw-100 w-200px h-50 variation_color" name="color" value="{{$variations['color']}}" placeholder="Add a Color" />
                                                <!--end::Input-->
                                                <button type="button"  class="btn btn-sm btn-icon btn-light-danger delete-variations">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                    <span class="svg-icon svg-icon-2">
																						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																							<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
																							<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
																						</svg>
																					</span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                                @endforeach
                                                @else
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mw-100 w-200px h-50 variation_color" name="color" placeholder="Add a Color" />
                                                    <!--end::Input-->
                                                    <button type="button"  class="btn btn-sm btn-icon btn-light-danger delete-variations">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                        <span class="svg-icon svg-icon-2">
																						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																							<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
																							<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
																						</svg>
																					</span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																				<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
																			</svg>
																		</span>
                                            <!--end::Svg Icon-->Add</button>
                                    </div>
                                    <!--end::Form group-->
                                    <div class="separator separator-dashed mt-6 mb-6"></div>

                                    <div id="variation_result">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 min-w-70px">Color Name</th>
                                                    <th class="p-0 min-w-70px">Color Code</th>
                                                    <th class="p-0 min-w-70px">price</th>
                                                    <th class="p-0 min-w-70px">stoke</th>
                                                    <th class="p-0 min-w-70px">image</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                @if(isset($item) && isset($item['variations']))
                                                    @foreach($item['variations'] as $index=>$variations)<tr class="tr_variation_color" id="tr_{{$index}}">
                                                        <td>{{$variations['color']}} <input type="hidden" name="colors[]" value="{{$variations['color']}}"></td>
                                                        <td><input type="color"></td>
                                                        <td>  <input type="number" value="{{$variations['price']}}" class="form-control mw-100 w-200px h-50 " id="price_{{$index}}" name="prices[]" placeholder="price" /></td>
                                                        <td class="text-end"><input type="number" value="{{$variations['stoke']}}" class="form-control mw-100 w-200px h-50 " id="stoke_{{$index}}" name="stokes[]" placeholder="stoke" /></td>
                                                        <td class="text-end">
                                                            <input type="file" name="product_color_image[]"    accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="product_color_image_hidden[]" id="product_color_image_hidden_{{$index}}" value="{{$variations['image']}}" />

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Repeater-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Variations-->

                    <!--begin::Media-->
                    <div class="card card-flush py-4 mt-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Images</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            @if(isset($item) && isset($item['images']))
                                <div class="fv-row mb-2">
                                    <div class="d-flex d-flex-custom mt-2">
                                        @foreach($item['images'] as $image)
                                            <div class="parent_div_photo" id="photo_{{$image['id']}}">
                                                <div class="image-input image-input-empty image-input-outline product-image" id="avatar"
                                                >
                                                    <div class="image-input-wrapper bg-img" style="background-image: url({{ $image['image'] }})"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow remove_photo"
                                                        data-photo_id="{{$image['id']}}"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change image">
                                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-07-21-074234/core/html/src/media/icons/duotune/arrows/arr015.svg-->
                                                        <span class="svg-icon svg-icon-2hx svg-icon-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 8.99999 16.4 9.19999 16.2L12 13.4L10.6 12Z" fill="currentColor"/>
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.2 7.79999C8.8 7.39999 8.2 7.39999 7.8 7.79999C7.4 8.19999 7.4 8.80001 7.8 9.20001L10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9 16.4 9.2 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z" fill="currentColor"/>
                                                        </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </label>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="fv-row mb-2">
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                    </div>
                                </div>
                                <!--end::Dropzone-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Description-->
                            {{--                                        <div class="text-muted fs-7">Set the product media gallery.</div>--}}
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('lang.submit')}}</span>
                            <span class="indicator-progress">{{__('lang.Please wait')}}...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')
    <script src="{{asset('')}}assets/js/custom/formrepeater.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('')}}assets/js/custom/save-product.js"></script>
    {{--    <script src="{{asset('')}}assets/js/widgets.bundle.js"></script>--}}
    <script src="{{asset('')}}assets/js/custom/widgets.js"></script>
    {{--    <script src="{{asset('')}}assets/js/custom/apps/chat/chat.js"></script>--}}
    {{--    <script src="{{asset('')}}assets/js/custom/utilities/modals/users-search.js"></script>--}}
    <script>
        $(document).ready(function() {
            //set initial state.

            $('body').on('click', '.remove_photo', function (e) {
                var photo_id = $(this).data('photo_id');
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{route('products.remove.image')}}",
                    data: {
                        'photo_id': photo_id,
                        'product_id': "{{isset($item['id'])?$item['id']:null}}",
                    },
                    headers: {
                        'X-CSRF-TOKEN':
                            "{{ csrf_token() }}"
                    },

                    success: function (data) {
                        if (data.status == true) {
                            $('#photo_' + photo_id).remove();

                        }

                    }

                });

            });





            function fillTextArea() {
                $('#kt_ecommerce_add_product_description').html($('#description_hidden').val())
                $('#discounted_percentage').val( $('#kt_ecommerce_add_product_discount_label').html())
            }
            fillTextArea()


        });
    </script>
    <script>
        // new KTImageInput("avatar");
        Dropzone.autoDiscover = false;
        var uploadedDocumentMap = {}
        $("#kt_dropzone_2").dropzone({
            url: "{{route('products.upload.image')}}",
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            success:
                function (file, response) {
                    var imgName = response;
                    $('form').append('<input type="hidden" name="products_images[]" value="' + imgName + '">')
                    uploadedDocumentMap[file.name] = imgName
                }
            ,
            error: function (file, response) {
                console.log("aaa");
            },
            removedfile: function(file)
            {

            },
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            },
            init: function () {
                @if(isset($event) && $event->photos)
                var files;
                {!! json_encode($event->photos) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    console.log(file)
                    $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
                }
                @endif
            }
        });





    </script>
    <script>
        $(document).ready(function() {
            // Add variant details to the table



            $(document).on('click', '.delete-variations', function (e) {


                const index = $('.delete-variations').index(this);
                $(`#tr_${index}`).remove();
                $(this).parent().remove();



                for(var i = (index+1); i <= $('.variation_color').length; i++){
                    console.log(i)
                    $(`#tr_${i}`).attr('id', `tr_${i-1}`);
                    $(`#stoke_${i}`).attr('id', `stoke_${i-1}`);
                    $(`#price_${i}`).attr('id', `price_${i-1}`);
                    $(`#product_color_image_hidden_${i}`).attr('id', `product_color_image_hidden_${i-1}`);
                }


            })

                $(document).on('change', '.variation_color', function (e) {

                var newRow = ``;
                $('.variation_color').each(function(index) {


                    var color = $(this).val();
                    var price = $(`#price_${index}`).val();
                    var stoke = $(`#stoke_${index}`).val();
                    var product_color_image_hidden = $(`#product_color_image_hidden_${index}`).val();

                    // If color is not empty, add a new row to the table
                    if (color !== '') {
                         newRow += `
                <tr class="tr_variation_color" id="tr_${index}">
                    <td>${color} <input type="hidden" name="colors[]" value="${color}"></td>
                    <td>  <input type="number" value="${price}" class="form-control mw-100 w-200px h-50 " id="price_${index}" name="prices[]" placeholder="price" /></td>
                    <td class="text-end"><input type="number" value="${stoke}" class="form-control mw-100 w-200px h-50 " id="stoke_${index}" name="stokes[]" placeholder="stoke" /></td>
                    <td class="text-end">
                          <input type="file" name="product_color_image[]"    accept=".png, .jpg, .jpeg" />
                          <input type="hidden" name="product_color_image_hidden[]"    value="${product_color_image_hidden}" />

                 </td>
             </tr>
`;




                    }
                })
                $('#variation_result tbody').html(newRow);

            });
        });
    </script>

@endsection
