@extends('layout.dashboard_admin')

@section('content')

<style>
    .product-form-page {
        padding: 30px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #667085;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .back-link:hover {
        color: #315C50;
    }

    .page-header h1 {
        margin: 0;
        color: #253D32;
        font-size: 28px;
        font-weight: 800;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #667085;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 3px 15px rgba(37, 61, 50, .06);
        max-width: 950px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 12px;
        font-weight: 700;
        color: #344054;
        margin-bottom: 7px;
    }

    .required {
        color: #D92D20;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #D0D5DD;
        border-radius: 9px;
        padding: 11px 13px;
        font-family: inherit;
        font-size: 13px;
        color: #344054;
        outline: none;
        background: white;
    }

    .form-group input,
    .form-group select {
        height: 44px;
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, .12);
    }

    .form-help {
        margin-top: 6px;
        color: #98A2B3;
        font-size: 10px;
    }

    .error-message {
        color: #B42318;
        font-size: 11px;
        margin-top: 5px;
    }

    .current-image {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #EAECF0;
        margin-top: 10px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #EAECF0;
    }

    .btn-cancel {
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 18px;
        border: 1px solid #D0D5DD;
        border-radius: 9px;
        background: white;
        color: #475467;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-cancel:hover {
        background: #F9FAFB;
    }

    .btn-save {
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 0 20px;
        border: none;
        border-radius: 9px;
        background: #F39C50;
        color: white;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #df843b;
    }

    @media (max-width: 700px) {
        .product-form-page {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }
</style>


<div class="product-form-page">

    {{-- HEADER --}}
    <div class="page-header">

        <a
            href="{{ route('admin.products.index') }}"
            class="back-link"
        >
            <i class="fas fa-arrow-left"></i>
            Kembali ke Produk
        </a>

        <h1>Edit Produk</h1>

        <p>
            Perbarui informasi produk SmartChild.
        </p>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div
            style="
                background:#FFF0F0;
                border:1px solid #F5C2C2;
                color:#B42318;
                padding:14px 17px;
                border-radius:10px;
                margin-bottom:20px;
                font-size:12px;
            "
        >

            <strong>
                Periksa kembali data berikut:
            </strong>

            <ul style="margin:7px 0 0 18px;">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="form-card">

        <form
            action="{{ route('admin.products.update', $product->product_id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">

                {{-- NAMA --}}
                <div class="form-group full">

                    <label for="nama_produk">
                        Nama Produk
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_produk"
                        name="nama_produk"
                        value="{{ old('nama_produk', $product->nama_produk) }}"
                        required
                    >

                    @error('nama_produk')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- GAMBAR --}}
                <div class="form-group full">

                    <label for="gambar">
                        Gambar Produk
                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    @if($product->gambar)

                        <div class="form-help">
                            Gambar saat ini:
                        </div>

                        <img
                            src="{{ asset('images/' . $product->gambar) }}"
                            alt="{{ $product->nama_produk }}"
                            class="current-image"
                        >

                    @endif

                    <div class="form-help">
                        Pilih gambar baru jika ingin mengganti gambar lama. Kosongkan jika tidak ingin mengganti.
                    </div>

                    @error('gambar')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- USIA --}}
                <div class="form-group">

                    <label for="kategori_usia">
                        Kategori Usia
                        <span class="required">*</span>
                    </label>

                    <select
                        name="kategori_usia"
                        id="kategori_usia"
                        required
                    >

                        <option value="">
                            Pilih kategori usia
                        </option>

                        <option
                            value="0-2 Tahun"
                            {{ old('kategori_usia', $product->kategori_usia) == '0-2 Tahun' ? 'selected' : '' }}
                        >
                            0-2 Tahun
                        </option>

                        <option
                            value="3-5 Tahun"
                            {{ old('kategori_usia', $product->kategori_usia) == '3-5 Tahun' ? 'selected' : '' }}
                        >
                            3-5 Tahun
                        </option>

                        <option
                            value="6-8 Tahun"
                            {{ old('kategori_usia', $product->kategori_usia) == '6-8 Tahun' ? 'selected' : '' }}
                        >
                            6-8 Tahun
                        </option>

                        <option
                            value="9-12 Tahun"
                            {{ old('kategori_usia', $product->kategori_usia) == '9-12 Tahun' ? 'selected' : '' }}
                        >
                            9-12 Tahun
                        </option>

                    </select>

                    @error('kategori_usia')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- PERKEMBANGAN --}}
                <div class="form-group">

                    <label for="kategori_perkembangan">
                        Kategori Perkembangan
                    </label>

                    <select
                        name="kategori_perkembangan"
                        id="kategori_perkembangan"
                    >

                        <option value="">
                            Pilih perkembangan
                        </option>

                        <option
                            value="Kognitif"
                            {{ old('kategori_perkembangan', $product->kategori_perkembangan) == 'Kognitif' ? 'selected' : '' }}
                        >
                            Kognitif
                        </option>

                        <option
                            value="Motorik"
                            {{ old('kategori_perkembangan', $product->kategori_perkembangan) == 'Motorik' ? 'selected' : '' }}
                        >
                            Motorik
                        </option>

                        <option
                            value="Bahasa"
                            {{ old('kategori_perkembangan', $product->kategori_perkembangan) == 'Bahasa' ? 'selected' : '' }}
                        >
                            Bahasa
                        </option>

                        <option
                            value="Sosial"
                            {{ old('kategori_perkembangan', $product->kategori_perkembangan) == 'Sosial' ? 'selected' : '' }}
                        >
                            Sosial
                        </option>

                        <option
                            value="Emosional"
                            {{ old('kategori_perkembangan', $product->kategori_perkembangan) == 'Emosional' ? 'selected' : '' }}
                        >
                            Emosional
                        </option>

                    </select>

                    @error('kategori_perkembangan')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- HARGA --}}
                <div class="form-group">

                    <label for="harga">
                        Harga
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        value="{{ old('harga', $product->harga) }}"
                        min="0"
                        required
                    >

                    @error('harga')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- STOK --}}
                <div class="form-group">

                    <label for="stok">
                        Stok
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', $product->stok) }}"
                        min="0"
                        required
                    >

                    @error('stok')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- TIPE --}}
                <div class="form-group">

                    <label for="is_box_item">
                        Jenis Produk
                        <span class="required">*</span>
                    </label>

                    <select
                        name="is_box_item"
                        id="is_box_item"
                        required
                    >

                        <option
                            value="0"
                            {{ old('is_box_item', $product->is_box_item) == '0' ? 'selected' : '' }}
                        >
                            Produk Shop
                        </option>

                        <option
                            value="1"
                            {{ old('is_box_item', $product->is_box_item) == '1' ? 'selected' : '' }}
                        >
                            Item Smart Child Box
                        </option>

                    </select>

                </div>


                {{-- DESKRIPSI --}}
                <div class="form-group full">

                    <label for="deskripsi">
                        Deskripsi Produk
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Tuliskan deskripsi produk..."
                    >{{ old('deskripsi', $product->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- ACTION --}}
            <div class="form-actions">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-save"
                >
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection