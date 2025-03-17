<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
    @include('partials.header')

    <main>
        <div class="container py-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title mb-4"><i class="fas fa-shopping-cart"></i> Twój Koszyk</h1>

                    @if(count($cart) > 0)
                    <div class="row">
                        <!-- Lista produktów -->
                        <div class="col-md-8">
                            @foreach($cart as $item)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="{{ $item['image'] }}" class="img-fluid rounded-start" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['name'] }}</h5>
                                            <p class="card-text">Cena: {{ number_format($item['price'], 2) }} zł</p>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-outline-secondary btn-sm quantity-btn">-</button>
                                                <input type="number" 
                                                       class="form-control quantity-input mx-2" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1"
                                                       style="width: 70px;">
                                                <button class="btn btn-outline-secondary btn-sm quantity-btn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                                        <div class="text-end">
                                            <p class="h5">{{ number_format($item['price'] * $item['quantity'], 2) }} zł</p>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Podsumowanie -->
                        <div class="col-md-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Podsumowanie</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Suma częściowa:</span>
                                        <span>{{ number_format($total, 2) }} zł</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Dostawa:</span>
                                        <span>0.00 zł</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-4">
                                        <strong>Łączna suma:</strong>
                                        <strong>{{ number_format($total, 2) }} zł</strong>
                                    </div>
                                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100">
                                        <i class="fas fa-credit-card"></i> Przejdź do płatności
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
                        <h4 class="mb-3">Twój koszyk jest pusty</h4>
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Kontynuuj zakupy
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>