<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = Tutorial::latest()->get();

        return view('tutorials.index', compact('tutorials'));
    }

   public function create()
{
    $makul = $this->getMakul();

    return view('tutorials.create', compact('makul'));
}

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'max:255'],
            'kode_matkul' => ['required', 'max:50'],
            'nama_matkul' => ['nullable', 'max:255'],
        ]);

        $slug = Str::slug($request->judul);

        $presentationKey = $slug . '-' . Str::random(16);
        $finishedKey = $slug . '-' . Str::random(16);

        Tutorial::create([
            'judul' => $request->judul,
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'presentation_key' => $presentationKey,
            'finished_key' => $finishedKey,
            'url_presentation' => url('/presentation/' . $presentationKey),
            'url_finished' => url('/finished/' . $finishedKey),
            'creator_email' => session('creator_email'),
        ]);

        return redirect()
            ->route('tutorials.index')
            ->with('success', 'Master tutorial berhasil ditambahkan.');
    }

    public function show(Tutorial $tutorial)
    {
        return redirect()->route('tutorials.index');
    }

    public function edit(Tutorial $tutorial)
    {
        $makul = $this->getMakul();

        return view('tutorials.edit', compact('tutorial', 'makul'));
    }

    public function update(Request $request, Tutorial $tutorial)
    {
        $request->validate([
            'judul' => ['required', 'max:255'],
            'kode_matkul' => ['required', 'max:50'],
            'nama_matkul' => ['nullable', 'max:255'],
        ]);

        $tutorial->update([
            'judul' => $request->judul,
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
        ]);

        return redirect()
            ->route('tutorials.index')
            ->with('success', 'Master tutorial berhasil diubah.');
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return redirect()
            ->route('tutorials.index')
            ->with('success', 'Master tutorial berhasil dihapus.');
    }

    private function getMakul(): array
    {
        $token = session('refreshToken');

        if (!$token) {
            return [];
        }

        $response = Http::withToken($token)
            ->get('https://jwt-auth-eight-neon.vercel.app/getMakul');

        if (!$response->successful()) {
            return [];
        }

        return $response->json('data') ?? [];
    }
}