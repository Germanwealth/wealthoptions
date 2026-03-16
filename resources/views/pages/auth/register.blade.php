@extends('layouts.app')

@section('content')
    <section class="section-padding auth-page" style="padding-top: 140px; padding-bottom: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <h2 class="text-center mb-4">Create Your Account</h2>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('register.submit') }}" method="post" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" id="fullname" name="full_name" class="form-control" placeholder="Jane Doe" value="{{ old('full_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="confirm">Confirm Password</label>
                                        <input type="password" id="confirm" name="password_confirmation" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="agree" name="terms" required>
                                    <label class="form-check-label" for="agree">I agree to the terms</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
