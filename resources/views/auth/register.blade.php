<x-navlayout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card shadow bg-dark text-light border-secondary">
                    <div class="card-body p-4">

                        <h1 class="text-center fw-bold mb-4">Create Account</h1>

                        <form method="POST" action="/register">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name"
                                    class="form-control bg-dark text-light border-secondary @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control bg-dark text-light border-secondary @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
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

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control bg-dark text-light border-secondary" required>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary w-100">
                                Register
                            </button>
                        </form>

                        <hr class="my-4">

                        <p class="text-center mb-0">
                            Already have an account?
                            <a href="/login">Sign in</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-navlayout>
