<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.header')

    <main>
        <div class="container mt-4">
            <div class="row mb-5">
                <!-- Karuzela -->
                <div class="col-md-8 d-none d-md-block">
                    <!-- Bez zmian w karuzeli -->
                </div>

                <!-- Produkt dnia -->
                <div class="col-md-4">
                    <div class="product-of-the-day card">
                        <div class="product-header">
                            <h2>Produkt dnia</h2>
                        </div>
                        @if($productOfTheDay)
                            <img src="{{ asset('storage/' . $productOfTheDay->image) }}" 
                                class="product-image" 
                                alt="{{ $productOfTheDay->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $productOfTheDay->name }}</h5>
                                <p class="card-price">
                                    <span class="price-highlight">{{ number_format($productOfTheDay->price, 2, ',', ' ') }} zł</span> z VAT
                                </p>
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productOfTheDay->id }}">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-cart-plus"></i> Dodaj do koszyka
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <h5>Brak produktu dnia</h5>
                                    <p class="mb-0">Aktualnie nie ma wybranego produktu dnia</p>
                                </div>
                                <!-- Optional placeholder image -->
                                <img src="{{ asset('images/placeholder-product.jpg') }}" 
                                    class="product-image" 
                                    alt="Brak produktu">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sekcje kategorii -->
            <div class="category-sections mt-5">
                @foreach($categories as $category)
                <div class="category-section mb-5">
                    <div class="category-background bg-secondary text-white p-3">
                        <h2>{{ $loop->iteration }}. {{ $category->name }}</h2>
                    </div>
                    <div class="category-content p-3">
                        @if($category->subcategories->isNotEmpty())
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                            @foreach($category->subcategories as $subcategory)
                            <li>
                                <a href="{{ route('category.show', $subcategory->slug) }}" class="btn btn-outline-primary">
                                    {{ $subcategory->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    
                </div>
                @endforeach
            </div>

            
        </div>
    </main>

    @include('partials.footer')
</body>
</html>