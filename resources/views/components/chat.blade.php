@props(['chat'])

<div class="card bg-dark text-light border-secondary mb-3 shadow-sm">
    <div class="card-body">
        <div class="d-flex">
            <!-- Avatar -->
            <img src="https://avatars.laravel.cloud/{{ urlencode($chat->user->email) }}?vibe=ocean"
                alt="{{ $chat->user->name }}'s avatar" class="rounded-circle me-3" width="40" height="40">

            <!-- Content -->
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <strong>{{ $chat->user->name }}</strong>
                        <span class="text-muted ms-1 History">· {{ $chat->created_at->diffForHumans() }}</span>

                        @if ($chat->updated_at->gt($chat->created_at->addSeconds(5)))
                            <span class="text-muted fst-italic History">· edited</span>
                        @endif
                    </div>

                    @if (auth()->check() && auth()->id() === $chat->user_id)
                        <div class="btn-group btn-group-sm align-self-start">

                            <form method="POST" action="/getsuchats/{{ $chat->id }}" class="d-inline">
                                <a href="/getsuchats/{{ $chat->id }}/edit" class="btn btn-dark">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark"
                                    onclick="return confirm('Wah Mau hapus chat ini ?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <p class="mt-2 mb-0">
                    {{ $chat->message }}
                </p>
            </div>
        </div>
    </div>
</div>
