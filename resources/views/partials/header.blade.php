<header>
    <!-- Contact Info Section -->
    <div class="contact-info-header d-flex justify-content-center align-items-center bg-light py-2">
        <div class="contact-info-item me-4"> 
            <a href="tel:+48123456789" class="contact-info-link text-dark d-flex align-items-center">
                <img src="https://sklepdemo.fundacjaglosmlodych.org/img/phone_icon.png" alt="Telefon" class="me-2" style="width: 20px; height: 20px;">
                <span>+48 61 811 59 15</span>
            </a>
        </div>
        
        <div class="contact-info-item">
            <a href="mailto:sklep@budowlany.pl" class="contact-info-link text-dark d-flex align-items-center">
                <img src="https://sklepdemo.fundacjaglosmlodych.org/img/email_icon.png" alt="Email" class="me-2" style="width: 20px; height: 20px;">
                <span>biuro@dombud-plus.pl</span>
            </a>
        </div>
    </div>

    <!-- Header Main Content -->
    <div class="header-container d-flex justify-content-between align-items-center py-3 px-4">
        <div class="logo">
            <a href="/">
                <img src="https://sklepdemo.fundacjaglosmlodych.org/img/file.png" alt="Logo" class="img-fluid" style="max-height: 50px;">
            </a>
        </div>
        <div class="header-search mx-3" style="width: 500px;">
            <input type="text" class="form-control" placeholder="Szukaj...">
        </div>
        
        <div class="header-icons d-flex align-items-center justify-content-center" style="margin-left: auto; margin-right: auto;">
            @auth
                <!-- Konto użytkownika -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('account') }}" class="d-flex align-items-center text-decoration-none">
                        <img src="https://sklepdemo.fundacjaglosmlodych.org/img/user_icon.png" alt="Moje konto" class="me-2" style="width: 20px; height: 20px;">
                        <span class="text-dark">{{ Auth::user()->name }}</span>
                    </a>
                    
                    <!-- Przycisk wylogowania -->
                    <form method="POST" action="{{ route('logout') }}" class="ms-3">
                        @csrf
                        <button type="submit" class="btn btn-link text-dark p-0" style="text-decoration: none;">
                            <i class="fas fa-sign-out-alt"></i> Wyloguj
                        </button>
                    </form>
                </div>
            @else
                <!-- Logowanie -->
                <a href="{{ route('login') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="https://sklepdemo.fundacjaglosmlodych.org/img/user_icon.png" alt="Moje konto" class="me-2" style="width: 20px; height: 20px;">
                    <span class="text-dark">Logowanie</span>
                </a>
            @endauth

            <!-- Koszyk -->
            <a href="{{ route('cart') }}" class="ms-3 text-decoration-none">
                <img src="https://sklepdemo.fundacjaglosmlodych.org/img/cart_icon.png" alt="Koszyk" style="width: 20px; height: 20px;">
                <span id="cart-count" class="text-dark">0</span>
            </a>
        </div>
       
    </div>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Produkty -->
                    <li class="nav-item dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown">
                            Produkty
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                            @foreach ($categories as $category)
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item category-toggle" href="{{ url('/category/' . $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                    @if ($category->subcategories->count() > 0)
                                        <ul class="submenu dropdown-menu">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/category/' . $subcategory->slug) }}">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">O nas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>
<style>
.dropdown-menu {
    position: absolute;
    display: none;
}

.dropdown:hover > .dropdown-menu {
    display: block;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .submenu {
    position: absolute;
    top: 0;
    left: 100%;
    display: none;
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-submenu:hover > .submenu {
    display: block;
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-submenu .category-toggle').forEach(function (categoryToggle) {
            categoryToggle.addEventListener('mouseenter', function () {
                let submenu = this.nextElementSibling;
                if (submenu && submenu.classList.contains('submenu')) {
                    submenu.style.display = 'block';
                }
            });

            categoryToggle.addEventListener('mouseleave', function () {
                let submenu = this.nextElementSibling;
                if (submenu && submenu.classList.contains('submenu')) {
                    setTimeout(() => submenu.style.display = 'none', 500);
                }
            });
        });
    });
</script>


</header>
