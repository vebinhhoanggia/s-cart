@php
$categories = $modelCategory->start()->getCategoryRoot()->getData();
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
            @php
                $category_root_id = $category['category_id'];
                $categoriesTopId = $modelCategory->start()->setParent($category_root_id)->getData()->keyBy('id')->toArray();
                $arrCategoriId = array_keys($categoriesTopId);
                array_push($arrCategoriId, $category_root_id);
                $products = $modelProduct->start()->getProductToCategory($arrCategoriId)->setLimit(sc_config('product_preview'))->getData();
            @endphp
            <div class="row row-10 row-lg-20">
                @foreach ($products as $key => $product)
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                    <!-- Render product single -->
                    @include($sc_templatePath.'.common.product_single', ['product' => $product])
                    <!-- //Render product single -->
                </div>
                @endforeach
            </div>
            <!-- //Product list -->
            <!-- Ref to category -->
            <div class="" data-id="383adc6" data-element_type="widget" data-settings="{&quot;_ob_perspektive_use&quot;:&quot;no&quot;,&quot;_ob_poopart_use&quot;:&quot;yes&quot;,&quot;_ob_shadough_use&quot;:&quot;no&quot;,&quot;_ob_allow_hoveranimator&quot;:&quot;no&quot;,&quot;_ob_widget_stalker_use&quot;:&quot;no&quot;}" data-widget_type="html.default">
                <div class="elementor-widget-container"> <a class="a-button" href="{{ $category->getUrl() }}">Xem tất cả {!! $category->getTitle() !!} <i class="fa-solid fa-angle-right"></i> </a> </div>
            </div>
            <!-- //Ref to category -->
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