<x-front.layouts.site-layout title='Login Page'>
    <x-front.includes.breadcrumbs pageTitle="Login" />


    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{ route('users.check.login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <x-dashboard.layouts.alert type="danger" />
                            <x-dashboard.layouts.alert type="success" />
                            <div class="title">
                                <h3 class="text-center">Login Now</h3>

                            </div>
                            <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                            href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                            href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                            href="javascript:void(0)"><i class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                            <div class="form-group input-group">
                                <x-form.input type="text" class="form-control" id="user-phone-nom"
                                    placeholder="your phone number" label='true' labelName='Phone Number'
                                    name="mobile" required />
                                {{-- <x-form.input type="email" class="form-control" id="user-email" name="email"
                                    placeholder="your email" label='true' labelName='Email' required /> --}}
                            </div>
                            <div class="form-group input-group">
                                <x-form.input type="password" class="form-control" id="user-password" name="password"
                                    placeholder="your password" label='true' labelName='Password' required />
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember_me" class="form-check-input width-auto"
                                        id="exampleCheck1">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            <p class="outer-link">Don't have an account? <a
                                    href="{{ route('users.register') }}">Register here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front.layouts.site-layout>
