<x-navlayout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-2 bg-dark text-light border-secondary">
                    <div class="card-body">
                        <form method="POST" action="/chatmodel">
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                @forelse ($chatmodels as $getsuchat)
                    <x-chat :chat="$getsuchat" />
                @empty
                    <div class="text-center">
                        <hr class="border-secondary mb-4">
                        <p class="text-white-50 Info">Kamu belum bikin status, ayo bikin status mu !</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-navlayout>
