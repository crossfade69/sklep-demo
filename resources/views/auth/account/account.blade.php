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
                            <h1 class="card-title mb-4">Witaj, {{ Auth::user()->name }}!</h1>
                            <p class="lead mb-4">Tu możesz zarządzać swoim kontem, przeglądać historię zamówień oraz aktualizować swoje dane.</p>
                            
                            <div class="orders-section">
                                <h2 class="mb-4"><i class="fas fa-history me-2"></i>Ostatnie zamówienia</h2>
                                <div class="list-group">
                                    <!-- Tutaj będą pojawiać się nowe zamówienia -->
                                </div>
                            </div>
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