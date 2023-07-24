@extends('layouts.admin.main')

@section('title', 'Dashboards')

@section('content')
<div class="row">
    <div class="col-xl-4 mb-4 col-lg-5 col-12">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-7">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-0">Welcome {{ $auth->name }} 🎉</h5>
                        <p class="mb-2">AdminPanel</p>
                        <div id="btn-quick-what">

                        </div>
                    </div>
                </div>
                <div class="col-5 text-center text-sm-left">
                    <div class="card-body px-md-4">
                        <img src="{!! $ws->_logo() !!}" height="100" alt="view sales">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">Statistics</h5>
                    <small class="text-muted">Updated 1 secound ago</small>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-file-dollar ti-sm" style="margin-top: -3px"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $count_product }}</h5>
                                <small>Products</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z"></path>
                                    <path d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z"></path>
                                    <path d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z"></path>
                                 </svg>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $count_blog }}</h5>
                                <small>Blogs</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $count_purchases }}</h5>
                                <small>License</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $count_users }}</h5>
                                <small>Users</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var btn = [
            '<a href="{!! route('admin.license.index') !!}" class="btn btn-label-primary waves-effect waves-light">Manage License ?</a>',
            '<a href="{!! route('admin.product.index') !!}" class="btn btn-label-warning waves-effect waves-light">Manage Products ?</a>',
            '<a href="{!! route('admin.blog.index') !!}" class="btn btn-label-info waves-effect waves-light">Manage Blogs ?</a>',
        ]
        $('#btn-quick-what').html(btn[0])
        var index = 1;
        setInterval(function() {
            $('#btn-quick-what').html(btn[index++])
            if (index >= btn.length) {
                index = 0;
            }
        }, 2000)
</script>
@endpush
