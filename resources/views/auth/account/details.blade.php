<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
    @include('partials.header')

    <main>
        <div class="container py-5">
            <div class="row justify-content-center">
                <!-- Sidebar - Nawigacja konta -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-lg">
                        <div class="list-group">
                            <a href="{{ route('account.orders') }}" 
                               class="list-group-item list-group-item-action {{ request()->routeIs('account.orders') ? 'active' : '' }}">
                                <i class="fas fa-box-open me-2"></i>Moje zamówienia
                            </a>
                            <a href="{{ route('account.details') }}" 
                               class="list-group-item list-group-item-action {{ request()->routeIs('account.details') ? 'active' : '' }}">
                                <i class="fas fa-user-edit me-2"></i>Dane osobowe
                            </a>

                            <a href="{{ route('account.wishlist') }}" 
                               class="list-group-item list-group-item-action {{ request()->routeIs('account.wishlist') ? 'active' : '' }}">
                                <i class="fas fa-heart me-2"></i>Lista życzeń
                            </a>
                            <a href="{{ route('logout') }}" 
                               class="list-group-item list-group-item-action text-danger"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Wyloguj się
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content - Zawartość strony -->
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h1 class="card-title mb-4"><i class="fas fa-user-edit me-2"></i>Moje dane</h1>
                            
                            <form>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Imię i nazwisko</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Adres e-mail</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Numer telefonu</label>
                                    <input type="tel" class="form-control" value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Adres zamieszkania</label>
                                    <input type="tel" class="form-control" value="{{ Auth::user()->address }}">
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Zapisz zmiany</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </main>

    @include('partials.footer')
</body>
</html>

