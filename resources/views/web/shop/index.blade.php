@extends('web.layouts.master')
@section('css')
@endsection
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ isset($breadcrumb->image) ? asset('storage/' . $breadcrumb->image) : asset('web/imsssssg/hero-bg.jpg') }});">

        >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('web.single_product.index', $product->id) }}"><img
                                        src="{{ asset('storage/' . $product->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>Per {{ $product->unit->name }}</span> {{ $product->price }}$ </p>
                            <form class="addToCartForm" action="{{ route('web.cart.addToCart') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" placeholder="0" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end products -->
@endsection
@section('script')
{{-- <script>
    $(document).ready(function() {
        $('.addToCartForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('web.cart.addToCart') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(data) {
                    if (data.status == 200) {
                        $('#create').modal('hide');
                        toastr.success(data.message);
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 4000);
                        $('#createForm')[0].reset();
                        clearModalContents();
                    }
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value);
                        $('#createForm')[0].reset();
                        clearModalContents();
                    });
                }
            });
        });
    });
</script> --}}
@endsection
