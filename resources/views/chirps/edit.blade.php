<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h4 class="fw-bold mb-3">Edit Chirp</h4>

                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="/chirps/{{ $chirp->id }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" maxlength="255"
                                    required>{{ old('message', $chirp->message) }}</textarea>

                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-outline-secondary btn-sm">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary btn-sm">
                                    Update Chirp
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
