<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partnership - Smart Child</title>
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc;">

    @include('layout.header')

    <div style="min-height: 85vh; padding: 40px 20px;">
        <!-- Diperlebar max-width-nya agar sejajar dan selaras dengan header -->
        <div style="max-width: 1200px; margin: 0 auto;">
            
            <!-- Banner / Header Section -->
            <div style="background: linear-gradient(135deg, #285B4D 0%, #1e453b 100%); color: white; padding: 40px; border-radius: 16px; margin-bottom: 30px; text-align: center; box-shadow: 0 4px 15px rgba(40, 91, 77, 0.2);">
                <h1 style="margin: 0 0 10px 0; font-size: 28px; font-weight: 700;">Smart Child Partnership</h1>
                <p style="margin: 0 0 25px 0; font-size: 15px; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Mari berkolaborasi bersama kami dalam memajukan pendidikan dan teknologi melalui program School Partnership dan Business Partner.
                </p>
                <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                    <a href="{{ route('partnership.form', ['type' => 'School']) }}" style="background: white; color: #285B4D; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <i class="fa-solid fa-school me-2"></i> Daftar School Partnership
                    </a>
                    <a href="{{ route('partnership.form', ['type' => 'Business']) }}" style="background: transparent; color: white; border: 2px solid white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">
                        <i class="fa-solid fa-briefcase me-2"></i> Daftar Business Partner
                    </a>
                </div>
            </div>

            <!-- Alert Success Notification -->
            @if(session('success'))
                <div style="background-color: #d1e7dd; color: #0f5132; padding: 15px 20px; border-radius: 10px; margin-bottom: 25px; font-size: 14px; font-weight: 500; border: 1px solid #badbcc;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Daftar Partnership yang Masuk -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);">
                <h3 style="margin: 0 0 20px 0; font-size: 18px; font-weight: 700; color: #1e293b; border-bottom: 2px solid #f1f5f9; padding-bottom: 12px;">
                    Daftar Instansi / Mitra Terdaftar
                </h3>

                @if(isset($partnerships) && $partnerships->count() > 0)
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        @foreach($partnerships as $item)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                                <div>
                                    <h4 style="margin: 0 0 5px 0; font-size: 16px; font-weight: 600; color: #2d3748;">{{ $item->nama_instansi }}</h4>
                                    <p style="margin: 0; font-size: 13px; color: #64748b;">
                                        PIC: <strong>{{ $item->kontak_person }}</strong> | Email: {{ $item->email }}
                                    </p>
                                    @if($item->pesan)
                                        <p style="margin: 5px 0 0 0; font-size: 12px; color: #475569; font-style: italic;">"{{ $item->pesan }}"</p>
                                    @endif
                                </div>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <!-- Badge Tipe Partner (School / Business) -->
                                    <span style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: {{ $item->tipe_partner == 'School' ? '#e0f2fe' : '#fef3c7' }}; color: {{ $item->tipe_partner == 'School' ? '#0369a1' : '#b45309' }};">
                                        {{ $item->tipe_partner }}
                                    </span>

                                    <!-- Badge Status Pengajuan (Process / Confirm / Cancel) -->
                                    @if($item->status == 'Confirmed')
                                        <span style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #d1e7dd; color: #0f5132;">
                                            Confirm
                                        </span>
                                    @elseif($item->status == 'Cancelled')
                                        <span style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #f8d7da; color: #842029;">
                                            Cancel
                                        </span>
                                    @else
                                        <span style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #e2e8f0; color: #475569;">
                                            Process
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 40px 0; color: #94a3b8;">
                        <p style="margin: 0; font-size: 14px;">Belum ada instansi yang mendaftar partnership.</p>
                    </div>
                @endif

            </div>

        </div>
    </div>

</body>
</html>