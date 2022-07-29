@php
$categories = $modelCategory->start()->getCategoryRoot()->getData();
$products = $modelProduct->start()->getProductLatest()->setlimit(sc_config('product_top'))->getData();
@endphp
{{-- block_main_content_center  --}}
@if (count($categories))
<!-- Category list -->
<div class="categories-block">
    @foreach ($categories as $key => $category)
    <section class="section section-xxl bg-default text-md-left">
        <div class="container">
            <!-- Category Name -->
            <h2 class="wow fadeScale" style="visibility: visible; animation-name: fadeScale; text-align: center;">{!! $category['title'] !!}</h2>
            <!-- Category Name -->
            <!-- Product list -->
            <div class="row row-30 row-lg-50">
                @foreach ($products as $key => $product)
                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                    <!-- Render product single -->
                    @include($sc_templatePath.'.common.product_single', ['product' => $product])
                    <!-- //Render product single -->
                </div>
                @endforeach
            </div>
            <!-- //Product list -->
        </div>
    </section>
    @endforeach
</div>
<!-- //Category list -->

<!-- Render pagination -->
<!--// Render pagination -->
@else
<div class="product-top-panel group-md">
    <p style="text-align:center">{!! sc_language_render('front.no_item') !!}</p>
</div>
@endif

@push('styles')
@endpush

@push('scripts')
<!-- //script here -->
@endpush