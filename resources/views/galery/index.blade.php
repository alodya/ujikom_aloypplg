<!-- resources/views/informasi/index.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Informasi</h2>
<a href="{{ route('informasi.create') }}">Tambah Informasi</a>
@foreach ($informasi as $info)
    <p>{{ $info->judul }}</p>
    <a href="{{ route('informasi.edit', $info->id) }}">Edit</a>
    <form action="{{ route('informasi.destroy', $info->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endforeach
@endsection
