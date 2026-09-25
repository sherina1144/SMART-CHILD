@extends('layout.dashboard_admin')

@section('content')

<div class="page-container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1>Smart Child Box</h1>

            <p>
                Kelola paket Smart Child Box dan produk di dalamnya.
            </p>
        </div>

        <a href="{{ route('admin.smartbox.create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i>
            Tambah Box
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert-success">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>

    @endif


    {{-- ERROR --}}
    @if(session('error'))

        <div class="alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ session('error') }}
        </div>

    @endif


    {{-- BOX LIST --}}
    <div class="box-grid">

        @forelse($boxes as $box)

            <div class="box-card">

                {{-- GAMBAR --}}
                <div class="box-image">

                    @if($box->gambar)

                        <img
                            src="{{ asset('images/' . $box->gambar) }}"
                            alt="{{ $box->nama_box }}"
                        >

                    @else

                        <div class="no-image">
                            <i class="fa-regular fa-image"></i>
                            <span>Belum ada gambar</span>
                        </div>

                    @endif

                </div>


                {{-- CONTENT --}}
                <div class="box-content">

                    <div class="box-top">

                        <div>

                            <h2>
                                {{ $box->nama_box }}
                            </h2>

                            <span class="age-badge">
                                {{ $box->kategori_usia }}
                            </span>

                        </div>

                    </div>


                    {{-- HARGA --}}
                    <div class="price">

                        @if($box->harga !== null)

                            Rp{{ number_format($box->harga, 0, ',', '.') }}

                        @else

                            <span>Harga belum diatur</span>

                        @endif

                    </div>


                    {{-- DESKRIPSI --}}
                    <p class="description">

                        {{ $box->deskripsi ?: 'Belum ada deskripsi.' }}

                    </p>


                    {{-- ISI BOX --}}
                    <div class="items-section">

                        <div class="items-title">

                            <span>
                                Isi Box
                            </span>

                            <span class="item-count">
                                {{ $box->items->count() }} produk
                            </span>

                        </div>


                        @if($box->items->count() > 0)

                            <div class="product-list">

                                @foreach($box->items as $item)

                                    <div class="product-item">

                                        <div class="product-name">

                                            @if($item->product)

                                                {{ $item->product->nama_produk }}

                                            @else

                                                Produk tidak ditemukan

                                            @endif

                                        </div>

                                        <div class="product-quantity">

                                            {{ $item->jumlah }}
                                            {{ $item->satuan }}

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="empty-items">
                                Belum ada produk di dalam box.
                            </div>

                        @endif

                    </div>


                    {{-- ACTION --}}
                    <div class="card-actions">

                        <a
                            href="{{ route('admin.smartbox.edit', $box->box_id) }}"
                            class="btn-edit"
                        >
                            <i class="fa-solid fa-pen"></i>
                            Edit
                        </a>


                        <form
                            action="{{ route('admin.smartbox.destroy', $box->box_id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus Smart Child Box ini?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-delete"
                            >
                                <i class="fa-solid fa-trash"></i>
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-box">

                <i class="fa-solid fa-box-open"></i>

                <h3>
                    Belum ada Smart Child Box
                </h3>

                <p>
                    Silakan tambahkan Smart Child Box terlebih dahulu.
                </p>

                <a
                    href="{{ route('admin.smartbox.create') }}"
                    class="btn-primary"
                >
                    <i class="fa-solid fa-plus"></i>
                    Tambah Box
                </a>

            </div>

        @endforelse

    </div>

</div>


<style>
    /* =========================================================
       PAGE
    ========================================================= */

    .page-container {
        padding: 28px 32px;
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
        line-height: 1.2;
    }

    .page-header p {
        margin: 6px 0 0;
        color: #667085;
        font-size: 13px;
        line-height: 1.5;
    }


    /* =========================================================
       BUTTON TAMBAH
    ========================================================= */

    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 11px 17px;

        border-radius: 9px;
        background: #F39C50;
        color: #FFFFFF;

        text-decoration: none;
        border: none;

        font-size: 13px;
        font-weight: 700;

        cursor: pointer;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .btn-primary:hover {
        background: #E98D3E;
        color: #FFFFFF;
        transform: translateY(-1px);
    }


    /* =========================================================
       ALERT
    ========================================================= */

    .alert-success,
    .alert-error {
        display: flex;
        align-items: center;
        gap: 9px;

        padding: 11px 14px;
        margin-bottom: 18px;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;
    }

    .alert-success {
        background: #EAF7F0;
        color: #28734D;
        border: 1px solid #D6EBDD;
    }

    .alert-error {
        background: #FDECEC;
        color: #B42318;
        border: 1px solid #F6D5D5;
    }


    /* =========================================================
       BOX GRID
    ========================================================= */

    .box-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }


    /* =========================================================
       BOX CARD
    ========================================================= */

    .box-card {
        background: #FFFFFF;

        border-radius: 14px;
        overflow: hidden;

        border: 1px solid #E7EAE8;

        box-shadow: 0 3px 14px rgba(37, 61, 50, 0.055);

        transition: transform 0.2s ease,
                    box-shadow 0.2s ease;
    }

    .box-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(37, 61, 50, 0.09);
    }


    /* =========================================================
       GAMBAR BOX
    ========================================================= */

    .box-image {
        height: 155px;
        background: #FFF9F2;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 8px;
    }

    .box-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .no-image {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        gap: 6px;

        color: #98A2B3;

        font-size: 13px;
    }

    .no-image i {
        font-size: 32px;
    }


    /* =========================================================
       CARD CONTENT
    ========================================================= */

    .box-content {
        padding: 17px;
    }


    /* =========================================================
       BOX TITLE
    ========================================================= */

    .box-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
    }

    .box-top h2 {
        margin: 0 0 7px;

        color: #253D32;

        font-size: 18px;
        font-weight: 800;

        line-height: 1.25;
    }

    .age-badge {
        display: inline-flex;
        align-items: center;

        padding: 4px 9px;

        border-radius: 20px;

        background: #E8F4EF;
        color: #315C50;

        font-size: 11px;
        font-weight: 700;

        line-height: 1.3;
    }


    /* =========================================================
       HARGA
    ========================================================= */

    .price {
        margin-top: 11px;

        color: #315C50;

        font-size: 18px;
        font-weight: 800;

        line-height: 1.3;
    }

    .price span {
        color: #98A2B3;

        font-size: 12px;
        font-weight: 600;
    }


    /* =========================================================
       DESKRIPSI
    ========================================================= */

    .description {
        margin: 7px 0 14px;

        color: #667085;

        font-size: 12.5px;
        line-height: 1.5;

        min-height: 38px;
    }


    /* =========================================================
       ISI BOX
    ========================================================= */

    .items-section {
        padding: 11px;

        background: #FAFBFA;

        border-radius: 10px;

        border: 1px solid #EDF0EE;
    }

    .items-title {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 9px;

        color: #253D32;

        font-size: 12.5px;
        font-weight: 800;
    }

    .item-count {
        color: #667085;

        font-size: 11px;
        font-weight: 600;
    }

    .product-list {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .product-item {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 12px;

        padding: 7px 9px;

        background: #FFFFFF;

        border-radius: 7px;

        border: 1px solid #EEF0EF;
    }

    .product-name {
        color: #344054;

        font-size: 11.5px;
        font-weight: 600;

        line-height: 1.35;
    }

    .product-quantity {
        white-space: nowrap;

        color: #315C50;

        font-size: 11px;
        font-weight: 700;
    }

    .empty-items {
        color: #98A2B3;

        font-size: 12px;

        text-align: center;

        padding: 8px 0;
    }


    /* =========================================================
       ACTION BUTTON
    ========================================================= */

    .card-actions {
        display: flex;
        align-items: center;

        gap: 7px;

        margin-top: 13px;
    }

    .card-actions form {
        margin: 0;
    }

    .btn-edit,
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 8px 12px;

        border-radius: 7px;

        font-size: 11.5px;
        font-weight: 700;

        text-decoration: none;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .btn-edit {
        background: #EAF4F0;
        color: #315C50;

        border: 1px solid #D5E8E0;
    }

    .btn-edit:hover {
        background: #DCEEE7;
        color: #315C50;
    }

    .btn-delete {
        background: #FFF0F0;
        color: #B42318;

        border: 1px solid #F6D5D5;
    }

    .btn-delete:hover {
        background: #FDE4E4;
        color: #B42318;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-box {
        grid-column: 1 / -1;

        background: #FFFFFF;

        border: 1px dashed #C9D5CF;

        border-radius: 14px;

        padding: 45px 20px;

        text-align: center;
    }

    .empty-box > i {
        color: #6FAF9B;

        font-size: 38px;

        margin-bottom: 13px;
    }

    .empty-box h3 {
        margin: 0 0 6px;

        color: #253D32;

        font-size: 18px;
        font-weight: 800;
    }

    .empty-box p {
        margin: 0 0 17px;

        color: #667085;

        font-size: 13px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {

        .page-container {
            padding: 24px;
        }

        .box-grid {
            gap: 16px;
        }

        .box-image {
            height: 145px;
        }

    }


    @media (max-width: 900px) {

        .box-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-primary {
            width: fit-content;
        }

    }


    @media (max-width: 600px) {

        .page-container {
            padding: 18px;
        }

        .page-header h1 {
            font-size: 23px;
        }

        .box-image {
            height: 170px;
        }

        .box-content {
            padding: 15px;
        }

    }
</style>

@endsection