
@extends('layout.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="community-page">
    <div class="community-container">

        {{-- Header --}}
        <div class="community-header">
            <div class="community-heading">
                <span class="community-eyebrow">RUANG BERBAGI CERITA</span>

                <h1>Semua Diskusi Komunitas</h1>

                <p>
                    Temukan inspirasi, berbagi pengalaman, dan berdiskusi
                    seputar tumbuh kembang anak dan parenting.
                </p>
            </div>

            <a href="{{ route('community.index') }}" class="community-back">
                <span>&larr;</span> Kembali
            </a>
        </div>

        {{-- Ringkasan --}}
        <div class="discussion-summary">
            <div>
                <span class="summary-title">Jelajahi Diskusi</span>
                <p>Temukan cerita dan pengalaman dari sesama orang tua.</p>
            </div>

            <div class="summary-count">
                <i class="fa-regular fa-comments"></i>
                <span>{{ $threads->total() }} topik</span>
            </div>
        </div>

        {{-- Daftar Diskusi --}}
        <div class="thread-list">
            @forelse($threads as $thread)
                <article class="thread-card">

                    <div class="thread-top">
                        <span class="category-badge">
                            {{ $thread->category }}
                        </span>

                        <span class="thread-time">
                            <i class="fa-regular fa-clock"></i>
                            {{ $thread->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <h2 class="thread-title">
                        <a href="{{ route('community.show', $thread->id) }}">
                            {{ $thread->title }}
                        </a>
                    </h2>

                    <p class="thread-excerpt">
                        {{ $thread->content }}
                    </p>

                    <div class="thread-footer">
                        <div class="thread-author">
                            <div class="author-avatar">
                                <i class="fa-regular fa-user"></i>
                            </div>

                            <div class="author-info">
                                <span>Diskusi oleh</span>
                                <strong>
                                    {{ $thread->author_name ?? $thread->user->name ?? 'Pengguna' }}
                                </strong>
                            </div>
                        </div>

                        <a
                            href="{{ route('community.show', $thread->id) }}"
                            class="reply-count"
                            aria-label="Lihat {{ $thread->replies_count }} balasan"
                        >
                            <i class="fa-regular fa-comment-dots"></i>
                            {{ $thread->replies_count }} balasan
                            <span class="reply-arrow">&rarr;</span>
                        </a>
                    </div>

                </article>
            @empty
                <div class="empty-discussion">
                    <div class="empty-icon">
                        <i class="fa-regular fa-comments"></i>
                    </div>

                    <h2>Belum Ada Diskusi</h2>

                    <p>
                        Belum ada topik diskusi yang tersedia saat ini.
                        Yuk, kunjungi komunitas dan mulai berbagi cerita!
                    </p>

                    <a href="{{ route('community.index') }}" class="community-back">
                        Kembali ke Komunitas
                    </a>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($threads->hasPages())
            <div class="community-pagination">
                {{ $threads->links() }}
            </div>
        @endif

    </div>
</div>

<style>
    /* Semua style dibatasi untuk halaman komunitas ini */
    .community-page {
        --community-green: #315C50;
        --community-green-dark: #25483D;
        --community-sage: #EAF2E9;
        --community-border: #E5EBE4;
        --community-text: #2F4035;
        --community-muted: #879188;

        width: 100%;
        min-height: 80vh;
        padding: 42px 24px 64px;
        background: #F7F9F6;
        color: var(--community-text);
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        line-height: 1.7;
    }

    .community-page *,
    .community-page *::before,
    .community-page *::after {
        box-sizing: border-box;
    }

    .community-container {
        width: 100%;
        max-width: 920px;
        margin: 0 auto;
    }

    /* Header */
    .community-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
        padding-bottom: 28px;
        border-bottom: 1px solid #E1E8E0;
    }

    .community-heading {
        min-width: 0;
    }

    .community-eyebrow {
        display: inline-block;
        margin-bottom: 9px;
        color: #64856B;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.8px;
    }

    .community-heading h1 {
        margin: 0 0 10px;
        color: #293E32;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(23px, 3vw, 30px);
        font-weight: 700;
        line-height: 1.4;
        letter-spacing: -0.7px;
    }

    .community-heading p {
        max-width: 570px;
        margin: 0;
        color: #7C887E;
        font-size: 12px;
        line-height: 1.9;
    }

    .community-back {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #DCE5DB;
        border-radius: 10px;
        background: #FFFFFF;
        color: var(--community-green);
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .community-back:hover {
        border-color: var(--community-green);
        background: var(--community-green);
        color: #FFFFFF;
    }

    /* Ringkasan */
    .discussion-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin: 25px 0 17px;
    }

    .summary-title {
        color: #354A3A;
        font-size: 14px;
        font-weight: 700;
    }

    .discussion-summary p {
        margin: 3px 0 0;
        color: var(--community-muted);
        font-size: 11px;
    }

    .summary-count {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        border: 1px solid #E0E9DE;
        border-radius: 9px;
        background: #FFFFFF;
        color: #58745C;
        font-size: 11px;
        font-weight: 600;
    }

    /* Card diskusi */
    .thread-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .thread-card {
        min-width: 0;
        padding: 22px 24px 18px;
        border: 1px solid var(--community-border);
        border-radius: 15px;
        background: #FFFFFF;
        box-shadow: 0 3px 12px rgba(44, 66, 48, 0.025);
        transition: border-color 0.2s ease,
                    box-shadow 0.2s ease,
                    transform 0.2s ease;
    }

    .thread-card:hover {
        transform: translateY(-2px);
        border-color: #C9D9C8;
        box-shadow: 0 8px 22px rgba(44, 66, 48, 0.06);
    }

    .thread-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .category-badge {
        display: inline-block;
        max-width: 65%;
        padding: 6px 11px;
        border: 1px solid #DDEADD;
        border-radius: 30px;
        background: #F0F6EF;
        color: #527858;
        font-size: 10px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .thread-time {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        gap: 6px;
        color: #98A198;
        font-size: 10px;
    }

    .thread-title {
        margin: 0 0 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 17px;
        font-weight: 700;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .thread-title a {
        color: #2F4235;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .thread-title a:hover {
        color: #64896B;
    }

    .thread-excerpt {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        margin: 0 0 20px;
        color: #788379;
        font-size: 12px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    /* Footer card */
    .thread-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding-top: 15px;
        border-top: 1px solid #EEF1EC;
    }

    .thread-author {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
    }

    .author-avatar {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        width: 37px;
        height: 37px;
        border-radius: 12px;
        background: var(--community-sage);
        color: #52765A;
        font-size: 14px;
    }

    .author-info {
        display: flex;
        flex-direction: column;
        min-width: 0;
        gap: 2px;
    }

    .author-info span {
        color: #98A198;
        font-size: 10px;
    }

    .author-info strong {
        color: #35463A;
        font-size: 11px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .reply-count {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        gap: 7px;
        padding: 8px 11px;
        border: 1px solid #E4EBE1;
        border-radius: 9px;
        background: #F8FAF7;
        color: #54735A;
        font-size: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .reply-count:hover {
        border-color: #D2E1D0;
        background: #EAF2E9;
        color: #315C50;
    }

    .reply-arrow {
        margin-left: 2px;
        transition: transform 0.2s ease;
    }

    .reply-count:hover .reply-arrow {
        transform: translateX(3px);
    }

    /* Kondisi belum ada diskusi */
    .empty-discussion {
        padding: 48px 24px;
        border: 1px dashed #D6E1D4;
        border-radius: 16px;
        background: #FFFFFF;
        text-align: center;
    }

    .empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 58px;
        height: 58px;
        margin: 0 auto 16px;
        border-radius: 17px;
        background: var(--community-sage);
        color: #547A5C;
        font-size: 23px;
    }

    .empty-discussion h2 {
        margin: 0 0 8px;
        color: #304638;
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        font-weight: 700;
    }

    .empty-discussion p {
        max-width: 400px;
        margin: 0 auto 20px;
        color: #7C887E;
        font-size: 12px;
        line-height: 1.9;
    }

    /* Pagination */
    .community-pagination {
        display: flex;
        justify-content: center;
        margin-top: 28px;
        overflow-x: auto;
    }

    .community-pagination nav {
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
    }

    .community-pagination nav p {
        color: #7C887E;
        font-size: 11px;
    }

    .community-pagination nav a,
    .community-pagination nav span {
        font-size: 11px;
    }

    /* Mobile */
    @media (max-width: 600px) {
        .community-page {
            padding: 28px 15px 45px;
        }

        .community-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 16px;
            padding-bottom: 22px;
        }

        .community-heading h1 {
            font-size: 23px;
        }

        .community-heading p {
            font-size: 11px;
        }

        .discussion-summary {
            align-items: flex-start;
        }

        .discussion-summary p {
            max-width: 260px;
            line-height: 1.8;
        }

        .thread-card {
            padding: 18px 16px 15px;
            border-radius: 13px;
        }

        .thread-title {
            font-size: 15px;
        }

        .thread-excerpt {
            font-size: 11px;
        }

        .thread-footer {
            align-items: flex-start;
        }

        .reply-count {
            gap: 5px;
            padding: 8px;
            font-size: 9px;
        }

        .reply-arrow {
            display: none;
        }

        .thread-time {
            font-size: 9px;
        }
    }
</style>

@endsection
