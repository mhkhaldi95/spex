@extends('website.layout.master')
@section('content')
    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                    <a class="nav-item nav-link" href="sign-in.html"><i class="fal fa-sign-out"></i>Logout</a>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>On Hold</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="Annie">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="Mario">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="title">Password Change</h5>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" value="123456789101112131415">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="Save Changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->
@endsection
