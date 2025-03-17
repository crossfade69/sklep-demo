<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <!-- Add your CSS and JavaScript links here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: 0;
        margin-left: 0.5rem;
        border: 1px solid #ddd;
        background: white;
    }

    .dropdown-submenu:hover .submenu {
        display: block;
    }
</style>
<body>
    <header>
        <!-- Add your header content here -->
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('promotions') }}">Promotions</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Add your footer content here -->
        <p>&copy; {{ date('Y') }} My Application</p>
    </footer>

    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".category-toggle").forEach(function (category) {
            category.addEventListener("click", function (e) {
                e.preventDefault();
                let submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle("show");
                }
            });
        });
    });

</script>
</html>