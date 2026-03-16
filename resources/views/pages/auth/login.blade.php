@extends('layouts.app')

@section('content')
    <section class="section-padding auth-page" style="padding-top: 140px; padding-bottom: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <h2 class="text-center mb-4">Welcome Back</h2>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('login.submit') }}" method="post" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="lemail">Email</label>
                                    <input type="email" id="lemail" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lpassword">Password</label>
                                    <input type="password" id="lpassword" name="password" class="form-control" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-link btn-sm" disabled>Resend verification email</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-center mt-3">New here? <a href="{{ route('register') }}">Create an account</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
