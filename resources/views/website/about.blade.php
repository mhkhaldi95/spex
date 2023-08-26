@extends('website.layout.master')
@section('content')
    <div class="axil-about-area about-style-1 axil-section-gap ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-thumbnail">
                        <div class="thumbnail">
                            <div class="thumbnail about-image-view-parent">
                                <div class="about-image-view-child"
                                     style="background-image: url('{{getSettingByKey($settings,'about_image')->value}}')">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="about-content content-right">
                        <h3 class="title">{{getSettingByKey($settings,'about_title')->value}}</h3>
                        <span class="text-heading">{{getSettingByKey($settings,'about_sub_title')->value}}</span>
                        <div class="row">
                            <div class="col-xl-6">
                                <p>{{getSettingByKey($settings,'about_description_left')->value}}</p>
                            </div>
                            <div class="col-xl-6">
                                <p class="mb--0">{{getSettingByKey($settings,'about_description_right')->value}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-info-area">
        <div class="container">
            <div class="row row--20">
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="content">
                            <h6 class="title">{{getSettingByKey($settings,'about_info_box1_title')->value}}</h6>
                            <p>{{getSettingByKey($settings,'about_info_box1_content')->value}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="content">
                            <h6 class="title">{{getSettingByKey($settings,'about_info_box2_title')->value}}</h6>
                            <p>{{getSettingByKey($settings,'about_info_box2_content')->value}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="content">
                            <h6 class="title">{{getSettingByKey($settings,'about_info_box3_title')->value}}</h6>
                            <p>{{getSettingByKey($settings,'about_info_box3_content')->value}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
