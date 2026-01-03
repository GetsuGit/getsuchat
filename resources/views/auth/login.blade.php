<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card shadow bg-dark text-light border-secondary">
                    <div class="card-body p-4">

                        <h1 class="text-center fw-bold mb-4">Welcome Back</h1>

                        <form method="POST" action="/login">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control bg-dark text-light border-secondary @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control bg-dark text-light border-secondary @error('password') is-invalid @enderror"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary w-100">
                                Sign In
                            </button>
                        </form>

                        <hr class="my-4">

                        <p class="text-center mb-0">
                            Don't have an account?
                            <a href="/register">Register</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
