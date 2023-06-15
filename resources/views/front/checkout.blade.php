<x-front.layouts.site-layout>
    <x-front.includes.breadcrumbs pageTitle="Cart" />
    <x-dashboard.layouts.alert type="danger" />
    <x-dashboard.layouts.alert type="success" />

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <form class="needs-validation" method="post"
                                        action="{{ route('cart.payment.process') }}" novalidate="">
                                        @csrf
                                        <input type="hidden" name="amount" value="{{ $amount }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" name="customerName"
                                                                placeholder="First Name">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input name="customerEmail" type="text"
                                                            placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input name="phone" type="text" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-block my-3">
                                                    <div class="check-out-container single-form form-default">
                                                        <label class="custom-control-label" for="credit">Visa</label>
                                                        <div class="form-input form">
                                                            <input class="check-out-radio" name="PaymentMethodId" type="radio" value="2"
                                                                class="" checked="" required="">
                                                        </div>
                                                    </div>
                                                    <div class="check-out-container single-form form-default">
                                                        <label class="custom-control-label" for="debit">Master
                                                            Card</label>
                                                        <div class="form-input form">
                                                            <input class="check-out-radio" name="PaymentMethodId" type="radio" value="2"
                                                                class="" required="">
                                                        </div>
                                                    </div>

                                                    <div class="check-out-container single-form form-default">
                                                        <label class="custom-control-label" for="paypal">Mada</label>
                                                        <div class="form-input form">
                                                            <input class="check-out-radio" name="PaymentMethodId" type="radio" value="6"
                                                                class="" required="">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            {{--    <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>City</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="City">
                                                </div>
                                            </div>
                                        </div> --}}

                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" type="submit" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">next
                                                        step</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <section id="main">
                    <h1 class="page-title">Payment Methods</h1>
                    <div class="cart-grid row">
                        <form class="needs-validation" method="post" action="{{ route('cart.payment.process') }}"
                            novalidate="">
                            @csrf
                            <hr class="mb-4">
                            <h4 class="mb-3">Payment</h4>

                            <input type="hidden" name="amount" value="{{ $amount }}">
                            <div class="d-block my-3">
                                <div class="custom-radio">
                                    <input name="PaymentMethodId" type="radio" value="2" class=""
                                        checked="" required="">
                                    <label class="custom-control-label" for="credit">Visa</label>
                                </div>
                                <div class="custom-radio">
                                    <input name="PaymentMethodId" type="radio" value="2" class=""
                                        required="">
                                    <label class="custom-control-label" for="debit">Master Card</label>
                                </div>
                                <div class="custom-radio">
                                    <input name="PaymentMethodId" type="radio" value="6" class=""
                                        required="">
                                    <label class="custom-control-label" for="paypal">Mada</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder=""
                                        required="">
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" name="ccNum" id="cc-number"
                                        placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" name="ccExp" id="cc-expiration"
                                        placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" name="ccCvv" id="cc-cvv"
                                        placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                checkout</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div> --}}
</x-front.layouts.site-layout>
