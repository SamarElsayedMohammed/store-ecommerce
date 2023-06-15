<x-front.layouts.site-layout title='Register Page'>
    <x-front.includes.breadcrumbs pageTitle="Registeration" />


    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" method="post" action="{{ route('users.register.store') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.input type="name" class="form-control" id="user-name" name="name"
                                        placeholder="your name" label='true' labelName='Name' required />

                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.input type="text" class="form-control" id="user-phone-nom"
                                        placeholder="your phone number" label='true' labelName='Phone Number'
                                        name="mobile"  />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <x-form.input type="email" class="form-control" id="user-email" name="email"
                                        placeholder="your email" label='true' labelName='Email' required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.input type="password" class="form-control" id="user-password"
                                        name="password" placeholder="your password" label='true' labelName='Password'
                                        required />

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.input type="password" class="form-control" id="user-password_confirmation"
                                        name="password_confirmation" placeholder="your password confirmation"
                                        label='true' labelName='Password Confirmation' required />

                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('users.login') }}">Login
                                    Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
</x-front.layouts.site-layout>
