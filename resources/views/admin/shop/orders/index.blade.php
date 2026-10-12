@extends('layout.dashboard_admin')

@section('content')

<div class="container-fluid">


    {{-- =====================================================
         HEADER
    ===================================================== --}}

    <div class="page-header">

        <div>

            <h1>
                Pesanan
            </h1>

            <p>
                Kelola pesanan pelanggan Smart Child.
            </p>

        </div>

    </div>


    {{-- =====================================================
         ALERT SUCCESS
    ===================================================== --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =====================================================
         ALERT ERROR
    ===================================================== --}}

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- =====================================================
         ORDER TABLE
    ===================================================== --}}

    <div class="order-card">

        <div class="table-wrapper">

            <table class="order-table">

                <thead>

                    <tr>

                        <th>
                            No. Order
                        </th>

                        <th>
                            Pelanggan
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Pembayaran
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($orders as $order)

                        <tr>


                            {{-- =================================================
                                 NOMOR ORDER
                            ================================================= --}}

                            <td>

                                <strong>
                                    {{ $order->nomor_order }}
                                </strong>

                            </td>


                            {{-- =================================================
                                 PELANGGAN
                            ================================================= --}}

                            <td>

                                @if($order->user)

                                    {{ $order->user->nama }}

                                @else

                                    {{ $order->nama_penerima }}

                                @endif

                            </td>


                            {{-- =================================================
                                 TANGGAL
                            ================================================= --}}

                            <td>

                                {{ $order->created_at->format('d/m/Y H:i') }}

                            </td>


                            {{-- =================================================
                                 TOTAL
                            ================================================= --}}

                            <td>

                                Rp{{ number_format(
                                    $order->total_harga,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            {{-- =================================================
                                 PEMBAYARAN
                            ================================================= --}}

                            <td>

                                <div>
                                    {{ $order->metode_pembayaran }}
                                </div>

                                @if(
                                    $order->payment_status
                                    === 'Dikonfirmasi'
                                )

                                    <small class="payment-confirmed">
                                        {{ $order->payment_status }}
                                    </small>

                                @elseif(
                                    $order->payment_status
                                    === 'Ditolak'
                                )

                                    <small class="payment-rejected">
                                        {{ $order->payment_status }}
                                    </small>

                                @else

                                    <small>
                                        {{ $order->payment_status }}
                                    </small>

                                @endif

                            </td>


                            {{-- =================================================
                                 STATUS
                            ================================================= --}}

                            <td>


                                @if(
                                    $order->status_pesanan
                                    === 'Pending'
                                )

                                    <span class="status pending">
                                        Pending
                                    </span>


                                @elseif(
                                    $order->status_pesanan
                                    === 'Diproses'
                                )

                                    <span class="status process">
                                        Diproses
                                    </span>


                                @elseif(
                                    $order->status_pesanan
                                    === 'Dikirim'
                                )

                                    <span class="status shipped">
                                        Dikirim
                                    </span>


                                @elseif(
                                    $order->status_pesanan
                                    === 'Ditolak'
                                )

                                    <span class="status rejected">
                                        Ditolak
                                    </span>


                                @elseif(
                                    $order->status_pesanan
                                    === 'Selesai'
                                )

                                    <span class="status completed">
                                        Selesai
                                    </span>


                                @else

                                    <span class="status">
                                        {{ $order->status_pesanan }}
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================= --}}

                            <td>

                                <div class="action-wrapper">


                                    {{-- DETAIL --}}

                                    <a
                                        href="{{ route(
                                            'admin.orders.show',
                                            $order->order_id
                                        ) }}"
                                        class="btn-detail"
                                    >
                                        Detail
                                    </a>


                                    {{-- =================================================
                                         PENDING
                                    ================================================= --}}

                                    @if(
                                        $order->status_pesanan
                                        === 'Pending'
                                    )


                                        {{-- ACC --}}

                                        <form
                                            action="{{ route(
                                                'admin.orders.accept',
                                                $order->order_id
                                            ) }}"
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
                                            action="{{ route(
                                                'admin.orders.reject',
                                                $order->order_id
                                            ) }}"
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


                                    @endif


                                    {{-- =================================================
                                         DIPROSES
                                    ================================================= --}}

                                    @if(
                                        $order->status_pesanan
                                        === 'Diproses'
                                    )

                                        <form
                                            action="{{ route(
                                                'admin.orders.ship',
                                                $order->order_id
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PATCH')


                                            <button
                                                type="submit"
                                                class="btn-ship"
                                                onclick="return confirm('Kirim pesanan ini?')"
                                            >
                                                Dikirim
                                            </button>

                                        </form>

                                    @endif


                                    {{-- =================================================
                                         DIKIRIM
                                    ================================================= --}}

                                    @if(
                                        $order->status_pesanan
                                        === 'Dikirim'
                                    )

                                        <form
                                            action="{{ route(
                                                'admin.orders.complete',
                                                $order->order_id
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PATCH')


                                            <button
                                                type="submit"
                                                class="btn-complete"
                                                onclick="return confirm('Selesaikan pesanan ini?')"
                                            >
                                                Selesai
                                            </button>

                                        </form>

                                    @endif


                                </div>

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


    /* =====================================================
       CONTAINER
    ===================================================== */

    .container-fluid {
        padding: 10px 0;
    }


    /* =====================================================
       HEADER
    ===================================================== */

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


    /* =====================================================
       ORDER CARD
    ===================================================== */

    .order-card {

        background: #FFFFFF;

        border-radius: 14px;

        box-shadow:
            0 4px 18px
            rgba(
                49,
                92,
                80,
                0.08
            );

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

        border-bottom:
            1px solid #E8ECEA;

        white-space: nowrap;

    }


    .order-table td {

        padding: 16px 18px;

        border-bottom:
            1px solid #F0F2F1;

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


    .payment-confirmed {

        color: #315C50 !important;

        font-weight: 600;

    }


    .payment-rejected {

        color: #B42318 !important;

        font-weight: 600;

    }


    /* =====================================================
       STATUS
    ===================================================== */

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


    .status.shipped {

        background: #E8F1FF;

        color: #315C50;

    }


    .status.rejected {

        background: #FDECEC;

        color: #B42318;

    }


    .status.completed {

        background: #E8F1FF;

        color: #315C50;

    }


    /* =====================================================
       ACTION
    ===================================================== */

    .action-wrapper {

        display: flex;

        align-items: center;

        gap: 8px;

        flex-wrap: wrap;

    }


    .action-wrapper form {

        margin: 0;

    }


    .btn-detail,
    .btn-accept,
    .btn-reject,
    .btn-ship,
    .btn-complete {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border-radius: 8px;

        padding: 8px 13px;

        font-family: 'Poppins', sans-serif;

        font-size: 11px;

        font-weight: 600;

        cursor: pointer;

        transition: 0.2s ease;

        text-decoration: none;

        box-sizing: border-box;

    }


    .btn-detail {

        background: #FFF9F2;

        color: #315C50;

        border: 1px solid #E8E4DC;

    }


    .btn-detail:hover {

        background: #F4EFE7;

    }


    .btn-accept {

        background: #6FAF9B;

        color: #FFFFFF;

        border: none;

    }


    .btn-accept:hover {

        background: #5E9E8A;

    }


    .btn-reject {

        background: #FDECEC;

        color: #B42318;

        border: none;

    }


    .btn-reject:hover {

        background: #F8D7D5;

    }


    .btn-ship {

        background: #E8F1FF;

        color: #315C50;

        border: none;

    }


    .btn-ship:hover {

        background: #D9E8FA;

    }


    .btn-complete {

        background: #315C50;

        color: #FFFFFF;

        border: none;

    }


    .btn-complete:hover {

        background: #264B41;

    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .empty-data {

        text-align: center !important;

        padding: 40px !important;

        color: #98A2B3 !important;

    }


    /* =====================================================
       ALERT
    ===================================================== */

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