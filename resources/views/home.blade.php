<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-2 bg-dark text-light border-secondary">
                    <div class="card-body">
                        <form method="POST" action="/chirps">
                            @csrf
                            <div class="mb-3">
                                <textarea name="message" class="form-control text-light border-secondary @error('message') is-invalid @enderror"
                                    rows="4" maxlength="255" placeholder="Mau bikin status apa ?" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Chat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="fw-bold Chat">Chat sbelumnya</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Feed -->

    <div class="container mt-3">
        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <p class="text-muted">No chirps yet. Be the first to chirp!</p>
        @endforelse
    </div>

</x-layout>
