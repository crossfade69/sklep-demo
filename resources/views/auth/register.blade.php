<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
    @include('partials.header')

    <main>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="card p-4 shadow-lg" style="border-radius: 15px; max-width: 800px; width: 100%;">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">{{ __('Rejestracja') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-user"></i> {{ __('Nazwa użytkownika') }}
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-envelope"></i> {{ __('Adres email') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-lock"></i> {{ __('Hasło') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-check-circle"></i> {{ __('Potwierdź hasło') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Zarejestruj się') }}
                                </button>

                                <div class="mt-3 text-center">
                                    <span>{{ __('Masz już konto?') }}</span>
                                    <a class="text-decoration-none" href="{{ route('login') }}">
                                        {{ __('Zaloguj się') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
</body>
</html>