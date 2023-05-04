@extends('admin.auth.app')

@section('title', 'forgot password')
    

@section('content')
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div id="forgot_alert"></div>
                <form action="" id="forgot_form" method="post" class="card auth_form">
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{ asset('backend/assets/images/logo.svg') }}" alt="">
                        <h5>Forgot Password?</h5>
                        <span>Enter your e-mail address below to reset your password.</span>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3 d-grid">
                            <input type="submit" value="Reset Password" id="forgot_btn" class="btn btn-primary btn-block waves-effect waves-light">
                        </div>

                        
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{ asset('backend/assets/images/signin.svg') }}" alt="Forgot Password"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function(){
    $("#forgot_form").submit(function(e){
        e.preventDefault();
        $("#forgot_btn").val('Please Wait...');
        $.ajax({
            url: '{{ route('admin.auth.forgot') }}',
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
                if(res.status == 400){
                    $("#forgot_alert").html(showError('email', res.messages.email));
                    $("#forgot_btn").val("Reset Password");
                }
                else if(res.status == 200){
                    $("#forgot_alert").html(showMessage('success', res.messages));
                    $("#forgot_btn").val("Reset Password");
                    removeValidationClasses("#forgot_form");
                    $("#forgot_form")[0].reset();
                }
                else{
                    $("#forgot_btn").val("Reset Password");
                    $("#forgot_alert").html(showMessage('danger', res.messages));
                }
            }
        });
    });
});
</script>
@endsection