@extends('layouts.app')

@section('title','Dashboard')
@section('content')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Create Member</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a>
                        </li>
                        <li class="breadcrumb-item active">Create Member</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Member Form</strong> </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{route('add.members')}}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <p class="mb-0"> <b>First Name</b> </p>
                                        <input type="text" name="firstName" class="form-control"
                                            placeholder="Enter First Name">
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <p class="mb-0"> <b>Last Name</b> </p>
                                        <input type="text" name="lastName" class="form-control"
                                            placeholder="Enter Last Name">
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <p class="mb-0"> <b>Gender</b> </p>
                                        <select name="gender" class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                            <option></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <p class="mb-0"> <b>Email</b> </p>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <p class="mb-0"> <b>Phone</b> </p>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <button type="submit"
                                            class="btn btn-primary btn-block waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection