<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\TutorialDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorialDetailController extends Controller
{
    public function index(Tutorial $tutorial)
    {
        $details = $tutorial->details()
            ->orderBy('order_number')
            ->get();

        return view('details.index', compact('tutorial', 'details'));
    }

    public function create(Tutorial $tutorial)
    {
        return view('details.create', compact('tutorial'));
    }

    public function store(Request $request, Tutorial $tutorial)
    {
        $request->validate([
            'text' => ['nullable'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'code' => ['nullable'],
            'url' => ['nullable', 'url'],
            'order_number' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:show,hide'],
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('tutorial-images', 'public');
        }

        $tutorial->details()->create([
            'text' => $request->text,
            'gambar' => $gambarPath,
            'code' => $request->code,
            'url' => $request->url,
            'order_number' => $request->order_number,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('tutorials.details.index', $tutorial)
            ->with('success', 'Detail tutorial berhasil ditambahkan.');
    }

    public function edit(Tutorial $tutorial, TutorialDetail $detail)
    {
        if ($detail->tutorial_id !== $tutorial->id) {
            abort(404);
        }

        return view('details.edit', compact('tutorial', 'detail'));
    }

    public function update(Request $request, Tutorial $tutorial, TutorialDetail $detail)
    {
        if ($detail->tutorial_id !== $tutorial->id) {
            abort(404);
        }

        $request->validate([
            'text' => ['nullable'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'code' => ['nullable'],
            'url' => ['nullable', 'url'],
            'order_number' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:show,hide'],
        ]);

        $data = [
            'text' => $request->text,
            'code' => $request->code,
            'url' => $request->url,
            'order_number' => $request->order_number,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            if ($detail->gambar) {
                Storage::disk('public')->delete($detail->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('tutorial-images', 'public');
        }

        $detail->update($data);

        return redirect()
            ->route('tutorials.details.index', $tutorial)
            ->with('success', 'Detail tutorial berhasil diubah.');
    }

    public function destroy(Tutorial $tutorial, TutorialDetail $detail)
    {
        if ($detail->tutorial_id !== $tutorial->id) {
            abort(404);
        }

        if ($detail->gambar) {
            Storage::disk('public')->delete($detail->gambar);
        }

        $detail->delete();

        return redirect()
            ->route('tutorials.details.index', $tutorial)
            ->with('success', 'Detail tutorial berhasil dihapus.');
    }
}