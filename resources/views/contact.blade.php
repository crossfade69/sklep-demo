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
                        <h1 class="display-4 text-white">Skontaktuj się z Nami</h1>
                        <p class="lead text-light">Jesteśmy do Twojej dyspozycji 5 dni w tygodniu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="row mb-5">
                <!-- Left Column - Contact Info -->
                <div class="col-lg-6">
                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-map-marker-alt"></i> Dane Kontaktowe</h2>
                        </div>
                        <div class="card-body">
                            <div class="contact-info">
                                <h3 class="text-primary"><i class="fas fa-clock"></i> Godziny otwarcia</h3>
                                <p>Poniedziałek - Piątek: 07:00 - 15:00</p>
                                <p>Sobota - Niedziela: Nieczynne</p>

                                <h3 class="text-primary mt-4"><i class="fas fa-warehouse"></i> Lokalizacje</h3>
                                <div class="address-section">
                                    <p class="mb-1"><strong>Sklep i magazyn:</strong></p>
                                    <p>Ul. Stara Droga 40<br>62-002 Suchy Las</p>
                                    
                                    <p class="mb-1 mt-3"><strong>Drugi magazyn:</strong></p>
                                    <p>Ul. Klonowa 16<br>62-002 Suchy Las</p>
                                </div>

                                <h3 class="text-primary mt-4"><i class="fas fa-phone"></i> Kontakt</h3>
                                <p class="mb-1">Tel: +48 61 811 59 15</p>
                                <p class="mb-1">Fax: +48 61 811 59 30</p>
                                <p>Email: <a href="mailto:biuro@dombud-plus.pl" class="text-primary">biuro@dombud-plus.pl</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Contact Form -->
                <div class="col-lg-6">
                    <div class="info-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-envelope"></i> Formularz Kontaktowy</h2>
                        </div>
                        <div class="card-body">
                            <form action="https://sklepdemo.fundacjaglosmlodych.org/contact" method="POST">
                                <input type="hidden" name="_token" value="Hj1uU3Z7Ih39T3VOyVEuMconKGnArk5ipLUf6evd" autocomplete="off">
                                <div class="form-group mb-3">
                                    <label for="name">Imię i Nazwisko</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Jan Kowalski" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Adres Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="jan.kowalski@example.com" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="subject">Temat</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Temat wiadomości" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="contact_message">Wiadomość</label>
                                    <textarea id="contact_message" name="contact_message" class="form-control" rows="5" placeholder="Wpisz swoją wiadomość..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Wyślij wiadomość</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="info-card">
                        <div class="card-header bg-primary text-white">
                            <h2><i class="fas fa-map-marked-alt"></i> Nasza Lokalizacja</h2>
                        </div>
                        <div class="card-body p-0">
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2399.592425273145!2d16.85982151597265!3d53.07813806907685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4704152e2a1a1b4d%3A0x15b15b727c64c6e2!2sUl.%20Stara%20Droga%2040%2C%2062-002%20Suchy%20Las!5e0!3m2!1spl!2spl!4v1627548978381!5m2!1spl!2spl" 
                                        width="100%" 
                                        height="450" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy">
                                </iframe>
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