@extends('admin.auth.app')

@section('title', 'change password')
    

@section('content')
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div id="reset_alert"></div>
                <form action="" id="reset_form" method="post" class="card auth_form">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="header">
                        <img class="logo" src="{{ asset('backend/assets/images/logo.svg') }}" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ $email }}" disabled>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="npass" name="npass" class="form-control" placeholder="New Password">
                            <div class="invalid-feedback"></div>                           
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="cnpass" name="cnpass" class="form-control" placeholder="Confirm New Password">
                            <div class="invalid-feedback"></div>                           
                        </div>

                        <div class="mb-3 d-grid">
                            <input type="submit" value="Update Password" id="reset_btn" class="btn btn-primary btn-block waves-effect waves-light">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{ asset('backend/assets/images/signin.svg') }}" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function(){
    $("#reset_form").submit(function(e){
        e.preventDefault();
        $("#reset_btn").val("Please Wait...");
        $.ajax({
            url: '{{ route('admin.auth.reset') }}',
            method: 'post',
            data: $(this).serialize(),
            // dataType: 'json',
            success: function(res){
                if(res.status == 400){
                    showError('npass', res.messages.npass);
                    showError('cnpass', res.messages.cnpass);
                    $("#reset_btn").val('Update Password');
                }
                else if(res.status == 401){
                    $("#reset_alert").html(showMessage('danger', res.messages));
                    removeValidationClasses('#reset_form');
                    $("#reset_btn").val('Update Password');
                }
                else{
                    $("#reset_form")[0].reset();
                    $("#reset_alert").html(showMessage('success', res.messages));
                    $("#reset_btn").val('Update Password');
                }
            }

        });
    });
});
</script>
@endsection