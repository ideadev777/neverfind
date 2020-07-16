@extends('layout/admin_app')

@section('title', 'Dashboard')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Order List</h2>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="content-body">
                <!-- Data list view starts s-->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>EMAIL</th>
                                    <th>CATEGORY</th>
                                    <th>POPULARITY</th>
                                    <th>ORDER STATUS</th>
                                    <th>PAYMENT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td></td>
                                    <td class="product-name">{{$order->email}}</td>
                                    <td class="product-category">Fitness</td>
                                    <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">
                                        @if($order->status==6) <button class="btn btn-primary" disabled="">Received</button>
                                        @else <button class="btn btn-warning">Request</button>
                                        @endif
                                    </td>
                                    <td class="product-action">
                                        <a class="action-edit" href="#" onClick="deleteItem({{$order->id}})">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <a href="/order/delete/{{$order->id}}">DEL</a>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">List View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="text" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script>
        function deleteItem(id) {
            $.post('/order/delete', {
                _token: '{{csrf_token()}}',
                id: id
            }, function (res) {
                //console.log(res)
                
            })
        }
    </script>
@endsection