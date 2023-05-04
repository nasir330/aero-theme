@extends('admin.auth.app')
@section('title', 'register')
    

@section('content')
<div class="authentication">    
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div id="show_success_alert"></div>
                <form action="" id="register_form" method="post" class="card auth_form">
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{ asset('backend/assets/images/logo.svg') }}" alt="">
                        <h5>Sign Up</h5>
                        <span>Register a new membership</span>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" id="name" name="name" class="form-control" placeholder="First Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                            <div class="invalid-feedback"></div>
                        </div>                        
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="invalid-feedback"></div>                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Password">
                            <div class="invalid-feedback"></div>                            
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" value="Register" id="register_btn" class="btn btn-primary btn-block waves-effect waves-light">
                        </div>

                        <div class="text-center text-secondary">
                            <div>Already have an account? <a href="/" class="text-decoration-none">Login</a></div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{ asset('backend/assets/images/signup.svg') }}" alt="Sign Up" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(function(){
        $("#register_form").submit(function(e){
            e.preventDefault();
            $("#register_btn").val('Please Wait...');
            $.ajax({
                url: '{{ route('admin.auth.register') }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                    if(res.status == 400){
                        showError('name', res.messages.name);
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        showError('cpassword', res.messages.cpassword);
                        $("#register_btn").val('Register');
                    }
                    else if(res.status == 200){
                        $("#show_success_alert").html(showMessage('success', res.messages));
                        $("#register_form")[0].reset();
                        removeValidationClasses("#register_form");
                        $("#register_btn").val('Register');
                    }
                }
            });
        });
    });
</script>
    
@endsection