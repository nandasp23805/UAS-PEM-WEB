@extends('layouts.main')

@section('title', 'Daftar Post')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-secondary">Daftar Post</h3>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Post Baru
    </a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col" style="width: 15%">Gambar</th>
                    <th scope="col" style="width: 35%">Judul</th>
                    <th scope="col" style="width: 15%">Status</th>
                    <th scope="col" style="width: 30%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $index => $post)
                    <tr>
                        <td>{{ $posts->firstItem() + $index }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="table-img">
                            @else
                                <div class="table-img bg-light d-flex align-items-center justify-content-center text-muted border">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong class="d-block text-dark">{{ $post->title }}</strong>
                            <small class="text-muted">{{ Str::limit($post->content, 60) }}</small>
                        </td>
                        <td>
                            @if ($post->status === 'published')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Published</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-pencil me-1"></i>Draft</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus post ini?');">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info text-white me-1">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning text-white me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            Belum ada data post. Silakan klik tombol <strong>Tambah Post Baru</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
</div>
@endsection
