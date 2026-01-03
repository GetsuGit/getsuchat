@props(['chirp'])

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <div class="card bg-dark text-light border-secondary">
            <div class="card-body">
                <div class="d-flex">
                    <!-- Avatar -->
                    <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}?vibe=ocean"
                        alt="{{ $chirp->user->name }}'s avatar" class="rounded-circle me-3" width="40" height="40">

                    <!-- Content -->
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>{{ $chirp->user->name }}</strong>
                                <span class="text-muted ms-1">· {{ $chirp->created_at->diffForHumans() }}</span>

                                @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                                    <span class="text-muted fst-italic">· edited</span>
                                @endif
                            </div>

                            @if (auth()->check() && auth()->id() === $chirp->user_id)
                                <div class="btn-group btn-group-sm align-self-start">

                                    <form method="POST" action="/chirps/{{ $chirp->id }}" class="d-inline">
                                        <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-dark">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark"
                                            onclick="return confirm('Are you sure you want to delete this chirp?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        <p class="mt-2 mb-0">
                            {{ $chirp->message }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
