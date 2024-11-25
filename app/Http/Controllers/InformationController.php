<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        $information = Information::latest()->get();
        return view('information.index', compact('information'));
    }

    public function create()
    {
        return view('information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'content', 'date']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('information', 'public');
            $data['image'] = $path;
        }

        Information::create($data);

        return redirect()->route('information')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit(Information $information)
    {
        return view('information.edit', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'content', 'date']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($information->image) {
                Storage::disk('public')->delete($information->image);
            }
            
            $image = $request->file('image');
            $path = $image->store('information', 'public');
            $data['image'] = $path;
        }

        $information->update($data);

        return redirect()->route('information')
            ->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy(Information $information)
    {
        if ($information->image) {
            Storage::disk('public')->delete($information->image);
        }
        
        $information->delete();

        return redirect()->route('information')
            ->with('success', 'Informasi berhasil dihapus');
    }
}
