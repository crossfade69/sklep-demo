<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
    @include('partials.header')

    <main>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="card p-4 shadow-lg" style="border-radius: 15px; max-width: 800px; width: 100%;">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">{{ __('Logowanie') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                    autocomplete="email" 
                                    autofocus>

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
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                        type="checkbox" 
                                        name="remember" 
                                        id="remember" 
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Zapamiętaj mnie') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Zaloguj się') }}
                                </button>

                                <div class="mt-3 text-center">
                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Zapomniałeś hasła?') }}
                                        </a>
                                        <span class="mx-2">|</span>
                                    @endif
                                    <a class="text-decoration-none" href="{{ route('register') }}">
                                        {{ __('Zarejestruj się') }}
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
