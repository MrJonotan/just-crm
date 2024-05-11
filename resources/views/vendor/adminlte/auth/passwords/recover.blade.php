@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )
@php( $password_recover_url = View::getSection('password_recover_url') ?? config('adminlte.password_recover_url', 'password/recover') )
{{}}

@if (config('adminlte.use_route_url', false))
    @php( $password_recover_url = $password_recover_url ? route($password_recover_url) : '' )
@else
    @php( $password_recover_url = $password_recover_url ? url($password_recover_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.retype_password'))

@section('auth_body')

@stop



<body class="login-page" style="min-height: 398px;">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
            <form action="login.html" method="post">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Change password</button>
                    </div>

                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="login.html">Login</a>
            </p>
        </div>

    </div>
</div>


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>


</body>
