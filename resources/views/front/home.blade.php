<x-front.layouts.site-layout>
    <x-dashboard.layouts.alert type="danger" />
    <x-dashboard.layouts.alert type="success" />

    @include('front.home.slider')
    @include('front.home.categories')
    @include('front.home.products')
    @include('front.home.brands')
    @include('front.home.shipping')

</x-front.layouts.site-layout>
