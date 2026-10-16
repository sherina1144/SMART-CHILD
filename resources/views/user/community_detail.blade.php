
@extends('layout.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="community-detail-page">
    <div class="community-detail-container">

        {{-- Tombol kembali --}}
        <div class="detail-navigation">
            <a href="{{ route('community.index') }}" class="detail-back-button">
                <span>&larr;</span>
                Kembali ke Komunitas
            </a>
        </div>

        {{-- Detail Diskusi --}}
        <article class="thread-detail-card">

            <div class="detail-meta">
                <span class="detail-category">
                    {{ $thread->category }}
                </span>

                <span class="detail-date">
                    <i class="fa-regular fa-clock"></i>
                    {{ $thread->created_at->format('d M Y, H:i') }}
                </span>
            </div>

            <h1 class="thread-main-title">
                {{ $thread->title }}
            </h1>

            <div class="thread-author-info">
                <div class="detail-author-avatar">
                    <i class="fa-regular fa-user"></i>
                </div>

                <div>
                    <span class="author-caption">Dibagikan oleh</span>
                    <strong>
                        {{ $thread->user->name ?? $thread->author_name ?? 'Pengguna' }}
                    </strong>
                </div>
            </div>

            <div class="detail-divider"></div>

            <div class="thread-body">
                {{ $thread->content }}
            </div>

        </article>

        {{-- Bagian Balasan --}}
        <section class="replies-section">

            <div class="replies-section-header">
                <div>
                    <span class="detail-eyebrow">RUANG DISKUSI</span>
                    <h2>Balasan Diskusi</h2>
                    <p>Berikan tanggapan atau berbagi pengalamanmu.</p>
                </div>

                <div class="reply-total">
                    <i class="fa-regular fa-comments"></i>
                    {{ $thread->replies->count() }} balasan
                </div>
            </div>

            {{-- Form Komentar --}}
            <form
                action="{{ route('community.storeReply', $thread->id) }}"
                method="POST"
                class="reply-form"
            >
                @csrf

                <label for="reply-content" class="form-label">
                    Tulis Balasan
                </label>

                <textarea
                    id="reply-content"
                    name="content"
                    rows="4"
                    placeholder="Tulis tanggapan atau saran yang ingin kamu bagikan..."
                    required
                    class="form-textarea"
                >{{ old('content') }}</textarea>

                @error('content')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <div class="form-footer">
                    <span class="form-hint">
                        <i class="fa-regular fa-heart"></i>
                        Tetap ramah dan saling menghargai.
                    </span>

                    <button type="submit" class="btn-submit">
                        <i class="fa-regular fa-paper-plane"></i>
                        Kirim Balasan
                    </button>
                </div>
            </form>

            {{-- Daftar Komentar --}}
            <div class="replies-list">

                @forelse($thread->replies as $reply)
                    <article class="reply-card">

                        <div class="reply-header">
                            <div class="reply-author-group">
                                <div class="reply-avatar">
                                    <i class="fa-regular fa-user"></i>
                                </div>

                                <div class="reply-author-info">
                                    <strong>
                                        {{ $reply->user->name ?? $reply->user->nama ?? 'Pengguna' }}
                                    </strong>

                                    <span>Anggota komunitas</span>
                                </div>
                            </div>

                            <span class="reply-time">
                                {{ $reply->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <p class="reply-content">{{ $reply->content }}</p>

                    </article>
                @empty
                    <div class="empty-replies">
                        <div class="empty-replies-icon">
                            <i class="fa-regular fa-comments"></i>
                        </div>

                        <h3>Belum Ada Balasan</h3>

                        <p>
                            Jadilah orang pertama yang memberikan tanggapan
                            pada diskusi ini.
                        </p>
                    </div>
                @endforelse

            </div>

        </section>

    </div>
</div>

<style>
    .community-detail-page {
        --detail-green: #315C50;
        --detail-green-dark: #25483D;
        --detail-sage: #EAF2E9;
        --detail-border: #E5EBE4;
        --detail-text: #2F4035;
        --detail-muted: #879188;

        width: 100%;
        min-height: 80vh;
        padding: 38px 24px 65px;
        background: #F7F9F6;
        color: var(--detail-text);
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        line-height: 1.7;
    }

    .community-detail-page *,
    .community-detail-page *::before,
    .community-detail-page *::after {
        box-sizing: border-box;
    }

    .community-detail-container {
        width: 100%;
        max-width: 850px;
        margin: 0 auto;
    }

    /* Navigasi */
    .detail-navigation {
        margin-bottom: 20px;
    }

    .detail-back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border: 1px solid #DCE5DB;
        border-radius: 9px;
        background: #FFFFFF;
        color: var(--detail-green);
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .detail-back-button:hover {
        border-color: var(--detail-green);
        background: var(--detail-green);
        color: #FFFFFF;
    }

    /* Kartu utama diskusi */
    .thread-detail-card {
        padding: 28px 30px;
        border: 1px solid var(--detail-border);
        border-radius: 17px;
        background: #FFFFFF;
        box-shadow: 0 4px 16px rgba(44, 66, 48, 0.035);
    }

    .detail-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
    }

    .detail-category {
        display: inline-block;
        max-width: 70%;
        padding: 6px 12px;
        border: 1px solid #DDEADD;
        border-radius: 30px;
        background: #F0F6EF;
        color: #527858;
        font-size: 10px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .detail-date {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #98A198;
        font-size: 10px;
    }

    .thread-main-title {
        margin: 0 0 18px;
        color: #293E32;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(22px, 3vw, 28px);
        font-weight: 700;
        line-height: 1.5;
        letter-spacing: -0.5px;
        overflow-wrap: anywhere;
    }

    .thread-author-info {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .detail-author-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 13px;
        background: var(--detail-sage);
        color: #52765A;
        font-size: 15px;
    }

    .thread-author-info > div:last-child {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .author-caption {
        color: #98A198;
        font-size: 10px;
    }

    .thread-author-info strong {
        color: #35463A;
        font-size: 12px;
        font-weight: 600;
    }

    .detail-divider {
        height: 1px;
        margin: 23px 0;
        background: #EEF1EC;
    }

    .thread-body {
        color: #59665C;
        font-size: 13px;
        line-height: 2;
        overflow-wrap: anywhere;
        white-space: pre-line;
    }

    /* Header balasan */
    .replies-section {
        margin-top: 32px;
    }

    .replies-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 18px;
    }

    .detail-eyebrow {
        color: #64856B;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1.7px;
    }

    .replies-section-header h2 {
        margin: 5px 0;
        color: #2F4235;
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        font-weight: 700;
    }

    .replies-section-header p {
        margin: 0;
        color: #879188;
        font-size: 11px;
    }

    .reply-total {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        flex-shrink: 0;
        padding: 8px 11px;
        border: 1px solid #E0E9DE;
        border-radius: 9px;
        background: #FFFFFF;
        color: #58745C;
        font-size: 10px;
        font-weight: 600;
    }

    /* Form balasan */
    .reply-form {
        padding: 22px;
        border: 1px solid var(--detail-border);
        border-radius: 15px;
        background: #FFFFFF;
        box-shadow: 0 3px 12px rgba(44, 66, 48, 0.025);
    }

    .form-label {
        display: block;
        margin-bottom: 9px;
        color: #354A3A;
        font-size: 12px;
        font-weight: 600;
    }

    .form-textarea {
        display: block;
        width: 100%;
        min-height: 110px;
        padding: 13px 14px;
        border: 1px solid #DDE5DB;
        border-radius: 10px;
        outline: none;
        background: #FCFDFC;
        color: #35463A;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        line-height: 1.8;
        resize: vertical;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-textarea::placeholder {
        color: #A0AAA1;
    }

    .form-textarea:focus {
        border-color: #86A98A;
        box-shadow: 0 0 0 3px rgba(101, 143, 106, 0.12);
    }

    .form-error {
        margin: 8px 0 0;
        color: #C24141;
        font-size: 11px;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 15px;
    }

    .form-hint {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #8A968B;
        font-size: 10px;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid var(--detail-green);
        border-radius: 9px;
        background: var(--detail-green);
        color: #FFFFFF;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit:hover {
        border-color: var(--detail-green-dark);
        background: var(--detail-green-dark);
        transform: translateY(-1px);
    }

    /* Daftar balasan */
    .replies-list {
        display: flex;
        flex-direction: column;
        gap: 13px;
        margin-top: 20px;
    }

    .reply-card {
        padding: 19px 21px;
        border: 1px solid var(--detail-border);
        border-radius: 13px;
        background: #FFFFFF;
        transition: border-color 0.2s ease;
    }

    .reply-card:hover {
        border-color: #CDDDCB;
    }

    .reply-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 13px;
    }

    .reply-author-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .reply-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        border-radius: 11px;
        background: #F0F5EF;
        color: #628268;
        font-size: 13px;
    }

    .reply-author-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .reply-author-info strong {
        color: #35463A;
        font-size: 11px;
        font-weight: 600;
    }

    .reply-author-info span {
        color: #98A198;
        font-size: 10px;
    }

    .reply-time {
        color: #98A198;
        font-size: 10px;
    }

    .reply-content {
        margin: 0;
        color: #647065;
        font-size: 12px;
        line-height: 1.9;
        overflow-wrap: anywhere;
        white-space: pre-line;
    }

    /* Kondisi belum ada balasan */
    .empty-replies {
        padding: 30px 20px;
        border: 1px dashed #D6E1D4;
        border-radius: 14px;
        background: #FFFFFF;
        text-align: center;
    }

    .empty-replies-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        margin: 0 auto 12px;
        border-radius: 14px;
        background: var(--detail-sage);
        color: #547A5C;
        font-size: 20px;
    }

    .empty-replies h3 {
        margin: 0 0 6px;
        color: #354A3A;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 700;
    }

    .empty-replies p {
        margin: 0;
        color: #879188;
        font-size: 11px;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .community-detail-page {
            padding: 25px 15px 45px;
        }

        .thread-detail-card {
            padding: 21px 18px;
            border-radius: 14px;
        }

        .thread-main-title {
            font-size: 22px;
        }

        .thread-body {
            font-size: 12px;
        }

        .replies-section-header {
            align-items: flex-start;
        }

        .replies-section-header h2 {
            font-size: 18px;
        }

        .replies-section-header p {
            max-width: 240px;
            line-height: 1.8;
        }

        .reply-form {
            padding: 17px;
        }

        .form-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-submit {
            width: 100%;
        }

        .reply-card {
            padding: 16px;
        }
    }
</style>

@endsection