@extends('layout.dashboard_admin')

@section('content')

<style>
    .product-page {
        padding: 30px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
    }

    .page-title h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #253D32;
    }

    .page-title p {
        margin: 7px 0 0;
        color: #667085;
        font-size: 14px;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: #F39C50;
        color: white;
        text-decoration: none;
        border: none;
        border-radius: 10px;
        padding: 12px 18px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .btn-add:hover {
        background: #df843b;
        color: white;
        transform: translateY(-1px);
    }

    /* ALERT */
    .alert {
        padding: 13px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-success {
        background: #e8f7ef;
        color: #25734a;
        border: 1px solid #c8ead8;
    }

    .alert-error {
        background: #fff0f0;
        color: #b42318;
        border: 1px solid #f5c2c2;
    }

    /* FILTER */
    .filter-card {
        background: white;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 22px;
        box-shadow: 0 3px 15px rgba(37, 61, 50, .06);
    }

    .filter-form {
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr auto auto;
        gap: 12px;
        align-items: end;
    }

    .filter-group label {
        display: block;
        margin-bottom: 7px;
        color: #344054;
        font-size: 12px;
        font-weight: 700;
    }

    .filter-group input,
    .filter-group select {
        width: 100%;
        box-sizing: border-box;
        height: 42px;
        border: 1px solid #D0D5DD;
        border-radius: 9px;
        padding: 0 12px;
        font-family: inherit;
        font-size: 12px;
        color: #344054;
        background: white;
        outline: none;
    }

    .filter-group input:focus,
    .filter-group select:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, .12);
    }

    .btn-filter {
        height: 42px;
        padding: 0 17px;
        border: none;
        border-radius: 9px;
        background: #315C50;
        color: white;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-filter:hover {
        background: #254a40;
    }

    .btn-reset {
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 17px;
        border-radius: 9px;
        border: 1px solid #D0D5DD;
        color: #475467;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        background: white;
        white-space: nowrap;
    }

    .btn-reset:hover {
        background: #F9FAFB;
    }

    /* TABLE */
    .table-card {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(37, 61, 50, .06);
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
    }

    .product-table thead {
        background: #F7F9F8;
    }

    .product-table th {
        text-align: left;
        padding: 15px 18px;
        font-size: 11px;
        color: #667085;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .product-table td {
        padding: 15px 18px;
        border-top: 1px solid #EAECF0;
        font-size: 13px;
        color: #344054;
        vertical-align: middle;
    }

    .product-table tbody tr:hover {
        background: #FCFDFC;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 220px;
    }

    .product-image {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        object-fit: cover;
        background: #F2F4F7;
        border: 1px solid #EAECF0;
    }

    .product-name {
        font-weight: 700;
        color: #253D32;
        margin-bottom: 4px;
    }

    .product-id {
        font-size: 10px;
        color: #98A2B3;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .badge-age {
        background: #EEF7F4;
        color: #315C50;
    }

    .badge-development {
        background: #FFF3EA;
        color: #C76E2D;
    }

    .badge-available {
        background: #E8F7EF;
        color: #25734A;
    }

    .badge-empty {
        background: #FDECEC;
        color: #B42318;
    }

    .price {
        font-weight: 700;
        color: #253D32;
        white-space: nowrap;
    }

    .action-wrapper {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-decoration: none;
        transition: .2s;
    }

    .btn-edit {
        background: #EEF7F4;
        color: #315C50;
    }

    .btn-edit:hover {
        background: #DCEDE7;
    }

    .btn-delete {
        background: #FFF0F0;
        color: #B42318;
    }

    .btn-delete:hover {
        background: #FDE1E1;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #667085;
    }

    .empty-state i {
        font-size: 36px;
        color: #98A2B3;
        margin-bottom: 14px;
    }

    .empty-state h3 {
        margin: 0 0 6px;
        color: #344054;
        font-size: 16px;
    }

    .empty-state p {
        margin: 0;
        font-size: 12px;
    }

    @media (max-width: 1000px) {
        .filter-form {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 700px) {
        .product-page {
            padding: 20px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="product-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div class="page-title">
            <h1>Kelola Produk</h1>
            <p>Kelola produk yang ditampilkan pada Shop SmartChild.</p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Produk
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- ERROR --}}
    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif


    {{-- VALIDATION ERROR --}}
    @if($errors->any())
        <div class="alert alert-error">
            <strong>Terjadi kesalahan:</strong>

            <ul style="margin: 7px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- FILTER --}}
    <div class="filter-card">

        <form
            action="{{ route('admin.products.index') }}"
            method="GET"
            class="filter-form"
        >

            <div class="filter-group">
                <label for="search">Cari Produk</label>

                <input
                    type="text"
                    id="search"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama produk..."
                >
            </div>


            <div class="filter-group">
                <label for="kategori_usia">Kategori Usia</label>

                <select name="kategori_usia" id="kategori_usia">

                    <option value="">Semua Usia</option>

                    <option
                        value="0-2 Tahun"
                        {{ request('kategori_usia') == '0-2 Tahun' ? 'selected' : '' }}
                    >
                        0-2 Tahun
                    </option>

                    <option
                        value="3-5 Tahun"
                        {{ request('kategori_usia') == '3-5 Tahun' ? 'selected' : '' }}
                    >
                        3-5 Tahun
                    </option>

                    <option
                        value="6-8 Tahun"
                        {{ request('kategori_usia') == '6-8 Tahun' ? 'selected' : '' }}
                    >
                        6-8 Tahun
                    </option>

                    <option
                        value="9-12 Tahun"
                        {{ request('kategori_usia') == '9-12 Tahun' ? 'selected' : '' }}
                    >
                        9-12 Tahun
                    </option>

                </select>
            </div>


            <div class="filter-group">
                <label for="kategori_perkembangan">
                    Perkembangan
                </label>

                <select
                    name="kategori_perkembangan"
                    id="kategori_perkembangan"
                >

                    <option value="">
                        Semua Perkembangan
                    </option>

                    <option
                        value="Kognitif"
                        {{ request('kategori_perkembangan') == 'Kognitif' ? 'selected' : '' }}
                    >
                        Kognitif
                    </option>

                    <option
                        value="Motorik"
                        {{ request('kategori_perkembangan') == 'Motorik' ? 'selected' : '' }}
                    >
                        Motorik
                    </option>

                    <option
                        value="Bahasa"
                        {{ request('kategori_perkembangan') == 'Bahasa' ? 'selected' : '' }}
                    >
                        Bahasa
                    </option>

                    <option
                        value="Sosial"
                        {{ request('kategori_perkembangan') == 'Sosial' ? 'selected' : '' }}
                    >
                        Sosial
                    </option>

                    <option
                        value="Emosional"
                        {{ request('kategori_perkembangan') == 'Emosional' ? 'selected' : '' }}
                    >
                        Emosional
                    </option>

                </select>
            </div>


            <button type="submit" class="btn-filter">
                <i class="fas fa-search"></i>
                Cari
            </button>


            <a
                href="{{ route('admin.products.index') }}"
                class="btn-reset"
            >
                Reset
            </a>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-wrapper">

            <table class="product-table">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Usia</th>
                        <th>Perkembangan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse($products as $product)

                        <tr>

                            {{-- PRODUCT --}}
                            <td>

                                <div class="product-info">

                                    @if($product->gambar)
                                        <img
                                            src="{{ asset('images/' . $product->gambar) }}"
                                            alt="{{ $product->nama_produk }}"
                                            class="product-image"
                                            onerror="this.style.display='none';"
                                        >
                                    @else
                                        <div
                                            class="product-image"
                                            style="
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                            "
                                        >
                                            <i class="fas fa-box"></i>
                                        </div>
                                    @endif


                                    <div>

                                        <div class="product-name">
                                            {{ $product->nama_produk }}
                                        </div>

                                        <div class="product-id">
                                            ID #{{ $product->product_id }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- AGE --}}
                            <td>

                                <span class="badge badge-age">
                                    {{ $product->kategori_usia }}
                                </span>

                            </td>


                            {{-- DEVELOPMENT --}}
                            <td>

                                @if($product->kategori_perkembangan)

                                    <span class="badge badge-development">
                                        {{ $product->kategori_perkembangan }}
                                    </span>

                                @else

                                    <span style="color:#98A2B3;">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- PRICE --}}
                            <td>

                                <span class="price">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>

                            </td>


                            {{-- STOCK --}}
                            <td>

                                @if($product->stok > 0)

                                    <span class="badge badge-available">
                                        Tersedia
                                    </span>

                                @else

                                    <span class="badge badge-empty">
                                        Stok Habis
                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}
                            <td>

                                <div class="action-wrapper">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.products.edit', $product->product_id) }}"
                                        class="btn-action btn-edit"
                                        title="Edit Produk"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>


                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('admin.products.destroy', $product->product_id) }}"
                                        method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->nama_produk }}?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
                                            title="Hapus Produk"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <i class="fas fa-box-open"></i>

                                    <h3>
                                        Produk belum ditemukan
                                    </h3>

                                    <p>
                                        Belum ada produk yang sesuai dengan pencarian atau filter.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection