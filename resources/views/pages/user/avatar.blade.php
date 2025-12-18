@extends('layouts.admin.app')

@section('page_title', 'Upload Avatar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Upload Foto Profil</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('user.avatar.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="text-center mb-4">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('images/profiles/' . Auth::user()->avatar) }}" 
                                     alt="Avatar" class="rounded-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" 
                                     alt="Placeholder Avatar" class="rounded-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover; opacity: 0.7;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" 
                                   accept="image/jpeg,image/png,image/jpg" required onchange="previewImage(this)">
                            <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Upload Foto</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection