@extends('layout.dashboard_admin')

@section('page-title', 'Notifikasi')

@section('content')

<style>

    /* =====================================================
       PAGE
    ===================================================== */

    .notification-page {
        width: 100%;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .notification-header {
        margin-bottom: 25px;
    }

    .notification-header h1 {
        margin: 0 0 6px;

        font-family: 'Poppins', sans-serif;

        font-size: 28px;

        font-weight: 700;

        color: #315C50;
    }

    .notification-header p {
        margin: 0;

        font-family: 'Poppins', sans-serif;

        font-size: 14px;

        color: #667085;
    }


    /* =====================================================
       NOTIFICATION CARD
    ===================================================== */

    .notification-card {

        background: #FFFFFF;

        border: 1px solid #E8EEEA;

        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 4px 15px
            rgba(
                37,
                61,
                50,
                0.04
            );

    }


    /* =====================================================
       NOTIFICATION ITEM
    ===================================================== */

    .notification-item {

        display: flex;

        align-items: center;

        gap: 16px;

        padding: 20px 22px;

        border-bottom:
            1px solid #EEF2EF;

        text-decoration: none;

        transition: 0.2s ease;

    }


    .notification-item:last-child {

        border-bottom: none;

    }


    .notification-item:hover {

        background: #FAFCFB;

    }


    /* =====================================================
       ICON
    ===================================================== */

    .notification-icon {

        width: 46px;

        height: 46px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 13px;

        background: #FFF9F2;

        color: #F39C50;

        font-size: 18px;

    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .notification-content {

        flex: 1;

        min-width: 0;

    }


    .notification-content h3 {

        margin: 0 0 5px;

        font-family: 'Poppins', sans-serif;

        font-size: 14px;

        font-weight: 700;

        color: #315C50;

    }


    .notification-content p {

        margin: 0 0 5px;

        font-family: 'Poppins', sans-serif;

        font-size: 12px;

        color: #667085;

    }


    .notification-content strong {

        color: #315C50;

    }


    .notification-content small {

        font-family: 'Poppins', sans-serif;

        font-size: 10px;

        color: #98A2B3;

    }


    /* =====================================================
       ACTION
    ===================================================== */

    .notification-action {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        padding: 8px 13px;

        border-radius: 8px;

        background: #FFF9F2;

        border: 1px solid #E8E4DC;

        color: #315C50;

        font-family: 'Poppins', sans-serif;

        font-size: 11px;

        font-weight: 600;

        text-decoration: none;

        white-space: nowrap;

        transition: 0.2s ease;

    }


    .notification-action:hover {

        background: #F4EFE7;

        color: #315C50;

    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .notification-empty {

        padding: 65px 20px;

        text-align: center;

    }


    .notification-empty-icon {

        width: 60px;

        height: 60px;

        margin: 0 auto 16px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 50%;

        background: #E3F3EE;

        color: #6FAF9B;

        font-size: 24px;

    }


    .notification-empty h3 {

        margin: 0 0 6px;

        font-family: 'Poppins', sans-serif;

        font-size: 16px;

        font-weight: 700;

        color: #315C50;

    }


    .notification-empty p {

        margin: 0;

        font-family: 'Poppins', sans-serif;

        font-size: 12px;

        color: #667085;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 650px) {

        .notification-item {

            align-items: flex-start;

            padding: 17px;

        }


        .notification-action {

            padding: 7px 10px;

        }

    }

</style>


<div class="notification-page">


    {{-- =====================================================
         HEADER
    ===================================================== --}}

    <div class="notification-header">

        <h1>
            Notifikasi
        </h1>

        <p>
            Informasi yang membutuhkan perhatian dari admin.
        </p>

    </div>


    {{-- =====================================================
         NOTIFICATION LIST
    ===================================================== --}}

    <div class="notification-card">


        @if($pesananMenunggu->count() > 0)


            @foreach($pesananMenunggu as $order)


                <a
                    href="{{ route(
                        'admin.orders.show',
                        $order->order_id
                    ) }}"
                    class="notification-item"
                >


                    {{-- ICON --}}

                    <div class="notification-icon">

                        <i class="fa-solid fa-receipt"></i>

                    </div>


                    {{-- CONTENT --}}

                    <div class="notification-content">

                        <h3>
                            Pesanan Baru
                        </h3>


                        <p>

                            Pesanan

                            <strong>
                                {{ $order->nomor_order }}
                            </strong>

                            menunggu konfirmasi pembayaran.

                        </p>


                        <small>

                            {{ $order->created_at
                                ? $order->created_at->diffForHumans()
                                : 'Baru saja'
                            }}

                        </small>

                    </div>


                    {{-- ACTION --}}

                    <div class="notification-action">

                        Lihat Pesanan

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>


                </a>


            @endforeach


        @else


            {{-- =================================================
                 EMPTY
            ================================================== --}}

            <div class="notification-empty">

                <div class="notification-empty-icon">

                    <i class="fa-regular fa-bell-slash"></i>

                </div>


                <h3>
                    Tidak ada notifikasi
                </h3>


                <p>
                    Semua aktivitas yang membutuhkan tindakan
                    sudah selesai.
                </p>

            </div>


        @endif


    </div>


</div>


@endsection