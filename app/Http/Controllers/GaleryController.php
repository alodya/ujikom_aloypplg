<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);

        $image = $request->file('image');
        $path = $image->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $path,
            'description' => $request->description
        ]);

        return redirect()->route('gallery')
            ->with('success', 'Foto berhasil ditambahkan ke galeri');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'date' => 'required|date'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            // Store new image
            $path = $request->file('image')->store('galleries', 'public');
            $gallery->image = $path;
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date
        ]);

        return redirect()->route('gallery')
            ->with('success', 'Foto berhasil diperbarui');
    }

    public function destroy(Gallery $gallery)
    {
        if($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();
        
        return redirect()->route('gallery')
            ->with('success', 'Foto berhasil dihapus dari galeri');
    }
}
