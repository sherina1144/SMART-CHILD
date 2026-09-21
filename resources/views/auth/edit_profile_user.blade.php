<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Smart Child</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; }
        body { background-color: #f4f1ea; color: #285B4D; line-height: 1.6; }
        
        .edit-container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .edit-card {
            background: #faf8f5;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(40, 91, 77, 0.06);
            border: 1px solid #e2ddd3;
        }
        .edit-header {
            margin-bottom: 25px;
            border-bottom: 2px solid #d4cebe;
            padding-bottom: 15px;
        }
        .edit-header h2 {
            font-size: 1.5rem;
            color: #285B4D;
            font-weight: 700;
        }
        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #285B4D;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px 16px;
            background: #f4f1ea;
            border: 1px solid #d4cebe;
            border-radius: 10px;
            font-size: 0.95rem;
            color: #285B4D;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #285B4D;
        }
        .btn-save {
            background: #285B4D;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-save:hover {
            opacity: 0.9;
        }
        .btn-cancel {
            background: #e9e4d5;
            color: #285B4D;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-block;
            border: 1px solid #d4cebe;
        }
    </style>
</head>
<body>

    @include('layout.header')

    <div class="edit-container">
        <div class="edit-card">
            
            <div class="edit-header">
                <h2>Edit Profil</h2>
            </div>

            @if ($errors->any())
                <div style="background: #fde8e8; color: #9b1c1c; padding: 12px 18px; border-radius: 10px; margin-bottom: 25px; border: 1px solid #f8b4b4;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Upload Foto -->
                <div style="margin-bottom: 25px; display: flex; align-items: center; gap: 20px; background: #f4f1ea; padding: 20px; border-radius: 12px; border: 1px solid #d4cebe;">
                    <div>
                        @if($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Preview" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #285B4D;">
                        @else
                            <div style="width: 80px; height: 80px; border-radius: 50%; background: #e9e4d5; display: flex; align-items: center; justify-content: center; color: #285B4D; font-size: 30px; border: 2px solid #285B4D;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <label style="margin-bottom: 4px;">Ganti Foto Profil</label>
                        <input type="file" name="foto" style="font-size: 0.9rem; color: #285B4D;">
                        <small style="display: block; color: #4a6b5d; margin-top: 4px; font-size: 0.75rem;">Format: JPG, JPEG, PNG (Maks. 2MB)</small>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required>
                    </div>
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label>Email (Sesuai Login)</label>
                        <input type="email" value="{{ $user->email }}" disabled style="background: #e9e4d5; color: #7a8c84; cursor: not-allowed;">
                        <small style="color: #7a8c84; font-size: 0.75rem; margin-top: 2px; display: block;">Email tidak dapat diubah.</small>
                    </div>
                    <div>
                        <label>Nomor Handphone</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Kota</label>
                    <input type="text" name="kota" value="{{ old('kota', $user->kota) }}">
                </div>

                <div style="margin-bottom: 30px;">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <div style="display: flex; gap: 12px;">
                    <button type="submit" class="btn-save">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('profile.show') }}" class="btn-cancel">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>