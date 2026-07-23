@extends('layouts.main')

@section('title', 'Detail Post - ' . $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-secondary">Detail Post</h3>
            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning text-white">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>

        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                <h4 class="fw-bold mb-0 text-primary">{{ $post->title }}</h4>
                @if ($post->status === 'published')
                    <span class="badge bg-success fs-6"><i class="bi bi-check-circle me-1"></i>Published</span>
                @else
                    <span class="badge bg-secondary fs-6"><i class="bi bi-pencil me-1"></i>Draft</span>
                @endif
            </div>

            <p class="text-muted small mb-3">
                <i class="bi bi-calendar3 me-1"></i> Dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}
            </p>

            @if ($post->image)
                <div class="mb-4 text-center bg-light p-2 rounded">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: contain;">
                </div>
            @endif

            <div class="bg-light p-3 rounded text-dark fs-6" style="white-space: pre-line; line-height: 1.7;">
                {{ $post->content }}
            </div>
        </div>
    </div>
</div>
@endsection
