@extends('layout.dashboard_admin')

@section('content')

<div class="container-fluid">

    <div class="page-header">
        <div>
            <h1>Pesanan</h1>
            <p>Kelola pesanan pelanggan Smart Child.</p>
        </div>
    </div>


    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="order-card">

        <div class="table-wrapper">

            <table class="order-table">

                <thead>
                    <tr>
                        <th>No. Order</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr>

                            {{-- NOMOR ORDER --}}
                            <td>
                                <strong>
                                    {{ $order->nomor_order }}
                                </strong>
                            </td>


                            {{-- PELANGGAN --}}
                            <td>
                                @if($order->user)
                                    {{ $order->user->nama }}
                                @else
                                    {{ $order->nama_penerima }}
                                @endif
                            </td>


                            {{-- TANGGAL --}}
                            <td>
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </td>


                            {{-- TOTAL --}}
                            <td>
                                Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>


                            {{-- PEMBAYARAN --}}
                            <td>

                                <div>
                                    {{ $order->metode_pembayaran }}
                                </div>

                                <small>
                                    {{ $order->payment_status }}
                                </small>

                            </td>


                            {{-- STATUS --}}
                            <td>

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

                            </td>


                            {{-- AKSI --}}
                            <td>

                                @if($order->status_pesanan === 'Pending')

                                    <div class="action-wrapper">

                                        {{-- ACC --}}
                                        <form
                                            action="{{ route('admin.orders.accept', $order->order_id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn-accept"
                                                onclick="return confirm('Terima pesanan ini?')"
                                            >
                                                ACC
                                            </button>

                                        </form>


                                        {{-- TOLAK --}}
                                        <form
                                            action="{{ route('admin.orders.reject', $order->order_id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn-reject"
                                                onclick="return confirm('Tolak pesanan ini?')"
                                            >
                                                Tolak
                                            </button>

                                        </form>

                                    </div>

                                @else

                                    <span class="no-action">
                                        Sudah diproses
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty-data"
                            >
                                Belum ada pesanan.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


<style>

    .container-fluid {
        padding: 10px 0;
    }


    .page-header {
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


    .order-card {
        background: #FFFFFF;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(49, 92, 80, 0.08);
        overflow: hidden;
    }


    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }


    .order-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
    }


    .order-table th {
        background: #FFF9F2;
        color: #315C50;
        font-size: 13px;
        font-weight: 600;
        text-align: left;
        padding: 16px 18px;
        border-bottom: 1px solid #E8ECEA;
        white-space: nowrap;
    }


    .order-table td {
        padding: 16px 18px;
        border-bottom: 1px solid #F0F2F1;
        color: #475467;
        font-size: 13px;
        vertical-align: middle;
    }


    .order-table tr:last-child td {
        border-bottom: none;
    }


    .order-table td strong {
        color: #315C50;
        font-weight: 600;
    }


    .order-table small {
        color: #98A2B3;
        font-size: 11px;
    }


    .status {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        background: #F2F4F7;
        color: #667085;
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


    .action-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }


    .action-wrapper form {
        margin: 0;
    }


    .btn-accept,
    .btn-reject {
        border: none;
        border-radius: 8px;
        padding: 8px 13px;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
    }


    .btn-accept {
        background: #6FAF9B;
        color: #FFFFFF;
    }


    .btn-accept:hover {
        background: #5E9E8A;
    }


    .btn-reject {
        background: #FDECEC;
        color: #B42318;
    }


    .btn-reject:hover {
        background: #F8D7D5;
    }


    .no-action {
        color: #98A2B3;
        font-size: 11px;
    }


    .empty-data {
        text-align: center !important;
        padding: 40px !important;
        color: #98A2B3 !important;
    }


    .alert {
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
    }


    .alert-success {
        background: #E3F3EE;
        color: #315C50;
    }


    .alert-danger {
        background: #FDECEC;
        color: #B42318;
    }

</style>

@endsection