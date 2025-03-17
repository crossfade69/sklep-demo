<style>
    /* Your custom styles here */
    @media (max-width: 767.98px) {
        .navbar-nav {
            width: 100%;
            background-color: #f8f9fa;
            position: relative;
        }

        .navbar-nav .nav-item {
            width: 100%;
        }

        .categories-menu {
            display: none;
            width: 100%;
            background-color: #f8f9fa;
            position: absolute;
            top: 100%;
            left: 0;
        }

        .navbar-nav .nav-item.show .categories-menu {
            display: block;
        }

        .subcategory-menu {
            display: none;
            background-color: #e9ecef;
        }

        .category.show .subcategory-menu {
            display: block;
        }
    }

    /* Style for desktop menu */
    @media (min-width: 768px) {
        .categories-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            width: 250px;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0;
        }

        .products-menu:hover .categories-menu {
            display: block;
        }

        .subcategory-menu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0;
        }

        .category:hover .subcategory-menu {
            display: block;
        }

        .dropdown-item {
            padding: 10px;
            display: block;
            color: #000;
            text-decoration: none;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    }

    .carousel-inner .carousel-item {
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .carousel-inner {
        height: 570px;
    }

    .carousel-caption {
        bottom: 20px;
        text-align: center;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        padding: 10px;
    }

    .carousel-caption h5 {
        font-size: 2em;
    }

    .carousel-caption p {
        font-size: 1.2em;
    }

    .product-of-the-day {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        max-width: 100%;
        height: 570px;
        display: flex;
        flex-direction: column;
    }

    .product-of-the-day:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-image {
        max-width: 100%;
        max-height: 300px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .price-highlight {
        color: #007bff;
        font-weight: bold;
        font-size: 1.5em;
    }

    .card-price {
        font-size: 1em;
        color: #6c757d;
    }

    .category-sections {
        margin-top: 50px;
    }

    .category-section {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        display: flex;
    }

    .category-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .category-background {
        background: rgba(133, 32, 12, 1);
        color: white;
        padding: 20px;
        text-align: center;
    }

    .category-background h2 {
        font-size: 1.8em;
        margin: 0;
    }

    .category-content {
        padding: 20px;
        background: #f8f9fa;
        flex: 2;
        overflow-y: auto;
        height: 50vh;
        width: 60%;
    }

    .category-content ul {
        list-style: none;
        padding: 0;
    }

    .category-content ul li {
        margin-bottom: 10px;
    }

    .category-content ul li a {
        text-decoration: none;
        color: rgba(133, 32, 12, 1);
        font-size: 1.1em;
        transition: color 0.3s ease;
    }

    .category-content ul li a:hover {
        color: #0056b3;
    }

    .placeholder-products {
        padding-left: 20px;
        display: flex;
        flex-wrap: wrap;
        height: 60vh;
        width: 60%;
    }

    .placeholder-product {
        width: 30%;
        border-radius: 5px;
        margin: 10px;
        text-align: center;
        position: relative;
        height: 22vh;
    }

    .placeholder-product img {
        width: 80%;
        height: 20vh;
        border-radius: 5px;
        margin: auto;
    }

    .product-title {
        position: absolute;
        left: 10px;
        right: 10px;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px;
        border-radius: 5px;
        margin-top: 21vh;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('{{ asset('img/about-hero.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 400px;
        display: flex;
        align-items: center;
    }

    .hero-section h1 {
        font-size: 3rem;
        color: white;
    }

    .hero-section p {
        font-size: 1.5rem;
        color: white;
    }

    /* Info Cards */
    .info-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        border-radius: 8px 8px 0 0 !important;
        background-color: #007bff;
        color: white;
        padding: 15px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.5em;
    }

    .card-body {
        padding: 20px;
    }

    .card-body p {
        font-size: 1.1em;
        line-height: 1.6;
        color: #333;
    }

    .contact-info p {
        margin-bottom: 1rem;
        font-size: 1.1em;
    }

    .contact-info i {
        margin-right: 10px;
        width: 25px;
    }

    /* Achievements Section */
    .achievements-section {
        background-color: #f8f9fa;
        padding: 2rem;
        border-radius: 8px;
        margin-top: 50px;
    }

    .achievement-item {
        border: 2px solid #007bff;
        border-radius: 8px;
        transition: all 0.3s ease;
        padding: 20px;
        text-align: center;
    }

    .achievement-item:hover {
        background-color: #e9f5ff;
        transform: scale(1.05);
    }

    .achievement-item i {
        font-size: 3rem;
        color: #007bff;
    }

    .achievement-item h4 {
        margin-top: 10px;
        font-size: 1.2em;
        color: #333;
    }

    @media (max-width: 1101px) {
        .category-section {
            display: block;
            width: 100%;
            margin-bottom: 20px;
        }

        .product-title {
            margin-top: -40px !important;
        }

        .category-background {
            display: block !important;
            width: 100% !important;
            text-align: center;
        }

        .category-content {
            display: none;
        }

        .placeholder-products {
            padding-left: 0;
            display: block;
            height: 50vh;
            overflow-x: auto;
            width: 100%;
        }

        .placeholder-product {
            width: 100%;
            margin: 5vh 0;
            height: 20vh;
        }

        
    }

    /* Contact Page Styles */
    .contact-info p {
        margin-bottom: 1rem;
        font-size: 1.1em;
        color: #333;
    }

    .contact-info h2 {
        font-size: 1.5em;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #007bff;
    }

    .contact-info a {
        color: #007bff;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }

    .info-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .map-container {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }

    .map-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }

    @media (max-width: 768px) {
        .contact-info h2 {
            font-size: 1.3em;
        }

        .contact-info p {
            font-size: 1em;
        }

        .map-container iframe {
            height: 300px;
        }
    }

    /* Login Page Styles */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('{{ asset('img/login-hero.jpg') }}');
        background-size: cover;
        background-position: center;
    }

    .info-card {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .form-control {
        padding: 12px 15px;
        border: 2px solid #dee2e6;
        border-radius: 6px;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    }

    .btn-lg {
        padding: 12px 20px;
        font-size: 1.1rem;
        border-radius: 6px;
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-section p {
            font-size: 1rem;
        }
        
        .info-card {
            margin: 0 15px;
        }
        
        .form-control {
            font-size: 0.9rem;
        }
    }
</style>