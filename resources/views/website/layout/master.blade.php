<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
{{--<html lang="en">--}}
<html lang="{{app()->getLocale() == 'ar'?'ar':'en'}}" dir="{{app()->getLocale() == 'ar'?'rtl':'ltr'}}">
<!--begin::Head-->
<head>
    <base href="">
    @include('website.layout.head')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
      data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">
<!--begin::Main-->
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">

        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Header-->
            @include('website.layout.header')
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('content')
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include('website.layout.footer')
            <!--end::Footer-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('')}}assets/plugins/global/plugins.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{--<script src="{{asset('')}}assets/js/scripts2.bundle.js"></script>--}}
<script src="{{asset('')}}assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('')}}assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('')}}assets/js/custom/widgets.js"></script>
<script src="{{asset('')}}assets/js/custom/apps/chat/chat.js"></script>
<script src="{{asset('')}}assets/js/custom/modals/create-app.js"></script>
<script src="{{asset('')}}assets/js/custom/modals/upgrade-plan.js"></script>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('')}}assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
{{--<script src="{{asset('')}}assets/js/custom/documentation/general/datatables/server-side.js"></script>--}}
<script src="{{asset('')}}assets/js/custom/documentation/general/toastr.js"></script>
{{--<script src="{{asset('')}}assets/js/custom/bootstrap-datepicker.js"></script>--}}
<!--end::Page Custom Javascript-->
{{--<script src="{{asset('')}}assets/js/custom/bootstrap-datepicker.js?v=7.2.9"></script>--}}
<!--end::Javascript-->

<script>


    function disableButton(id_btn) {
        var button = document.getElementById(id_btn);
        button.disabled = true;
    }

    function enableButton(id_btn) {
        var button = document.getElementById(id_btn);
        button.disabled = false;
    }

    function disableButtonAndSubmitForm(id_btn, id_form) {
        var button = document.getElementById(id_btn);
        button.disabled = true;
        var form = document.getElementById(id_form);
        form.submit();
    }


</script>
@yield('scripts')

<script type="text/javascript">
    @if(Session::has('message'))
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        @if(app()->getLocale() == 'ar')
        "positionClass": "toast-top-left",
        @else
        "positionClass": "toast-top-right",
        @endif
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{Session::get('message') }}");
            break;
    }
    @endif

    $(document).ready(function () {


        $(document).on('select2:open', '.form-select', function () {
            if ($(this)) {
                $('.select2-search__field').each(function () {
                    $(this)[0].focus()
                })
            }
        });



        // $('#kt_aside_toggle').click()


    });

</script>

</body>
<!--end::Body-->
</html>
