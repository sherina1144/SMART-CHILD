@extends('layout.dashboard_admin')

@section('content')

<div class="page-container">

    <div class="page-header">

        <div>
            <h1>Edit Smart Child Box</h1>
            <p>Perbarui informasi dan isi Smart Child Box.</p>
        </div>

        <a
            href="{{ route('admin.smartbox.index') }}"
            class="btn-secondary"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    @if ($errors->any())

        <div class="alert-error">

            <i class="fa-solid fa-circle-exclamation"></i>

            <div>

                <strong>Terjadi kesalahan:</strong>

                <ul>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        </div>

    @endif


    <form
        action="{{ route('admin.smartbox.update', $box->box_id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        {{-- INFORMASI BOX --}}

        <div class="form-card">

            <div class="form-card-title">

                <i class="fa-solid fa-box"></i>

                <div>
                    <h2>Informasi Smart Child Box</h2>
                    <p>Perbarui informasi utama paket.</p>
                </div>

            </div>


            <div class="form-grid">

                {{-- NAMA --}}

                <div class="form-group">

                    <label for="nama_box">
                        Nama Box <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_box"
                        name="nama_box"
                        value="{{ old('nama_box', $box->nama_box) }}"
                        required
                    >

                </div>


                {{-- USIA --}}

                <div class="form-group">

                    <label for="kategori_usia">
                        Kategori Usia <span>*</span>
                    </label>

                    <select
                        id="kategori_usia"
                        name="kategori_usia"
                        required
                    >

                        <option value="">
                            Pilih kategori usia
                        </option>

                        @foreach([
                            '0 - 2 Tahun',
                            '3 - 5 Tahun',
                            '6 - 8 Tahun',
                            '9 - 12 Tahun'
                        ] as $usia)

                            <option
                                value="{{ $usia }}"
                                {{ old('kategori_usia', $box->kategori_usia) == $usia ? 'selected' : '' }}
                            >
                                {{ $usia }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- HARGA --}}

                <div class="form-group">

                    <label for="harga">
                        Harga Box <span>*</span>
                    </label>

                    <div class="input-prefix">

                        <span>Rp</span>

                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            value="{{ old('harga', $box->harga) }}"
                            min="0"
                            required
                        >

                    </div>

                </div>


                {{-- URUTAN --}}

                <div class="form-group">

                    <label for="urutan">
                        Urutan <span>*</span>
                    </label>

                    <input
                        type="number"
                        id="urutan"
                        name="urutan"
                        value="{{ old('urutan', $box->urutan) }}"
                        min="1"
                        required
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="form-group full-width">

                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                    >{{ old('deskripsi', $box->deskripsi) }}</textarea>

                </div>


                {{-- GAMBAR --}}

                <div class="form-group full-width">

                    <label>
                        Gambar Box
                    </label>


                    @if($box->gambar)

                        <div class="current-image">

                            <img
                                src="{{ asset('images/' . $box->gambar) }}"
                                alt="{{ $box->nama_box }}"
                            >

                            <div>

                                <strong>
                                    Gambar saat ini
                                </strong>

                                <small>
                                    Pilih gambar baru jika ingin menggantinya.
                                </small>

                            </div>

                        </div>

                    @endif


                    <div class="upload-box">

                        <i class="fa-regular fa-image"></i>

                        <div>

                            <strong>
                                Pilih gambar baru
                            </strong>

                            <small>
                                JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                            </small>

                        </div>

                        <input
                            type="file"
                            id="gambar"
                            name="gambar"
                            accept="image/jpeg,image/png,image/webp"
                        >

                    </div>


                    <div
                        id="image-preview"
                        class="image-preview"
                    ></div>

                </div>

            </div>

        </div>


        {{-- PRODUK BOX --}}

        <div class="form-card">

            <div class="form-card-title">

                <i class="fa-solid fa-boxes-stacked"></i>

                <div>

                    <h2>Isi Smart Child Box</h2>

                    <p>
                        Kelola produk yang ada di dalam paket.
                    </p>

                </div>

            </div>


            <div id="product-list">

                @forelse($box->items as $index => $item)

                    <div class="product-row">

                        <div class="product-number">
                            {{ $index + 1 }}
                        </div>


                        <div class="form-group">

                            <label>
                                Produk
                            </label>

                            <select
                                name="products[{{ $index }}][product_id]"
                            >

                                <option value="">
                                    Pilih produk
                                </option>

                                @foreach($products as $product)

                                    <option
                                        value="{{ $product->product_id }}"
                                        {{ $item->product_id == $product->product_id ? 'selected' : '' }}
                                    >
                                        {{ $product->nama_produk }}
                                        — Rp{{ number_format($product->harga, 0, ',', '.') }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group quantity-field">

                            <label>
                                Jumlah
                            </label>

                            <input
                                type="number"
                                name="products[{{ $index }}][jumlah]"
                                value="{{ $item->jumlah }}"
                                min="1"
                            >

                        </div>


                        <div class="form-group unit-field">

                            <label>
                                Satuan
                            </label>

                            <select
                                name="products[{{ $index }}][satuan]"
                            >

                                <option
                                    value="pcs"
                                    {{ $item->satuan == 'pcs' ? 'selected' : '' }}
                                >
                                    pcs
                                </option>

                                <option
                                    value="set"
                                    {{ $item->satuan == 'set' ? 'selected' : '' }}
                                >
                                    set
                                </option>

                                <option
                                    value="pak"
                                    {{ $item->satuan == 'pak' ? 'selected' : '' }}
                                >
                                    pak
                                </option>

                            </select>

                        </div>


                        <button
                            type="button"
                            class="btn-remove-row"
                            onclick="removeProductRow(this)"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>

                @empty

                    <div class="no-products">
                        Belum ada produk di dalam box.
                    </div>

                @endforelse

            </div>


            <button
                type="button"
                class="btn-add-product"
                onclick="addProductRow()"
            >
                <i class="fa-solid fa-plus"></i>
                Tambah Produk
            </button>

        </div>


        {{-- ACTION --}}

        <div class="form-actions">

            <a
                href="{{ route('admin.smartbox.index') }}"
                class="btn-cancel"
            >
                Batal
            </a>

            <button
                type="submit"
                class="btn-save"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>


<style>

    .page-container {
        padding: 28px 32px;
        max-width: 1200px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 22px;
    }

    .page-header h1 {
        margin: 0;
        color: #253D32;
        font-size: 27px;
        font-weight: 800;
    }

    .page-header p {
        margin: 6px 0 0;
        color: #667085;
        font-size: 13px;
    }


    /* BUTTON */

    .btn-secondary,
    .btn-cancel,
    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 10px 16px;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 700;

        text-decoration: none;

        cursor: pointer;
        transition: 0.2s;
    }

    .btn-secondary {
        background: #EAF4F0;
        color: #315C50;
        border: 1px solid #D5E8E0;
    }

    .btn-secondary:hover {
        background: #DCEEE7;
    }


    /* ALERT */

    .alert-error {
        display: flex;
        gap: 10px;

        padding: 12px 15px;
        margin-bottom: 20px;

        border-radius: 9px;

        background: #FDECEC;
        color: #B42318;

        border: 1px solid #F6D5D5;

        font-size: 13px;
    }

    .alert-error ul {
        margin: 5px 0 0;
        padding-left: 18px;
    }


    /* CARD */

    .form-card {
        background: #FFFFFF;

        border: 1px solid #E7EAE8;
        border-radius: 13px;

        padding: 22px;

        margin-bottom: 18px;

        box-shadow: 0 3px 14px rgba(37, 61, 50, 0.05);
    }

    .form-card-title {
        display: flex;
        align-items: center;
        gap: 12px;

        padding-bottom: 16px;
        margin-bottom: 18px;

        border-bottom: 1px solid #EEF0EF;
    }

    .form-card-title > i {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #EAF4F0;
        color: #315C50;
    }

    .form-card-title h2 {
        margin: 0;

        color: #253D32;

        font-size: 17px;
        font-weight: 800;
    }

    .form-card-title p {
        margin: 3px 0 0;

        color: #667085;

        font-size: 12px;
    }


    /* FORM */

    .form-grid {
        display: grid;

        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 17px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: #344054;

        font-size: 12px;
        font-weight: 700;
    }

    .form-group label span {
        color: #B42318;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;

        padding: 10px 11px;

        border: 1px solid #D0D5DD;
        border-radius: 8px;

        background: #FFFFFF;

        color: #344054;

        font-family: 'Poppins', sans-serif;
        font-size: 12px;

        outline: none;

        transition: 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #6FAF9B;

        box-shadow: 0 0 0 3px rgba(111, 175, 155, 0.12);
    }

    .form-group textarea {
        resize: vertical;
    }


    /* PRICE */

    .input-prefix {
        display: flex;
        align-items: stretch;
    }

    .input-prefix span {
        display: flex;
        align-items: center;

        padding: 0 11px;

        background: #F4F6F5;

        border: 1px solid #D0D5DD;
        border-right: none;

        border-radius: 8px 0 0 8px;

        color: #667085;

        font-size: 12px;
        font-weight: 700;
    }

    .input-prefix input {
        border-radius: 0 8px 8px 0;
    }


    /* CURRENT IMAGE */

    .current-image {
        display: flex;
        align-items: center;
        gap: 12px;

        margin-bottom: 10px;
        padding: 10px;

        border-radius: 9px;

        background: #FAFBFA;
        border: 1px solid #E7EAE8;
    }

    .current-image img {
        width: 110px;
        height: 75px;

        object-fit: contain;

        border-radius: 7px;

        background: #FFF9F2;
    }

    .current-image div {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .current-image strong {
        color: #344054;
        font-size: 12px;
    }

    .current-image small {
        color: #98A2B3;
        font-size: 10px;
    }


    /* UPLOAD */

    .upload-box {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 14px;

        border: 1px dashed #B8C9C1;
        border-radius: 9px;

        background: #FAFCFB;
    }

    .upload-box > i {
        color: #6FAF9B;
        font-size: 25px;
    }

    .upload-box div {
        display: flex;
        flex-direction: column;
        gap: 2px;
        flex: 1;
    }

    .upload-box strong {
        color: #344054;
        font-size: 12px;
    }

    .upload-box small {
        color: #98A2B3;
        font-size: 10px;
    }

    .upload-box input {
        max-width: 240px;
        font-size: 11px;
    }

    .image-preview {
        margin-top: 10px;
    }

    .image-preview img {
        width: 130px;
        height: 90px;

        object-fit: contain;

        border-radius: 8px;

        border: 1px solid #E7EAE8;

        background: #FFF9F2;
    }


    /* PRODUCT */

    .product-row {
        display: grid;

        grid-template-columns: 30px minmax(0, 1fr) 100px 100px 38px;

        align-items: end;

        gap: 10px;

        padding: 13px;

        margin-bottom: 9px;

        border: 1px solid #E7EAE8;
        border-radius: 9px;

        background: #FAFBFA;
    }

    .product-number {
        width: 28px;
        height: 28px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 1px;

        border-radius: 50%;

        background: #E8F4EF;
        color: #315C50;

        font-size: 11px;
        font-weight: 800;
    }

    .quantity-field input {
        text-align: center;
    }

    .btn-remove-row {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #F6D5D5;
        border-radius: 7px;

        background: #FFF0F0;
        color: #B42318;

        cursor: pointer;
    }

    .btn-remove-row:hover {
        background: #FDE4E4;
    }

    .btn-add-product {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        margin-top: 5px;

        padding: 9px 13px;

        border: 1px dashed #9ABBAE;
        border-radius: 8px;

        background: #F5FAF8;
        color: #315C50;

        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 700;

        cursor: pointer;
    }

    .btn-add-product:hover {
        background: #EAF4F0;
    }

    .no-products {
        padding: 18px;

        margin-bottom: 10px;

        border: 1px dashed #C9D5CF;
        border-radius: 9px;

        color: #98A2B3;

        font-size: 12px;

        text-align: center;
    }


    /* ACTION */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 9px;
    }

    .btn-cancel {
        background: #F4F5F5;
        color: #667085;

        border: 1px solid #E1E4E3;
    }

    .btn-cancel:hover {
        background: #EAEBEA;
    }

    .btn-save {
        border: none;

        background: #F39C50;
        color: #FFFFFF;

        font-family: 'Poppins', sans-serif;
    }

    .btn-save:hover {
        background: #E98D3E;
    }


    /* RESPONSIVE */

    @media (max-width: 800px) {

        .page-container {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .product-row {
            grid-template-columns: 30px 1fr;
        }

        .quantity-field,
        .unit-field,
        .btn-remove-row {
            grid-column: 2;
        }

        .btn-remove-row {
            width: 100%;
        }
    }

</style>


<script>

    let productIndex =
        {{ $box->items->count() }};


    /* =========================================================
       TAMBAH PRODUK
    ========================================================= */

    function addProductRow() {

        const productList =
            document.getElementById('product-list');

        const row =
            document.createElement('div');

        row.className = 'product-row';

        row.innerHTML = `
            <div class="product-number">
                ${document.querySelectorAll('.product-row').length + 1}
            </div>

            <div class="form-group">

                <label>
                    Produk
                </label>

                <select
                    name="products[${productIndex}][product_id]"
                >

                    <option value="">
                        Pilih produk
                    </option>

                    @foreach($products as $product)

                        <option value="{{ $product->product_id }}">
                            {{ $product->nama_produk }}
                            — Rp{{ number_format($product->harga, 0, ',', '.') }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group quantity-field">

                <label>
                    Jumlah
                </label>

                <input
                    type="number"
                    name="products[${productIndex}][jumlah]"
                    value="1"
                    min="1"
                >

            </div>

            <div class="form-group unit-field">

                <label>
                    Satuan
                </label>

                <select
                    name="products[${productIndex}][satuan]"
                >

                    <option value="pcs">
                        pcs
                    </option>

                    <option value="set">
                        set
                    </option>

                    <option value="pak">
                        pak
                    </option>

                </select>

            </div>

            <button
                type="button"
                class="btn-remove-row"
                onclick="removeProductRow(this)"
            >
                <i class="fa-solid fa-trash"></i>
            </button>
        `;

        productList.appendChild(row);

        productIndex++;

        updateProductNumbers();
    }


    /* =========================================================
       HAPUS PRODUK
    ========================================================= */

    function removeProductRow(button) {

        button
            .closest('.product-row')
            .remove();

        updateProductNumbers();
    }


    /* =========================================================
       UPDATE NOMOR
    ========================================================= */

    function updateProductNumbers() {

        const rows =
            document.querySelectorAll('.product-row');

        rows.forEach((row, index) => {

            row.querySelector('.product-number')
                .textContent = index + 1;

        });
    }


    /* =========================================================
       PREVIEW GAMBAR
    ========================================================= */

    document
        .getElementById('gambar')
        .addEventListener('change', function (event) {

            const preview =
                document.getElementById('image-preview');

            preview.innerHTML = '';

            const file =
                event.target.files[0];

            if (!file) {
                return;
            }

            const reader =
                new FileReader();

            reader.onload = function (e) {

                preview.innerHTML = `
                    <img
                        src="${e.target.result}"
                        alt="Preview gambar"
                    >
                `;

            };

            reader.readAsDataURL(file);

        });

</script>

@endsection