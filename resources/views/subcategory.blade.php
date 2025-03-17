<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.header')

    <main>
        <div class="container mt-4 mb-5">
            <div class="row">
                <!-- Category menu -->
                <div class="col-md-3 d-none d-md-block">
                    <div class="list-group">
                        @foreach($categories as $category)
                            @php
                                $isCategoryActive = $category->id === optional($current_category)->id ||
                                                    $category->id === optional(optional($current_subcategory)->category)->id;
                            @endphp
                            
                            <a href="{{ route('category.show', $category) }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between {{ $isCategoryActive ? 'active' : '' }}">
                                {{ $category->name }}
                                @if($category->subcategories->isNotEmpty())
                                    <i class="fas {{ $isCategoryActive ? 'fa-chevron-down' : 'fa-chevron-right' }}"></i>
                                @endif
                            </a>

                            @if($category->subcategories->isNotEmpty() && $isCategoryActive)
                                <div class="list-group ms-3">
                                    @foreach($category->subcategories as $subcategory)
                                        <a href="{{ route('subcategory.show', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}"
                                        class="list-group-item list-group-item-action {{ optional($current_subcategory)->id === $subcategory->id ? 'active' : '' }}">
                                            {{ $subcategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Product listing -->
                <div class="col-md-9">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if($current_subcategory)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category.show', $current_category) }}">
                                        {{ $current_category->name }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $current_subcategory->name }}
                                </li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $current_category->name }}
                                </li>
                            @endif
                        </ol>
                    </nav>

                    <h2 class="mb-4">{{ $current_category->name }}</h2>
                    
                    <div class="row">
                        @forelse($products as $product)
                            <!-- Product card (pozostaje bez zmian) -->
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">Brak produktów w tej kategorii</div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
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