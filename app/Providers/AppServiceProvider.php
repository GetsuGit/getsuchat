<?php

namespace App\Providers;

use App\Models\GetsuChat;
use App\Policies\GetsuChatPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Tambahkan baris ini untuk mendaftarkan Policy secara manual
        Gate::policy(GetsuChat::class, GetsuChatPolicy::class);
    }
}
