<x-navlayout>
    <x-slot:title>
        Edit Chat
    </x-slot:title>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h4 class="fw-bold mb-3 Edit">Edit Chat</h4>

                <div class="card bg-dark text-light border-secondary">
                    <div class="card-body">
                        <form method="POST" action="/chatmodel/{{ $chat->id }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" maxlength="255"
                                    required>{{ old('message', $chat->message) }}</textarea>

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
                                    Update Chat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-navlayout>
