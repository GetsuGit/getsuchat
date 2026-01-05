<?php

namespace App\Http\Controllers;

use App\Models\ChatModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GetsuChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chatindexs = ChatModel::with('user')
            ->latest()
            ->take(50)  // Limit to 50 most recent chat
            ->get();

        return view('home', ['chatmodels' => $chatindexs]);
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
        $validated = $request->validate(
            [
                'message' => 'required|string|max:255',
            ],
            [
                'message.required' => 'Isi dulu chat mu bro',
                'message.max' => 'chat mu melebihi batas karakter.',
            ]
        );

        $user = $request->user();

        $user->userchats()->create($validated);

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
    public function edit(ChatModel $chatmodel)
    {

        // Pastikan Anda melakukan otorisasi agar orang lain tidak bisa edit chat orang lain
        $this->authorize('update', $chatmodel);

        // Variabel yang dikirim ke view harus bernama 'chat' 
        // karena di file Blade Anda memanggil {{ $chat->id }}
        return view('editchats.edit', ['chat' => $chatmodel]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, ChatModel $chatmodel)
    {
        // menjalankan GetsuChatPlocy@update
        $this->authorize('update', $chatmodel);

        // Validate
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Update
        $chatmodel->update($validated);

        return redirect('/')->with('success', 'Chat kamu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatModel $chatmodel)
    {
        $this->authorize('delete', $chatmodel);

        $chatmodel->delete();

        return redirect('/')->with('success', 'Ok chat kamu sudah di hapus');
    }
}
