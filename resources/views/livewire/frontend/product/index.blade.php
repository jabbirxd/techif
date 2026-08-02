<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($catagory->brands as $brandItem)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"
                                wire:change="logBrandInputs" />
                            {{ $brandItem->name }}
                        </label>
                    @endforeach


                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Prices</h4>
                </div>
                <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"
                                wire:change="logpriceInput" />
                            High To Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"
                                wire:change="logpriceInput" />
                            Low To High
                        </label>

                </div>
            </div>

        </div>
        <div class="col-md-9">

            <div class="row">
                @forelse($products as $productItem)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 position-relative overflow-hidden hover-shadow" style="transition: all 0.3s ease; border-radius: 12px;">
                            <!-- Product Image -->
                            <div style="position: relative; overflow: hidden; height: 200px; background-color: #f8f9fa;">
                                @if ($productItem->productImages->count() > 0)
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" 
                                         class="w-100 h-100" 
                                         style="object-fit: cover; transition: transform 0.5s ease;" 
                                         alt="{{ $productItem->name }}"
                                         onmouseover="this.style.transform='scale(1.08)'"
                                         onmouseout="this.style.transform='scale(1)'">
                                @else
                                    <img src="{{ asset('assets/images/placeholder.png') }}" 
                                         class="w-100 h-100" 
                                         style="object-fit: cover;" 
                                         alt="{{ $productItem->name }}">
                                @endif
                                
                                @if ($productItem->quantity > 0)
                                    <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2" style="font-size: 0.8rem; border-radius: 4px;">
                                        In Stock
                                    </span>
                                @else
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2" style="font-size: 0.8rem; border-radius: 4px;">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column p-3">
                                <h5 class="card-title text-dark mb-2 text-truncate" style="font-size: 1.05rem; font-weight: 600;" title="{{ $productItem->name }}">
                                    {{ $productItem->name }}
                                </h5>
                                
                                <p class="card-text mb-3">
                                    <span class="text-primary fw-bold" style="font-size: 1.15rem;">Tk {{ number_format($productItem->selling_price) }}</span>
                                    @if($productItem->original_price > $productItem->selling_price)
                                        <span class="text-muted text-decoration-line-through ms-2" style="font-size: 0.9rem;">Tk {{ number_format($productItem->original_price) }}</span>
                                    @endif
                                </p>
                                
                                <a href="{{ url('/collections/' . $productItem->catagory->slug . '/' . $productItem->slug) }}" 
                                   class="btn btn-primary w-100 mt-auto py-2 text-uppercase fw-semibold" 
                                   style="font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px; box-shadow: 0 4px 6px rgba(13, 110, 253, 0.15); transition: all 0.2s ease;">
                                    View Product
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2 text-center text-muted">
                            <h4>No Products Available for {{ $catagory->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    {{-- <pre>{{ var_export($brandInputs, true) }}</pre> --}}

</div>
