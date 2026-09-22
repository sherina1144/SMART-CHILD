<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Partnership - Smart Child</title>
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc;">

    @include('layout.header')

    <div style="min-height: 80vh; padding: 40px 20px;">
        <div style="max-width: 650px; margin: 0 auto; background: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); overflow: hidden;">
            
            <!-- Card Header -->
            <div style="background-color: #285B4D; color: white; padding: 25px 30px; display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h3 style="margin: 0; font-size: 20px; font-weight: 700;">Form Pendaftaran Partnership</h3>
                    <p style="margin: 5px 0 0 0; font-size: 13px; opacity: 0.9;">Daftarkan instansi Anda sebagai <strong>{{ $type }} Partner</strong></p>
                </div>
                <a href="{{ route('user.partnership') }}" style="background: rgba(255, 255, 255, 0.2); color: white; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Card Body / Form -->
            <div style="padding: 30px;">
                
                @if ($errors->any())
                    <div style="background-color: #f8d7da; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                        <ul style="margin: 0; padding-left: 15px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('partnership.store') }}" method="POST">
                    @csrf

                    <!-- Hidden Type Partner -->
                    <input type="hidden" name="tipe_partner" value="{{ $type }}">

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #2d3748; margin-bottom: 8px;">Nama Instansi / Sekolah / Perusahaan</label>
                        <input type="text" name="nama_instansi" value="{{ old('nama_instansi') }}" placeholder="Masukan nama instansi" required style="width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;">
                    </div>

                    <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 13px; font-weight: 600; color: #2d3748; margin-bottom: 8px;">Nama Kontak Person (PIC)</label>
                            <input type="text" name="kontak_person" value="{{ old('kontak_person') }}" placeholder="Nama penanggung jawab" required style="width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;">
                        </div>
                        <div style="flex: 1;">
                            <label style="display: block; font-size: 13px; font-weight: 600; color: #2d3748; margin-bottom: 8px;">Email Instansi / PIC</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="email@domain.com" required style="width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;">
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; color: #2d3748; margin-bottom: 8px;">Pesan / Catatan Kolaborasi (Opsional)</label>
                        <textarea name="pesan" rows="4" placeholder="Tuliskan bentuk kerjasama yang diharapkan..." style="width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box; resize: vertical;">{{ old('pesan') }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <a href="{{ route('user.partnership') }}" style="background: #e2e8f0; color: #475569; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600;">Batal</a>
                        <button type="submit" style="background: #285B4D; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">Kirim Pendaftaran</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>