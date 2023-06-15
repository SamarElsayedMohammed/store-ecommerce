<x-front.layouts.site-layout>
    <x-front.includes.breadcrumbs pageTitle="Cart" />
    <x-dashboard.layouts.alert type="danger" />
    <x-dashboard.layouts.alert type="success" />

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="col-md-12">
                        <div class="single-form button">
                            <a href="{{ $invoiceURL }}" class="btn" >Countinue to pay</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-front.layouts.site-layout>
