@extends('layouts.main')

@section('container')
<div class="login-container">
    <h1 class="login-header-text"> Login </h1>
    <div class="login-email-wrapper">
        <p class="login-email-title">E-Mail</p>
        <form style="width: 78%">
            <input class="login-email-input" type="text" name="email" placeholder="E-Mail Address" title="email" id="e-mail-address">
        </form>
    </div>
    <div class="login-password-wrapper">
        <p class="login-password-title">Password</p>
        <form style="width: 78%">
            <input class="login-password-input" type="password" name="password" placeholder="Password" title="password" id="password">
        </form>
    </div>
    <div class="tooltip-confirm-login">
        <button class="shadow-confirm-login">
            Login Now!
        </button>
        <span class="tooltiptext-confirm-login">
            Login your account now!
        </span>
    </div>
    <div style="display: flex; margin: 25%; margin-top: -50px;">
        <p style="text-align: center; margin: 10px; margin-top: 5px; color: azure;">Not have an account?</p>
        <a style="margin: 10px; margin-top: 5px; margin-left: -5px; text-align: center" href="/register">Sign up now!</a>
    </div>
</div>
@endsection