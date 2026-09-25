@extends('layout.dashboard_admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Edit Video Parenting</h2>
        <a href="{{ route('admin.parenting.index') }}" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.parenting.video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Video</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $video->title) }}" placeholder="Contoh: Cara Mengukur Tumbuh Kembang Anak" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $video->category) }}" placeholder="Contoh: Tumbuh Kembang" required>
                </div>

                <div class="mb-3">
                    <label for="instructor" class="form-label fw-semibold">Pemateri / Instruktur</label>
                    <input type="text" class="form-control" id="instructor" name="instructor" value="{{ old('instructor', $video->instructor) }}" placeholder="Contoh: dr. Nitish Basant Adnani, B.Med.Sc,Sp. A" required>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label fw-semibold">Durasi Video</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $video->duration) }}" placeholder="Contoh: 15 Menit atau 10:45" required>
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label fw-semibold">Link Video (YouTube URL / Embed)</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $video->video_url) }}" placeholder="Contoh: https://youtu.be/..." required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi Video</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Tuliskan ringkasan isi video...">{{ old('description', $video->description ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail Video</label>
                    @if($video->thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail" style="width: 120px; height: 70px; object-fit: cover; border-radius: 6px;">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah thumbnail. Format: JPG, PNG, JPEG.</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.parenting.index') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-success px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection