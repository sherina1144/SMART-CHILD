@extends('layout.dashboard_admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="page-header">

        <div>

            <h1>Detail Pesanan</h1>

            <p>
                Informasi lengkap pesanan pelanggan Smart Child.
            </p>

        </div>


        <a
            href="{{ route('admin.orders.index') }}"
            class="btn-back"
        >
            ← Kembali
        </a>

    </div>


    {{-- INFORMASI ORDER --}}
    <div class="detail-grid">

        {{-- DATA PESANAN --}}
        <div class="detail-card">

            <div class="card-title">
                Informasi Pesanan
            </div>


            <div class="info-list">

                <div class="info-row">

                    <span>No. Order</span>

                    <strong>
                        {{ $order->nomor_order }}
                    </strong>

                </div>


                <div class="info-row">

                    <span>Tanggal</span>

                    <strong>
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </strong>

                </div>


                <div class="info-row">

                    <span>Status</span>

                    <strong>

                        @if($order->status_pesanan === 'Pending')

                            <span class="status pending">
                                Pending
                            </span>

                        @elseif($order->status_pesanan === 'Diproses')

                            <span class="status process">
                                Diproses
                            </span>

                        @elseif($order->status_pesanan === 'Ditolak')

                            <span class="status rejected">
                                Ditolak
                            </span>

                        @else

                            <span class="status">
                                {{ $order->status_pesanan }}
                            </span>

                        @endif

                    </strong>

                </div>


                <div class="info-row">

                    <span>Pembayaran</span>

                    <strong>
                        {{ $order->metode_pembayaran }}
                    </strong>

                </div>


                <div class="info-row">

                    <span>Status Pembayaran</span>

                    <strong>
                        {{ $order->payment_status }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- DATA PELANGGAN --}}
        <div class="detail-card">

            <div class="card-title">
                Informasi Pelanggan
            </div>


            <div class="info-list">

                <div class="info-row">

                    <span>Nama</span>

                    <strong>
                        @if($order->user)
                            {{ $order->user->nama }}
                        @else
                            {{ $order->nama_penerima }}
                        @endif
                    </strong>

                </div>


                <div class="info-row">

                    <span>Nama Penerima</span>

                    <strong>
                        {{ $order->nama_penerima }}
                    </strong>

                </div>


                <div class="info-row">

                    <span>No. HP</span>

                    <strong>
                        {{ $order->no_hp }}
                    </strong>

                </div>


                <div class="info-row address-row">

                    <span>Alamat</span>

                    <strong>
                        {{ $order->alamat }}
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- ITEM PESANAN --}}
    <div class="detail-card order-items-card">

        <div class="card-title">
            Item Pesanan
        </div>


        <div class="table-wrapper">

            <table class="order-detail-table">

                <thead>

                    <tr>

                        <th>Item</th>

                        <th>Jenis</th>

                        <th>Jumlah</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($order->items as $item)

                        <tr>

                            {{-- ITEM --}}
                            <td>

                                @if($item->product)

                                    <strong>
                                        {{ $item->product->nama_produk }}
                                    </strong>

                                @elseif($item->box)

                                    <strong>
                                        {{ $item->box->nama_box }}
                                    </strong>

                                @else

                                    <span class="item-missing">
                                        Item tidak ditemukan
                                    </span>

                                @endif

                            </td>


                            {{-- JENIS --}}
                            <td>

                                @if($item->product)

                                    <span class="type-badge product-type">
                                        Produk
                                    </span>

                                @elseif($item->box)

                                    <span class="type-badge box-type">
                                        Smart Child Box
                                    </span>

                                @else

                                    <span class="type-badge">
                                        -

                                    </span>

                                @endif

                            </td>


                            {{-- JUMLAH --}}
                            <td>
                                {{ $item->jumlah }}
                            </td>


                            {{-- HARGA --}}
                            <td>

                                @if($item->product)

                                    Rp{{ number_format(
                                        $item->product->harga,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                @elseif($item->box)

                                    Rp{{ number_format(
                                        $item->box->harga,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- SUBTOTAL --}}
                            <td>

                                <strong>
                                    Rp{{ number_format(
                                        $item->subtotal,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </strong>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="empty-data"
                            >
                                Tidak ada item pesanan.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- TOTAL --}}
        <div class="order-total">

            <span>
                Total Pesanan
            </span>

            <strong>
                Rp{{ number_format(
                    $order->total_harga,
                    0,
                    ',',
                    '.'
                ) }}
            </strong>

        </div>

    </div>

</div>


<style>

    .container-fluid {
        padding: 10px 0;
    }


    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }


    .page-header h1 {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 28px;
        font-weight: 700;
        color: #315C50;
    }


    .page-header p {
        margin-top: 6px;
        margin-bottom: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        color: #667085;
    }


    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 15px;
        border-radius: 8px;
        background: #FFF9F2;
        color: #315C50;
        border: 1px solid #E8E4DC;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 600;
        transition: 0.2s ease;
    }


    .btn-back:hover {
        background: #F4EFE7;
    }


    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }


    .detail-card {
        background: #FFFFFF;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(49, 92, 80, 0.08);
        overflow: hidden;
    }


    .card-title {
        padding: 18px 20px;
        background: #FFF9F2;
        color: #315C50;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #E8ECEA;
    }


    .info-list {
        padding: 8px 20px;
    }


    .info-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        padding: 13px 0;
        border-bottom: 1px solid #F0F2F1;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
    }


    .info-row:last-child {
        border-bottom: none;
    }


    .info-row span {
        color: #667085;
        flex-shrink: 0;
    }


    .info-row strong {
        color: #344054;
        font-weight: 600;
        text-align: right;
    }


    .address-row strong {
        max-width: 65%;
        line-height: 1.6;
    }


    .status {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 600;
    }


    .status.pending {
        background: #FFF4D6;
        color: #9A6700;
    }


    .status.process {
        background: #E3F3EE;
        color: #315C50;
    }


    .status.rejected {
        background: #FDECEC;
        color: #B42318;
    }


    .order-items-card {
        margin-bottom: 20px;
    }


    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }


    .order-detail-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
    }


    .order-detail-table th {
        background: #FFFFFF;
        color: #667085;
        font-size: 11px;
        font-weight: 600;
        text-align: left;
        padding: 14px 20px;
        border-bottom: 1px solid #E8ECEA;
        white-space: nowrap;
    }


    .order-detail-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #F0F2F1;
        color: #475467;
        font-size: 12px;
        vertical-align: middle;
    }


    .order-detail-table tr:last-child td {
        border-bottom: none;
    }


    .order-detail-table td strong {
        color: #315C50;
        font-weight: 600;
    }


    .type-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 600;
    }


    .product-type {
        background: #E3F3EE;
        color: #315C50;
    }


    .box-type {
        background: #FFF0EB;
        color: #A4513D;
    }


    .item-missing {
        color: #B42318;
    }


    .order-total {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 35px;
        padding: 18px 20px;
        background: #FFF9F2;
        border-top: 1px solid #E8ECEA;
        font-family: 'Poppins', sans-serif;
    }


    .order-total span {
        color: #667085;
        font-size: 13px;
        font-weight: 600;
    }


    .order-total strong {
        color: #315C50;
        font-size: 18px;
        font-weight: 700;
    }


    .empty-data {
        text-align: center !important;
        padding: 35px !important;
        color: #98A2B3 !important;
    }


    @media (max-width: 768px) {

        .page-header {
            align-items: flex-start;
            gap: 15px;
        }


        .detail-grid {
            grid-template-columns: 1fr;
        }


        .info-row {
            flex-direction: column;
            gap: 5px;
        }


        .info-row strong {
            text-align: left;
        }


        .address-row strong {
            max-width: 100%;
        }

    }

</style>

@endsection