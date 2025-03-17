<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.header')

    <main>
        <!-- Hero Section -->
        <div class="container-fluid hero-section mb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center py-5">
                        <h1 class="display-4 text-white">Poznaj Naszą Firmę</h1>
                        <p class="lead text-light">25 lat doświadczenia w branży budowlanej</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="row mb-5">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-info-circle"></i> O Nas</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Witaj w DOM-BUD PLUS, liderze w dostarczaniu najwyższej jakości materiałów budowlanych i wykończeniowych. 
                                Oferujemy szeroki asortyment produktów od renomowanych producentów, dbając o jakość i trwałość każdej budowy.
                            </p>
                        </div>
                    </div>

                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-history"></i> Nasza Historia</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Firma DOM-BUD PLUS działa od 1999 roku, z sukcesem zaopatrując rynek w materiały budowlane. 
                                Nasza współpraca z krajowymi i zagranicznymi producentami gwarantuje najwyższą jakość oferowanych produktów.
                            </p>
                        </div>
                    </div>

                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-bullseye"></i> Nasza Misja</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Naszą misją jest dostarczanie kompleksowych rozwiązań budowlanych o najwyższej jakości. 
                                Oferujemy profesjonalne doradztwo oraz wsparcie na każdym etapie budowy.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-users"></i> Nasz Zespół</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Zespół DOM-BUD PLUS to doświadczeni specjaliści z wiedzą techniczną i praktycznym doświadczeniem. 
                                Każdy projekt traktujemy indywidualnie, zapewniając kompleksowe wsparcie.
                            </p>
                        </div>
                    </div>

                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-tools"></i> Nasze Usługi</h2>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Transport materiałów budowlanych</li>
                                <li class="list-group-item">Profesjonalne doradztwo techniczne</li>
                                <li class="list-group-item">Kompleksowa obsługa budów</li>
                                <li class="list-group-item">Rozładunek HDS-em</li>
                            </ul>
                        </div>
                    </div>

                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-envelope"></i> Kontakt</h2>
                        </div>
                        <div class="card-body">
                            <div class="contact-info">
                                <p><i class="fas fa-phone"></i> +48 61 811 59 15</p>
                                <p><i class="fas fa-envelope"></i> biuro@dombud-plus.pl</p>
                                <p><i class="fas fa-map-marker-alt"></i> ul. Budowlana 15, 60-001 Poznań</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Sections -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="achievements-section">
                        <h3 class="text-center mb-4">Nasze Osiągnięcia</h3>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="achievement-item p-3">
                                    <i class="fas fa-award fa-3x text-primary"></i>
                                    <h4 class="mt-2">25+ Lat Doświadczenia</h4>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="achievement-item p-3">
                                    <i class="fas fa-building fa-3x text-primary"></i>
                                    <h4 class="mt-2">500+ Zrealizowanych Projektów</h4>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="achievement-item p-3">
                                    <i class="fas fa-users-cog fa-3x text-primary"></i>
                                    <h4 class="mt-2">Wykwalifikowany Zespół</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>