<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">

<!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
{{--            <img alt="Logo" src="{{asset('')}}assets/media/sahm.png" class="h-25px logo" />--}}
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
								</svg>
							</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class=" text-muted text-uppercase fs-8 ls-1">{{__('Dashboard')}}</span>
                    </div>
                    <div class="menu-content pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">
                                         <a class="menu-link " href="{{route('dashboard.index')}}">

   HOME
                            </a>
                              </span>

                    </div>
                </div>









                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                    <div class="menu-item">
                        <div class="menu-content pb-2">
                            <span class=" text-muted text-uppercase fs-8 ls-1">Orders Management</span>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion show">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Orders</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('orders.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                    <div class="menu-item">
                        <div class="menu-content pb-2">
                            <span class=" text-muted text-uppercase fs-8 ls-1">Products Management</span>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion show">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Products</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('products.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('products.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Add</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Brands</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('brands.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('brands.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Add</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Collections</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('collections.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('collections.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Add</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                    <div class="menu-item">
                        <div class="menu-content pb-2">
                            <span class=" text-muted text-uppercase fs-8 ls-1">User Management</span>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion show">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Admins</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('admins.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('admins.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Add</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion show">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Customers</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('customers.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">All</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('customers.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Add</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                    <div class="menu-item">
                        <div class="menu-content pb-2">
                            <span class=" text-muted text-uppercase fs-8 ls-1">Site Management</span>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion show">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Settings</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('settings.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Show Settings</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet "></span>
												</span>
												<span class="menu-title">Activity Logs</span>
												<span class="menu-arrow"></span>
											</span>
                                <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('activity-logs.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Show</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>





            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>
