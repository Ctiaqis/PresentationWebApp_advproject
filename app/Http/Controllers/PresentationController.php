<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;

class PresentationController extends Controller
{
    public function show(string $key)
    {
        $tutorial = Tutorial::where('presentation_key', $key)->firstOrFail();

        $details = $tutorial->details()
            ->where('status', 'show')
            ->orderBy('order_number')
            ->get();

        return view('presentation.show', compact('tutorial', 'details'));
    }
}