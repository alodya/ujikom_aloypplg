<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
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
            'description' => $request->description,
            'user_id' => Auth::id(), // Menambahkan user_id berdasarkan pengguna yang sedang login
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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            $image = $request->file('image');
            $path = $image->store('galleries', 'public');
            $data['image'] = $path;
        }

        $gallery->update($data);

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
