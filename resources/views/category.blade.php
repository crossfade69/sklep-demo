<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.header')
    @include('partials.alerts')
    <main>
        <div class="container mt-4 mb-5">
            <div class="row">
                <!-- Menu kategorii -->
                <div class="col-md-3 d-none d-md-block">
                    <div class="list-group">
                        @foreach($categories as $cat)
                            @php
                                $isActive = $cat->id === optional($current_category)->id ||
                                        $cat->id === optional(optional($current_subcategory)->category)->id;
                            @endphp
                            
                            <a href="{{ route('category.show', $cat) }}"
                            class="list-group-item list-group-item-action {{ $isActive ? 'active' : '' }}">
                                {{ $cat->name }}
                                @if($isActive && $cat->subcategories->isNotEmpty())
                                    <i class="fas fa-chevron-right float-end"></i>
                                @endif
                            </a>

                            @if($cat->subcategories->isNotEmpty() && $isActive)
                                <div class="list-group ms-3">
                                    @foreach($cat->subcategories as $sub)
                                        <a href="{{ route('category.show', $sub) }}"
                                        class="list-group-item list-group-item-action {{ optional($current_subcategory)->id === $sub->id ? 'active' : '' }}">
                                            {{ $sub->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Lista produktów -->
                <div class="col-md-9">
                    <!-- Okruszki -->
                    @if($current_subcategory)
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category.show', $current_category) }}">
                                        {{ $current_category->name }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{ $current_subcategory->name }}</li>
                            </ol>
                        </nav>
                    @endif

                    <h2 class="mb-4">
                        {{ $current_subcategory ? $current_subcategory->name : $current_category->name }}
                    </h2>

                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-12 mb-4">
                                <div class="card h-100 product-card shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     class="img-fluid rounded-start" 
                                                     alt="{{ $product->name }}"
                                                     style="height: 200px; object-fit: contain;">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">
                                                    <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                                                        {{ $product->name }}
                                                    </a>
                                                </h5>
                                                <div class="text-primary h4 mb-3">
                                                    {{ number_format($product->price, 2, ',', ' ') }} zł
                                                </div>
                                                <p class="text-muted small">
                                                    Kategoria: {{ $product->subcategory->category->name }} > {{ $product->subcategory->name }}
                                                </p>
                                                
                                                <!-- Przyciski akcji -->
                                                <div class="mt-auto d-grid gap-2">
                                                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="quantity-{{ $product->id }}">Ilość</label>
                                                            <input type="number" 
                                                                class="form-control" 
                                                                name="quantity" 
                                                                id="quantity-{{ $product->id }}" 
                                                                value="1" 
                                                                min="1" 
                                                                max="{{ $product->stock }}"
                                                                style="max-width: 120px">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                                            <i class="fas fa-cart-plus me-2"></i>Dodaj do koszyka
                                                        </button>
                                                    </form>
                                                    @auth
                                                        <form action="{{ route('wishlist.add', $product) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                                <i class="fas fa-heart me-2"></i>Dodaj do listy życzeń
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm w-100">
                                                            <i class="fas fa-heart me-2"></i>Zaloguj się aby dodać do listy
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    Brak produktów w tej kategorii
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Paginacja -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>
</html>