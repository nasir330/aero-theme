@extends('admin.auth.app')

@section('title', 'login')
    

@section('content')
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div id="login_alert"></div>
                <form action="" id="login_form" method="post" class="card auth_form">
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{ asset('backend/assets/images/logo.svg') }}" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="invalid-feedback"></div>                           
                        </div>


                        <div class="mb-3">
                            <a href="/forgot-pass" class="text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="mb-3 d-grid">
                            <input type="submit" value="Login" id="login_btn" class="btn btn-primary btn-block waves-effect waves-light">
                        </div>
                        <div class="text-center text-secondary">
                            <div>Don't have an account? <a href="/register" class="text-decoration-none">Register</a></div>
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
        $("#login_form").submit(function(e){
            e.preventDefault();
            $("#login_btn").val('Please Wait...');
            $.ajax({
                url: '{{ route('admin.auth.login') }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                    if(res.status == 400){
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        $("#login_btn").val('Login');
                    }
                    else if (res.status == 401){
                        $("#login_alert").html(showMessage('danger', res.messages));
                        $("#login_btn").val('Login')
                    }
                    else {
                        if (res.status == 200 && res.messages == 'success'){
                            window.location = '{{ route('dashboard') }}';
                        }
                    }
                }

            });
        });
    });
</script>
    
@endsection