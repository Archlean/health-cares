@extends('layouts.main')

@section('container')
    <div class="register-container">
        <h1 class="register-header-text"> Register </h1>
        <div class="register-email-wrapper">
            <p class="register-email-title">E-Mail</p>
            <form style="width: 78%">
                <input class="register-email-input" type="text" name="email" placeholder="E-Mail Address" title="email" id="e-mail-address">
            </form>
        </div>
        <div class="register-name-wrapper">
            <p class="register-name-title">Username</p>
            <form style="width: 78%">
                <input class="register-name-input" type="text" name="name" placeholder="Username" title="name" id="username">
            </form>
        </div>
        <div class="register-password-wrapper">
            <p class="register-password-title">Password</p>
            <form style="width: 78%">
                <input class="register-password-input" type="password" name="password" placeholder="Password" title="password" id="password">
            </form>
        </div>
        <div class="register-repassword-wrapper">
            <p class="register-repassword-title">Re-Password</p>
            <form style="width: 78%">
                <input class="register-repassword-input" type="password" name="repassword" placeholder="Re-Password" title="repassword" id="repassword">
            </form>
        </div>
        <div class="tooltip-confirm-register">
            <button class="shadow-confirm-register">
                Register Now!
            </button>
            <span class="tooltiptext-confirm-register">
                Register your account for full access!
            </span>
        </div>
        <div style="display: flex; margin: 20%; margin-top: -50px;">
            <p style="text-align: center; margin: 10px; margin-top: 5px; color: azure;">Already have an account?</p>
            <a style="margin: 10px; margin-top: 5px; text-align: center; margin-left: -5px;" href="/login">Sign in now!</a>
        </div>
    </div>
@endsection