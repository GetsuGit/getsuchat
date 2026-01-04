<?php

namespace App\Http\Controllers;

use App\Models\GetsuChat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GetsuChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getsuchats = GetsuChat::with('user')
            ->latest()
            ->take(50)  // Limit to 50 most recent getsuchat
            ->get();

        return view('home', ['getsuchats' => $getsuchats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chat!',
            'message.max' => 'chat must be 255 characters or less.',
        ]);

        $user = $request->user();

        $user->getsuchats()->create($validated);

        return redirect('/')->with('success', 'Yeah chat kamu berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GetsuChat $getsuchat)
    {

        // Pastikan Anda melakukan otorisasi agar orang lain tidak bisa edit chat orang lain
        $this->authorize('update', $getsuchat);

        // Variabel yang dikirim ke view harus bernama 'chat' 
        // karena di file Blade Anda memanggil {{ $chat->id }}
        return view('editchats.edit', ['chat' => $getsuchat]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, GetsuChat $getsuchat)
    {
        // menjalankan GetsuChatPlocy@update
        $this->authorize('update', $getsuchat);

        // Validate
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Update
        $getsuchat->update($validated);

        return redirect('/')->with('success', 'Chat kamu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GetsuChat $getsuchat)
    {
        $this->authorize('delete', $getsuchat);

        $getsuchat->delete();

        return redirect('/')->with('success', 'Ok chat kamu sudah di hapus');
    }
}
