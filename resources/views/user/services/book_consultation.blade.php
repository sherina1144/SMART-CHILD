<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Consultation - SmartChild</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #fcfdfd;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 15px 60px 15px;
        }
        .hero-banner {
            background-color: #f3f7f0;
            border-radius: 20px;
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }
        .hero-left {
            flex: 1;
        }
        .hero-left h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }
        .hero-left p.sub-title {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .info-pill {
            background: #ffffff;
            border-radius: 12px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 500;
        }
        .info-pill i {
            font-size: 18px;
            color: #4a7c59;
        }
        .features-inline {
            display: flex;
            gap: 20px;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 11px;
        }
        .feature-item i {
            font-size: 16px;
            color: #4a7c59;
            margin-top: 2px;
        }
        .feature-item strong {
            display: block;
            color: #1a202c;
            font-size: 12px;
        }
        .hero-right {
            width: 450px;
            height: 250px;
            border-radius: 16px;
            overflow: hidden;
            flex-shrink: 0;
        }
        .hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .quote-banner {
            background-color: #f8faf6;
            border: 1px solid #e2ebd8;
            border-radius: 16px;
            padding: 18px 30px;
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 40px;
        }
        .quote-banner .icon-box {
            font-size: 28px;
            color: #4a7c59;
        }
        .quote-banner .quote-text {
            display: flex;
            gap: 40px;
            font-size: 13px;
            color: #4a5568;
            width: 100%;
        }
        .quote-banner .quote-text div {
            flex: 1;
            position: relative;
        }
        .quote-banner .quote-text div:first-child::after {
            content: '';
            position: absolute;
            right: -20px;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #cbd5e1;
        }
        .booking-grid {
            display: grid;
            grid-template-columns: 480px 1fr;
            gap: 40px;
        }
        .section-title {
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
            color: #1a202c;
        }
        .section-title i {
            color: #4a7c59;
        }
        .doctor-selected-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px;
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 25px;
            position: relative;
        }
        .doctor-selected-card img {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            object-fit: cover;
        }
        .doctor-selected-info h3 {
            font-size: 15px;
            font-weight: 700;
            color: #1a202c;
        }
        .doctor-selected-info p {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 5px;
        }
        .doctor-meta {
            display: flex;
            gap: 12px;
            font-size: 11px;
            color: #64748b;
            margin-bottom: 8px;
        }
        .doctor-meta i {
            color: #f59e0b;
        }
        .badge-specialist {
            display: inline-block;
            background: #f1f5f9;
            color: #64748b;
            font-size: 10px;
            padding: 4px 8px;
            border-radius: 6px;
        }
        .btn-change-doctor {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 10px;
            border: 1px solid #cbd5e1;
            padding: 3px 8px;
            border-radius: 6px;
            color: #64748b;
            text-decoration: none;
        }
        .consult-type-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }
        .type-card {
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }
        .type-card.active {
            border-color: #4a7c59;
            background-color: #f8faf6;
        }
        .type-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a7c59;
            font-size: 16px;
        }
        .type-info h4 {
            font-size: 12px;
            font-weight: 600;
        }
        .type-info p {
            font-size: 10px;
            color: #64748b;
        }
        .date-time-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        .calendar-box {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            background: #fff;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            text-align: center;
            font-size: 10px;
        }
        .calendar-grid div {
            padding: 6px 0;
            border-radius: 50%;
            cursor: pointer;
        }
        .calendar-grid .day-name {
            font-weight: 600;
            color: #94a3b8;
            cursor: default;
        }
        .calendar-grid .active-day {
            background-color: #2d3748;
            color: #fff;
        }
        .time-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
        .time-btn {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px;
            text-align: center;
            font-size: 11px;
            cursor: pointer;
            background: #fff;
            color: #4a5568;
        }
        .time-btn.active {
            background-color: #2d3748;
            color: #fff;
            border-color: #2d3748;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 12px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 12px;
        }
        .form-group label {
            font-size: 11px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 5px;
        }
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 12px;
            outline: none;
            width: 100%;
        }
        .form-control:focus {
            border-color: #4a7c59;
        }
        textarea.form-control {
            resize: none;
        }
        .payment-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        .payment-item {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            background: #fff;
        }
        .payment-item input[type="radio"] {
            accent-color: #4a7c59;
        }
        .bank-dropdown-wrapper {
            position: relative;
            grid-column: span 1;
        }
        .bank-header {
            justify-content: space-between;
        }
        .bank-header i {
            font-size: 11px;
            color: #64748b;
            transition: transform 0.2s;
        }
        .bank-options {
            display: none;
            position: absolute;
            top: 105%;
            left: 0;
            right: 0;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 99;
            overflow: hidden;
        }
        .bank-options.show {
            display: block;
        }
        .bank-option-item {
            padding: 10px 14px;
            cursor: pointer;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12px;
            font-weight: 500;
            color: #334155;
            transition: background 0.15s;
        }
        .bank-option-item:last-child {
            border-bottom: none;
        }
        .bank-option-item:hover {
            background-color: #f8fafc;
            color: #1e293b;
        }
        .bank-option-item.active {
            background-color: #f0fdf4;
            color: #166534;
            font-weight: 600;
        }
        .payment-notice {
            background-color: #fef8f4;
            border-radius: 10px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            font-size: 11px;
            color: #8a4b08;
        }
        .payment-notice i {
            font-size: 18px;
            color: #e07a5f;
        }
        .btn-submit-booking {
            width: 100%;
            background-color: #e07a5f;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background 0.2s;
        }
        .btn-submit-booking:hover {
            background-color: #d0694e;
        }
        .btn-save-draft {
            width: 100%;
            background: #fff;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .bottom-features {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 50px;
            padding-top: 25px;
            border-top: 1px solid #f1f5f9;
        }
        .bottom-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 10px;
            color: #64748b;
        }
        .bottom-feature-item i {
            font-size: 16px;
            color: #4a7c59;
        }
        .bottom-feature-item strong {
            display: block;
            color: #1a202c;
            font-size: 11px;
        }
    </style>
</head>
<body>

    @include('layout.header')

    <div class="container">
    
    <div class="hero-banner">
        <div class="hero-left">
            <h1>Book Consultation</h1>
            <p class="sub-title">Pilih dokter atau terapis, tentukan jadwal yang sesuai,<br>dan dapatkan konsultasi terbaik untuk tumbuh kembang anak anda.</p>
            <div class="info-pill">
                <i class="fa-solid fa-user-group"></i>
                Temukan tenaga profesional yang tepat untuk mendukung tumbuh kembang anak anda.
            </div>
            <div class="features-inline">
                <div class="feature-item">
                    <i class="fa-solid fa-stethoscope"></i>
                    <div>
                        <strong>Beragam Spesialis</strong>
                        Dokter, Psikolog, Terapis, dan Konselor profesional
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fa-solid fa-shield-check"></i>
                    <div>
                        <strong>Terverifikasi</strong>
                        Semua mitra telah melalui proses verifikasi
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fa-regular fa-calendar-days"></i>
                    <div>
                        <strong>Jadwal Fleksibel</strong>
                        Pilih waktu konsultasi yang sesuai untuk anda
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=80" alt="Consultation Child">
        </div>
    </div>

    <div class="quote-banner">
        <div class="icon-box">
            <i class="fa-regular fa-face-smile"></i>
        </div>
        <div class="quote-text">
            <div>Setiap langkah kecil hari ini, membangun masa depan besar bagi mereka.</div>
            <div>Bersama tenaga profesional yang berpengalaman, kita dukung anak tumbuh sehat, bahagia, dan percaya diri.</div>
        </div>
    </div>

    <form action="{{ route('user.consultation.store') }}" method="POST">
        @csrf
        
        <input type="hidden" name="doctor_id" id="input_doctor_id" value="{{ $selectedDoctor->doctor_id ?? '' }}" required>
        <input type="hidden" name="consultation_type" id="input_consultation_type" value="Online">
        <input type="hidden" name="booking_date" id="input_booking_date">
        <input type="hidden" name="booking_time" id="input_booking_time" value="10:00">
        <div class="booking-grid">
            
            <div class="grid-left">   
                
                <div class="section-title">
                    <i class="fa-solid fa-user-doctor"></i> Dokter / Terapis yang dipilih
                </div>

                <div class="doctor-selected-card">
                    @if(isset($selectedDoctor) && $selectedDoctor)
                        <a href="{{ route('user.doctor.index') }}" class="btn-change-doctor">Ubah Dokter / Terapis</a>
                        <img src="{{ isset($selectedDoctor->foto) ? asset('storage/' . $selectedDoctor->foto) : 'https://via.placeholder.com/80' }}" alt="Dokter">
                        <div class="doctor-selected-info">
                            <h3>{{ $selectedDoctor->nama_lengkap }}</h3>
                            <p>{{ $selectedDoctor->kategori }}</p>
                            <div class="doctor-meta">
                                <span><i class="fa-solid fa-star"></i> {{ $selectedDoctor->rating ?? '5.0' }}</span>
                                <span>{{ $selectedDoctor->lama_pengalaman ?? '0' }} tahun pengalaman</span>
                            </div>
                            <span class="badge-specialist">Spesialisasi: {{ $selectedDoctor->spesialisasi ?? 'Tumbuh kembang anak' }}</span>
                        </div>
                    @else
                        <div class="doctor-placeholder" style="width: 100%; text-align: center; padding: 15px 0;">
                            <p style="margin-bottom: 12px; color: #666; font-weight: 500;">Silakan pilih Dokter atau Terapis terlebih dahulu untuk melanjutkan booking.</p>
                            <a href="{{ route('user.doctor.index') }}" class="btn-change-doctor" style="position: static; display: inline-block;">Pilih Dokter / Terapis</a>
                        </div>
                    @endif
                </div>

                <div class="section-title">
                    <i class="fa-solid fa-headset"></i> Jenis Konsultasi
                </div>

                <div class="consult-type-options">
                    <div class="type-card active" onclick="selectType('Online', this)">
                        <div class="type-icon"><i class="fa-solid fa-video"></i></div>
                        <div class="type-info">
                            <h4>Online consultation</h4>
                            <p>Konsultasi melalui video call</p>
                        </div>
                    </div>

                    <div class="type-card" onclick="selectType('Offline', this)">
                        <div class="type-icon"><i class="fa-solid fa-building-user"></i></div>
                        <div class="type-info">
                            <h4>Offline Consultation</h4>
                            <p>Konsultasi di Klinik atau tatap muka langsung</p>
                        </div>
                    </div>
                </div>

                <div class="date-time-wrapper">
                    <div>
                        <div class="section-title">
                            <i class="fa-regular fa-calendar"></i> Pilih Tanggal
                        </div>

                        <div class="calendar-box">
                            <div class="calendar-header">
                                <span id="prevMonth" style="cursor: pointer; padding: 0 8px;">&lt;</span>
                                <span id="monthYearTitle" style="font-weight: 600;">-</span>
                                <span id="nextMonth" style="cursor: pointer; padding: 0 8px;">&gt;</span>
                            </div>

                            <div class="calendar-grid" id="calendarDays">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="section-title">
                            <i class="fa-regular fa-clock"></i> Pilih Waktu Tersedia
                        </div>
                        <div class="time-grid" id="timeSlotsContainer">
                            @if(isset($selectedDoctor) && $selectedDoctor->schedules && $selectedDoctor->schedules->count() > 0)

                                @foreach($selectedDoctor->schedules as $sch)
                                    @php
                                        $rawTime = date('H:i:s', strtotime($sch->start_time));
                                        $displayTime = date('H:i', strtotime($sch->start_time));
                                    @endphp

                                    <div
                                        class="time-btn"
                                        data-time="{{ $rawTime }}"
                                        onclick="selectTime('{{ $rawTime }}', this)"> {{ $displayTime }}
                                    </div>
                                @endforeach
                            @else

                                <div class="time-btn active" data-time="09:00:00" onclick="selectTime('09:00', this)">09:00</div>
                                <div class="time-btn" data-time="09:30:00" onclick="selectTime('09:30', this)">09:30</div>
                                <div class="time-btn" data-time="10:00:00" onclick="selectTime('10:00', this)">10:00</div>
                                <div class="time-btn" data-time="10:30:00" onclick="selectTime('10:30', this)">10:30</div>
                                <div class="time-btn" data-time="11:00:00" onclick="selectTime('11:00', this)">11:00</div>
                                <div class="time-btn" data-time="11:30:00" onclick="selectTime('11:30', this)">11:30</div>
                                <div class="time-btn" data-time="13:00:00" onclick="selectTime('13:00', this)">13:00</div>
                                <div class="time-btn" data-time="13:30:00" onclick="selectTime('13:30', this)">13:30</div>
                                <div class="time-btn" data-time="14:00:00" onclick="selectTime('14:00', this)">14:00</div>
                                <div class="time-btn" data-time="14:30:00" onclick="selectTime('14:30', this)">14:30</div>
                                <div class="time-btn" data-time="15:00:00" onclick="selectTime('15:00', this)">15:00</div>
                                <div class="time-btn" data-time="15:30:00" onclick="selectTime('15:30', this)">15:30</div>

                            @endif
                        </div>
                    </div>

                </div>

            </div>
    
            <div class="grid-right">
                
                <div class="section-title">
                    <i class="fa-regular fa-id-card"></i> Informasi Anak
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="child_name" class="form-control" placeholder="Masukkan nama anak" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Wali</label>
                        <input type="text" name="parent_name" class="form-control" placeholder="Masukkan nama orang tua/wali" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Usia Anak (Tahun)</label>
                        <input type="number" name="child_age" class="form-control" placeholder="Contoh: 5" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="child_gender" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nomer Telfon Aktif</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="08XXXXXXXXXX" required>
                    </div>

                    <div class="form-group">
                        <label>Email Aktif</label>
                        <input type="email" name="email" class="form-control" placeholder="email@domain.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address" rows="2" class="form-control" placeholder="Alamat lengkap tempat tinggal" required></textarea>
                </div>

                <div class="form-group">
                    <label>Keluhan / Kebutuhan Utama</label>
                    <textarea name="complaint" rows="3" class="form-control" placeholder="Jelaskan secara singkat kondisi atau keluhan anak anda..."></textarea>
                </div>

                <div class="section-title" style="margin-top: 20px;">
                    Metode Pembayaran
                </div>
                
                <div class="payment-grid">

                    <label class="payment-item">
                        <input type="radio" name="payment_method" value="GoPay" checked onclick="closeBankDropdown()">
                        <span>GoPay</span>
                    </label>

                    <label class="payment-item">
                        <input type="radio" name="payment_method" value="DANA" onclick="closeBankDropdown()">
                        <span>DANA</span>
                    </label>

                    <label class="payment-item">
                        <input type="radio" name="payment_method" value="OVO" onclick="closeBankDropdown()">
                        <span>OVO</span>
                    </label>

                    <label class="payment-item">
                        <input type="radio" name="payment_method" value="ShopeePay" onclick="closeBankDropdown()">
                        <span>ShopeePay</span>
                    </label>

                    <label class="payment-item">
                        <input type="radio" name="payment_method" value="QRIS" onclick="closeBankDropdown()">
                        <span>QRIS</span>
                    </label>

                    <div class="bank-dropdown-wrapper">

                        <div class="payment-item bank-header" onclick="toggleBankDropdown()">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <input type="radio" name="payment_method" id="bank_radio" value="BCA">
                                <span id="selected_bank_label">BCA</span>
                            </div>

                            <i class="fa-solid fa-chevron-down" id="bank_arrow"></i>
                        </div>
                        <div class="bank-options" id="bankOptions">
                            <div class="bank-option-item active" onclick="selectBank('BCA', event)">BCA</div>
                            <div class="bank-option-item" onclick="selectBank('Mandiri', event)">Mandiri</div>
                            <div class="bank-option-item" onclick="selectBank('BRI', event)">BRI</div>
                            <div class="bank-option-item" onclick="selectBank('BNI', event)">BNI</div>
                            <div class="bank-option-item" onclick="selectBank('BSI', event)">BSI</div>
                        </div>

                    </div>
                </div>

                <div class="payment-notice">
                    <i class="fa-solid fa-box-archive"></i>
                    <div>
                        <strong>Pembayaran aman dan Terpercaya</strong><br>
                        Gunakan metode pembayaran favorit Anda.
                    </div>
                </div>

                <button type="submit" class="btn-submit-booking">
                    Konfirmasi booking
                </button>

                <button type="button" class="btn-save-draft">
                    <i class="fa-regular fa-bookmark"></i> Simpan untuk nanti
                </button>

            </div>

        </div>
    </form>

    <div class="bottom-features">

        <div class="bottom-feature-item">
            <i class="fa-solid fa-shield-halved"></i>
            <div>
                <strong>Aman dan Terpercaya</strong>
                Data anda terenkripsi dengan aman
            </div>
        </div>

        <div class="bottom-feature-item">
            <i class="fa-solid fa-headset"></i>
            <div>
                <strong>Bantuan 24/7</strong>
                Tim kami siap membantu kapan saja
            </div>
        </div>

        <div class="bottom-feature-item">
            <i class="fa-regular fa-calendar-check"></i>
            <div>
                <strong>Jadwal Fleksibel</strong>
                Pilih waktu konsultasi yang sesuai untuk anda
            </div>
        </div>

        <div class="bottom-feature-item">
            <i class="fa-solid fa-heart"></i>
            <div>
                <strong>Untuk tumbuh kembang anak</strong>
                Kami berkomitmen mendukung setiap langkah perkembangan anak
            </div>
        </div>

    </div>

</div>


<script>

    const selectedDoctor = @json($selectedDoctor ?? null);

    let currentDate = new Date();
    let selectedDateStr = "";

    const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    const dayNamesIndo = [
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
        "Minggu"
    ];

    function renderCalendar() {

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        document.getElementById('monthYearTitle').innerText =
            `${monthNames[month]} ${year}`;

        const calendarDays = document.getElementById('calendarDays');
        calendarDays.innerHTML = '';
        const daysOfWeek = [
            'Sen',
            'Sel',
            'Rab',
            'Kam',
            'Jum',
            'Sab',
            'Min'
        ];

        daysOfWeek.forEach(day => {

            const dayHead = document.createElement('div');
            dayHead.className = 'day-name';
            dayHead.innerText = day;
            calendarDays.appendChild(dayHead);

        });

        const firstDayIndex =
            new Date(year, month, 1).getDay();
        const daysInMonth =
            new Date(year, month + 1, 0).getDate();
        const prevMonthDays =
            new Date(year, month, 0).getDate();

        let startingDay =
            firstDayIndex === 0
                ? 6
                : firstDayIndex - 1;

        for (let i = startingDay; i > 0; i--) {

            const emptyDiv =
                document.createElement('div');

            emptyDiv.style.opacity = '0.3';
            emptyDiv.style.cursor = 'default';

            emptyDiv.innerText =
                prevMonthDays - i + 1;
            calendarDays.appendChild(emptyDiv);
        }

        for (let day = 1; day <= daysInMonth; day++) {

            const dayDiv =
                document.createElement('div');
            dayDiv.innerText = day;
            const formattedMonth =
                String(month + 1).padStart(2, '0');
            const formattedDay =
                String(day).padStart(2, '0');
            const dateStr =
                `${year}-${formattedMonth}-${formattedDay}`;
            if (
                !selectedDateStr &&
                day === currentDate.getDate()
            ) {
                selectedDateStr = dateStr;
                const inputDate =
                    document.getElementById('input_booking_date');
                if (inputDate) {
                    inputDate.value = selectedDateStr;
                }
            }

            if (dateStr === selectedDateStr) {
                dayDiv.classList.add('active-day');
            }

            dayDiv.onclick = function() {
                document
                    .querySelectorAll('#calendarDays div')
                    .forEach(el =>
                        el.classList.remove('active-day')
                    );
                dayDiv.classList.add('active-day');
                selectedDateStr = dateStr;
                const inputDate =
                    document.getElementById('input_booking_date');
                if (inputDate) {
                    inputDate.value = selectedDateStr;
                }
                renderTimeSlots();
            };
            calendarDays.appendChild(dayDiv);
        }
        renderTimeSlots();
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(
            currentDate.getMonth() - 1
        );
        renderCalendar();
    });
    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(
            currentDate.getMonth() + 1
        );
        renderCalendar();
    });

    function selectType(type, element) {
        document
            .querySelectorAll('.type-card')
            .forEach(el =>
                el.classList.remove('active')
            );
        element.classList.add('active');
        const inputType =
            document.getElementById('input_consultation_type');
        if (inputType) {
            inputType.value = type;
        }
    }

    function selectTime(time, element) {
        if (
            element.classList.contains('disabled-slot')
        ) {
            return;
        }
        document
            .querySelectorAll('.time-btn')
            .forEach(el =>
                el.classList.remove('active')
            );
        element.classList.add('active');
        const inputTime =
            document.getElementById('input_booking_time');

        if (inputTime) {
            inputTime.value = time;
        }
    }

    function renderTimeSlots() {
        const timeContainer =
            document.getElementById('timeSlotsContainer');
        if (!timeContainer) {
            return;
        }
        timeContainer.innerHTML = '';
        const inputTime =
            document.getElementById('input_booking_time');
        if (inputTime) {
            inputTime.value = '';
        }
        if (
            !selectedDateStr ||
            !selectedDoctor ||
            !selectedDoctor.schedules
        ) {
            timeContainer.innerHTML =
                '<p class="text-muted">Pilih tanggal dan dokter terlebih dahulu.</p>';
            return;
        }
        const dateParts =
            selectedDateStr
                .split('-')
                .map(Number);
        const dateObj =
            new Date(
                dateParts[0],
                dateParts[1] - 1,
                dateParts[2]
            );
        let jsDay =
            dateObj.getDay();
        let adjustedIndex =
            jsDay === 0
                ? 6
                : jsDay - 1;
        const targetDayName =
            dayNamesIndo[adjustedIndex];
        const daySchedule =
            selectedDoctor.schedules.find(s => {
                const dbDay =
                    String(s.day).trim();
                const isActive =
                    Number(s.is_active) === 1;
                return (
                    dbDay === targetDayName &&
                    isActive
                );
            });

        if (!daySchedule) {
            timeContainer.innerHTML =
                `<p class="text-danger small">Dokter tidak ada jadwal praktik pada hari ${targetDayName}.</p>`;
            return;
        }
        const parseMinutes = (timeString) => {
            const clean =
                String(timeString)
                    .trim()
                    .substring(0, 5);
            const [h, m] =
                clean
                    .split(':')
                    .map(Number);
            return (
                (h * 60) +
                (m || 0)
            );
        }; 
        const startTotalMinutes =
            parseMinutes(daySchedule.start_time);
        const endTotalMinutes =
            parseMinutes(daySchedule.end_time);
        if (
            isNaN(startTotalMinutes) ||
            isNaN(endTotalMinutes) ||
            startTotalMinutes >= endTotalMinutes
        ) {
            timeContainer.innerHTML =
                '<p class="text-danger small">Format jam operasional dokter tidak valid.</p>';
            return;
        }
        for (
            let currentMin = startTotalMinutes;
            currentMin < endTotalMinutes;
            currentMin += 30
        ) {

            const h =
                Math.floor(currentMin / 60);

            const m =
                currentMin % 60;

            const timeFormatted =
                String(h).padStart(2, '0') +
                ':' +
                String(m).padStart(2, '0');

            const btn =
                document.createElement('div');

            btn.className =
                'time-btn';

            btn.setAttribute(
                'data-time',
                timeFormatted
            );

            btn.setAttribute(
                'data-minutes',
                currentMin
            );

            btn.innerText =
                timeFormatted;

            btn.onclick = function() {
                selectTime(
                    timeFormatted,
                    btn
                );
            };

            timeContainer.appendChild(btn);
        }
        checkBookedSlots();
    }

    function checkBookedSlots() {
        const docIdInput =
            document.getElementById('input_doctor_id');
        const doctorId =
            docIdInput
                ? docIdInput.value
                : (
                    selectedDoctor
                        ? (
                            selectedDoctor.id ||
                            selectedDoctor.doctor_id
                        )
                        : null
                );
        const dateStr =
            selectedDateStr;
        if (!doctorId || !dateStr) {
            return;
        }
        fetch(
            `/api/check-booked-slots?doctor_id=${doctorId}&date=${dateStr}`
        )
        .then(res => res.json())
        .then(bookedTimes => {
            if (!Array.isArray(bookedTimes)) {
                return;
            }

            let occupiedMinutes = [];
            bookedTimes.forEach(timeStr => {

                const cleanTime =
                    String(timeStr)
                        .substring(0, 5);

                const [h, m] =
                    cleanTime
                        .split(':')
                        .map(Number);

                const bookedMin =
                    (h * 60) +
                    (m || 0);

                occupiedMinutes.push(
                    bookedMin
                );

                occupiedMinutes.push(
                    bookedMin + 30
                );
            });

            document
                .querySelectorAll('.time-btn')
                .forEach(btn => {
                    const btnMinutes =
                        parseInt(
                            btn.getAttribute('data-minutes'),
                            10
                        );

                    btn.classList.remove(
                        'disabled-slot'
                    );

                    btn.style.opacity = '1';
                    btn.style.pointerEvents = 'auto';
                    btn.style.textDecoration = 'none';

                    if (
                        occupiedMinutes.includes(
                            btnMinutes
                        )
                    ) {

                        btn.classList.add(
                            'disabled-slot'
                        );

                        btn.style.opacity =
                            '0.3';

                        btn.style.pointerEvents =
                            'none';

                        btn.style.textDecoration =
                            'line-through';
                    }
                });

        })
        .catch(err =>
            console.error(
                "Error checking slots:",
                err
            )
        );
    }

    function toggleBankDropdown() {

        const bankOptions =
            document.getElementById('bankOptions');
        const bankArrow =
            document.getElementById('bank_arrow');
        const bankRadio =
            document.getElementById('bank_radio');
        if (bankRadio) {
            bankRadio.checked = true;
        }
        if (bankOptions) {
            bankOptions.classList.toggle('show');
        }
        if (
            bankOptions &&
            bankArrow
        ) {

            bankArrow.style.transform =
                bankOptions.classList.contains('show')
                    ? 'rotate(180deg)'
                    : 'rotate(0deg)';
        }
    }

    function selectBank(bankName, event) {

        const bankRadio =
            document.getElementById('bank_radio');

        const selectedBankLabel =
            document.getElementById('selected_bank_label');

        if (bankRadio) {
            bankRadio.value =
                bankName;
            bankRadio.checked =
                true;
        }
        if (selectedBankLabel) {
            selectedBankLabel.innerText =
                bankName;
        }
        document
            .querySelectorAll('.bank-option-item')
            .forEach(item =>
                item.classList.remove('active')
            );
        const target =
            (
                event &&
                event.currentTarget
            ) ||
            (
                window.event &&
                window.event.currentTarget
            );

        if (target) {
            target.classList.add('active');
        }
        closeBankDropdown();
    }

    function closeBankDropdown() {

        const bankOptions =
            document.getElementById('bankOptions');
        const bankArrow =
            document.getElementById('bank_arrow');
        if (bankOptions) {
            bankOptions.classList.remove('show');
            if (bankArrow) {
                bankArrow.style.transform =
                    'rotate(0deg)';
            }
        }
    }

    document.addEventListener(
        'DOMContentLoaded',
        renderCalendar
    );

</script>
</body>
</html>