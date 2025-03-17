<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.header')
    @include('partials.alerts')
    <main class="py-5">
        <div class="container">
            <!-- Ścieżka okruszków -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Strona główna</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </nav>

            <!-- Szczegóły produktu -->
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="img-fluid rounded-3 shadow" 
                         alt="{{ $product->name }}">
                </div>
                <div class="col-md-6">
                    <h1 class="mb-3">{{ $product->name }}</h1>
                    <div class="h2 text-primary mb-4">
                        {{ number_format($product->price, 2, ',', ' ') }} zł
                    </div>

                    <!-- Akcje -->
                    <div class="d-grid gap-3 mb-4">
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
                        <form action="{{ route('wishlist.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-lg w-100">
                                <i class="fas fa-heart me-2"></i>Dodaj do listy życzeń
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg w-100">
                            <i class="fas fa-heart me-2"></i>Zaloguj się aby dodać do listy życzeń
                        </a>
                        @endauth
                    </div>

                    <!-- Opis -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Opis produktu</h3>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Powiązane produkty -->
            @if($relatedProducts->count() > 0)
            <section class="mt-5">
                <h2 class="mb-4">Podobne produkty</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($relatedProducts as $related)
                    <div class="col">
                        @include('partials.product-card', ['product' => $related])
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </main>

    @include('partials.footer')
</body>
</html>