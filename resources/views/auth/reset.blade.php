<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">
    @include('partials.header')

    <main>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="card p-4 shadow-lg" style="border-radius: 15px; max-width: 800px; width: 100%;">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0"><i class="fas fa-key me-2"></i>{{ __('Resetowanie Hasła') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>{{ __('Adres Email') }}
                            </label>
                            <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ $email ?? old('email') }}"
                                required 
                                autocomplete="email" 
                                autofocus>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nowe Hasło -->
                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i>{{ __('Nowe Hasło') }}
                            </label>
                            <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Potwierdź Hasło -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">
                                <i class="fas fa-lock me-2"></i>{{ __('Potwierdź Hasło') }}
                            </label>
                            <input id="password-confirm" type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password">
                        </div>

                        <!-- Przycisk Resetuj -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sync-alt me-2"></i>{{ __('Zresetuj Hasło') }}
                            </button>
                        </div>

                        <!-- Powrót do logowania -->
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                <i class="fas fa-arrow-left me-2"></i>{{ __('Powrót do logowania') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>

<style>
    .card {
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(10px);
    }
    .form-control {
        border-radius: 8px;
        padding: 12px 20px;
    }
    .form-control:focus {
        border-color: #9b59b6;
        box-shadow: 0 0 0 0.25rem rgba(155, 89, 182, 0.25);
    }
    .btn-primary {
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>