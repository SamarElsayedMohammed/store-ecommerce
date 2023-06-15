<x-front.layouts.site-layout title='verification Page'>
    <x-front.includes.breadcrumbs pageTitle="verify" />


    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{ route('users.verify-user') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <x-dashboard.layouts.alert type="danger" />
                            <x-dashboard.layouts.alert type="success" />
                            <div class="title">
                                <h3 class="text-center">verify code</h3>

                            </div>
                        
                            <div class="form-group input-group">
                                <x-form.input type="text" class="form-control" id="user-phone-nom"
                                    placeholder="your code" label='true' labelName='code'
                                    name="code" required />
                            </div>
                          
                            <div class="button">
                                <button class="btn" type="submit">verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front.layouts.site-layout>
