<div class="row">
    @foreach ($products as $product)
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="properties pb-30">
                <div class="properties-card">
                    <div class="properties-img">
                        <img style="height:150px;" src="{{ $product->image }}">
                    </div>
                    <div class="properties-caption properties-caption2">
                        <h4>{{ $product->title }}</h4>
                        <p>{{ $product->product_type }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="organ_pagination text-center">
            {!! $products->links('pages.pagination') !!}
        </div>
    </div>
</div>
