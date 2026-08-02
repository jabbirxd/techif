@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <h4 class="mb-4 text-dark fw-bold">Featured Products</h4>
        <div class="row">
            @forelse ($featuredProducts as $product)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 position-relative overflow-hidden hover-shadow" style="transition: all 0.3s ease; border-radius: 12px;">
                        <!-- Product Image -->
                        <div style="position: relative; overflow: hidden; height: 200px; background-color: #f8f9fa;">
                            @php $img = $product->productImages->first()->image ?? null; @endphp
                            @if($img)
                                <img src="{{ asset($img) }}" 
                                     class="w-100 h-100" 
                                     style="object-fit: cover; transition: transform 0.5s ease;" 
                                     alt="{{ $product->name }}"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                            @else
                                <img src="{{ asset('assets/images/placeholder.png') }}" 
                                     class="w-100 h-100" 
                                     style="object-fit: cover;" 
                                     alt="{{ $product->name }}">
                            @endif
                            <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2" style="font-size: 0.8rem; border-radius: 4px;">
                                Featured
                            </span>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column p-3">
                            <h5 class="card-title text-dark mb-2 text-truncate" style="font-size: 1.05rem; font-weight: 600;" title="{{ $product->name }}">
                                {{ $product->name }}
                            </h5>
                            
                            <p class="card-text mb-3">
                                <span class="text-primary fw-bold" style="font-size: 1.15rem;">Tk {{ number_format($product->selling_price) }}</span>
                                @if($product->original_price > $product->selling_price)
                                    <span class="text-muted text-decoration-line-through ms-2" style="font-size: 0.9rem;">Tk {{ number_format($product->original_price) }}</span>
                                @endif
                            </p>
                            
                            <a href="{{ url('/collections/' . $product->catagory->slug . '/' . $product->slug) }}" 
                               class="btn btn-primary w-100 mt-auto py-2 text-uppercase fw-semibold" 
                               style="font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px; box-shadow: 0 4px 6px rgba(13, 110, 253, 0.15); transition: all 0.2s ease;">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <h5 class="text-center text-muted my-5">No Featured Products Available</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection