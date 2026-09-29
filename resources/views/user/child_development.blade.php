@include('layout.header')

<main class="child-development-page">

    <!-- =========================
         HEADER / JUDUL
    ========================== -->

    <section class="child-header">

        <div class="child-title">

            

            <h1>Child Development</h1>

            <p>
                Kenali tahap perkembangan anak dan temukan
                cara terbaik untuk mendukungnya.
            </p>

        </div>

    </section>


    <!-- =========================
         FILTER USIA
    ========================== -->

    <section class="age-filter">

       <button type="button" class="age-btn active" data-age="0-2">
    0 - 2 Tahun
</button>

<button type="button" class="age-btn" data-age="3-5">
    3 - 5 Tahun
</button>

<button type="button" class="age-btn" data-age="6-8">
    6 - 8 Tahun
</button>

<button type="button" class="age-btn" data-age="9-12">
    9 - 12 Tahun
</button>

    </section>


    <!-- =========================
         DEVELOPMENT CONTENT
    ========================== -->

    <section class="development-content">

        <!-- LEFT -->

        <div class="development-left">

            <div class="development-tabs">

               <button type="button" class="development-tab active" data-development="kognitif">
    Kognitif
</button>

<button type="button" class="development-tab" data-development="motorik">
    Motorik
</button>

<button type="button" class="development-tab" data-development="bahasa">
    Bahasa
</button>

<button type="button" class="development-tab" data-development="sosial">
    Sosial
</button>

<button type="button" class="development-tab" data-development="emosional">
    Emosional
</button> 

            </div>


            <!-- MAIN CARD -->

            <div class="development-card">

                <div class="development-info">

                    <h2>
                        Kognitif (0 - 2 Tahun)
                    </h2>

                    <p>
                        Merangsang kemampuan berpikir,
                        eksplorasi, dan pemahaman anak.
                    </p>

                    <h4>
                        Contoh Aktivitas:
                    </h4>

                    <ul>
                        <li>Permainan sensorik</li>
                        <li>Mengenal warna & bentuk</li>
                        <li>Menyusun objek sederhana</li>
                    </ul>

                    <a href="#" class="recommend-btn">
                        Lihat Rekomendasi Produk
                    </a>

                </div>


                <div class="development-image">
                    <div class="image-placeholder">
                        Gambar Anak
                    </div>
                </div>

            </div>

        </div>


        <!-- RIGHT -->

        <div class="development-right">

            <h2>
                Tahap Perkembangan
            </h2>


            <div class="stage-list">

             <div class="stage-item active" data-age="0-2" onclick="selectAge('0-2')">
    <span class="stage-icon">👶</span>
    <div class="stage-info">
        <strong>0 - 2 Tahun</strong>
        <p>Eksplorasi awal dan beradaptasi.</p>
    </div>
</div>

<div class="stage-item" data-age="3-5" onclick="selectAge('3-5')">
    <span class="stage-icon">👦</span>
    <div class="stage-info">
        <strong>3 - 5 Tahun</strong>
        <p>Masa eksplorasi & rasa ingin tahu yang tinggi.</p>
    </div>
</div>

<div class="stage-item" data-age="6-8" onclick="selectAge('6-8')">
    <span class="stage-icon">🌱</span>
    <div class="stage-info">
        <strong>6 - 8 Tahun</strong>
        <p>Mulai berpikir logis dan mandiri.</p>
    </div>
</div>

<div class="stage-item" data-age="9-12" onclick="selectAge('9-12')">
    <span class="stage-icon">⭐</span>
    <div class="stage-info">
        <strong>9 - 12 Tahun</strong>
        <p>Pengembangan potensi dan kreativitas.</p>
    </div>
</div>  
   


            </div>

        </div>

    </section>


    <!-- =========================
         TIPS UNTUK ORANG TUA
    ========================== -->

    <section class="parent-tips">

        <div class="tips-title">
            <h2>Tips untuk Orang Tua</h2>
        </div>


        <div class="tips-list">

            <div class="tip-item">

                <div class="tip-icon">
                    ♡
                </div>

                <p>
                    Luangkan waktu
                    berkualitas bersama anak
                </p>

            </div>


            <div class="tip-item">

                <div class="tip-icon">
                    ◉
                </div>

                <p>
                    Berikan stimulasi sesuai
                    tahap usianya
                </p>

            </div>


            <div class="tip-item">

                <div class="tip-icon">
                    ♡
                </div>

                <p>
                    Dukung dengan cinta
                    dan kesabaran
                </p>

            </div>


            <div class="tip-item">

                <div class="tip-icon">
                    ✨
                </div>

                <p>
                    Rayakan setiap
                    perkembangannya
                </p>

            </div>

        </div>

    </section>

</main>

<!-- =========================
     FOOTER CHILD DEVELOPMENT
========================= -->

<footer class="child-footer">

    <p>
        © 2026 SmartChild. Tumbuh Cerdas, Bahagia Setiap Hari.
    </p>

</footer>


<!-- =========================
     CSS CHILD DEVELOPMENT
========================== -->

<style>

/* =========================
   PAGE
========================= */

.child-development-page {
    min-height: 100vh;

    background: #FFFDF9;
    color: #315C50;

    padding: 35px 50px 45px;
}


/* =========================
   HEADER
========================= */

.child-header {
    max-width: 1200px;
    margin: 0 auto 12px;
}

.page-number {
    display: inline-block;

    padding: 4px 12px;

    background: #315C50;
    color: #FFFFFF;

    border-radius: 0 0 8px 8px;

    font-size: 8px;
    font-weight: 700;
    letter-spacing: 0.8px;
}

.child-title {
    margin-top: 15px;
}

.child-title h1 {
    margin: 0 0 5px;

    font-size: 30px;
    font-weight: 700;

    color: #315C50;
}

.child-title p {
    margin: 0;

    font-size: 11px;
    line-height: 1.5;

    color: #667085;
}


/* =========================
   AGE FILTER
========================= */

.age-filter {
    max-width: 1200px;
    margin: 15px auto 10px;

    display: flex;
    gap: 7px;
}

.age-btn {
    padding: 6px 13px;

    border: none;
    border-radius: 15px;

    background: #F4F1EA;

    color: #667085;

    font-size: 10px;
    font-weight: 500;

    cursor: pointer;
}

.age-btn.active {
    background: #6FAF9B;
    color: #FFFFFF;
}


/* =========================
   DEVELOPMENT CONTENT
========================= */

.development-content {
    max-width: 1200px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: 1.55fr 1fr;

    gap: 18px;
}


/* =========================
   LEFT
========================= */

.development-left {
    min-width: 0;
}

.development-tabs {
    display: flex;
    gap: 6px;

    margin-bottom: 8px;
}

.development-tab {
    padding: 5px 11px;

    border: 1px solid #E5E7EB;
    border-radius: 15px;

    background: #FFFFFF;

    color: #667085;

    font-size: 10px;

    cursor: pointer;
}

.development-tab.active {
    background: #6FAF9B;
    border-color: #6FAF9B;

    color: #FFFFFF;
}


/* =========================
   MAIN DEVELOPMENT CARD
========================= */

.development-card {
    min-height: 180px;

    display: grid;
    grid-template-columns: 1fr 0.9fr;

    align-items: center;

    overflow: hidden;

    background: #F4A89A;

    border-radius: 10px;
}

.development-info {
    padding: 18px 20px;
}

.development-info h2 {
    margin: 0 0 7px;

    font-size: 16px;
    font-weight: 700;

    color: #274B3D;
}

.development-info p {
    max-width: 230px;

    margin: 0 0 8px;

    font-size: 10px;
    line-height: 1.5;

    color: #426F5C;
}

.development-info h4 {
    margin: 0 0 5px;

    font-size: 10px;
    font-weight: 700;

    color: #274B3D;
}

.development-info ul {
    margin: 0 0 10px;
    padding-left: 15px;

    font-size: 10px;
    line-height: 1.7;

    color: #426F5C;
}

.recommend-btn {
    display: inline-block;

    padding: 6px 9px;

    background: #315C50;
    color: #FFFFFF;

    border-radius: 5px;

    text-decoration: none;

    font-size: 9px;
    font-weight: 600;
}


/* =========================
   IMAGE
========================= */

.development-image {
    height: 100%;

    display: flex;
    align-items: end;
    justify-content: center;
}

.development-image .image-placeholder {
    width: 90%;
    height: 155px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #E8D8C8;

    border-radius: 70px 70px 0 0;

    color: #FFFFFF;

    font-size: 8px;
}


/* =========================
   RIGHT
========================= */

.development-right {
    padding: 13px 15px;

    background: #FFFFFF;

    border-radius: 10px;

    border: 1px solid #E8E8E8;
}

.development-right h2 {
    margin: 0 0 9px;

    font-size: 12px;
    font-weight: 700;

    color: #315C50;
}


/* =========================
   STAGE
========================= */

.stage-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
}



.stage-icon {
    width: 25px;
    height: 25px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;
}

.stage-info strong {
    display: block;

    margin-bottom: 2px;

    font-size: 10px;
    font-weight: 700;

    color: #315C50;
}

.stage-info p {
    margin: 0;

    font-size: 9px;
    line-height: 1.4;

    color: #667085;
}


/* =========================
   TIPS
========================= */

.parent-tips {
    max-width: 1200px;

    margin: 12px auto 0;

    padding: 10px 15px;

    background: #FFF9F2;

    border: 1px solid #E8E8E8;

    border-radius: 8px;
}

.tips-title h2 {
    margin: 0 0 8px;

    font-size: 12px;
    font-weight: 700;

    color: #274B3D;
}

.tips-list {
    display: grid;
    grid-template-columns: repeat(4, 1fr);

    gap: 15px;
}

.tip-item {
    display: flex;
    align-items: center;

    gap: 7px;
}

.tip-icon {
    width: 24px;
    height: 24px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #6FAF9B;
    border-radius: 50%;

    color: #315C50;

    font-size: 10px;
}

.tip-item p {
    margin: 0;

    font-size: 10px;
    line-height: 1.4;

    color: #667085;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .child-development-page {
        padding: 30px 25px;
    }

    .development-content {
        grid-template-columns: 1fr;
    }

    .tips-list {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 600px) {

    .child-development-page {
        padding: 25px 15px;
    }

    .age-filter {
        flex-wrap: wrap;
    }

    .development-card {
        grid-template-columns: 1fr;
    }

    .development-image {
        min-height: 150px;
    }

    .tips-list {
        grid-template-columns: 1fr;
    }

}

/* =========================
   FOOTER CHILD DEVELOPMENT
========================= */

.child-footer {
    width: 100%;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #315C50;
}

.child-footer p {
    margin: 0;

    font-size: 11px;
    font-weight: 400;

    color: #FFFFFF;
}

.stage-item {
    cursor: pointer;
    transition: 0.2s ease;
}

.stage-item:hover {
    background: #EEF3E7;
    transform: translateY(-2px);
}

.stage-item {
    display: flex;
    align-items: center;

    gap: 9px;

    padding: 8px;

    border-radius: 7px;

    background: #FFFDF9;

    cursor: pointer;

    transition: 0.2s ease;
}

.stage-item:hover {
    background: #F4F7EF;
}

.stage-item.active {
    background: #EEF3E7;
}

</style> 

<script>

    /* =========================
       DATA CHILD DEVELOPMENT
    ========================== */

    const developmentData = {

        "0-2": {

            kognitif: {
                title: "Kognitif (0 - 2 Tahun)",
                description: "Merangsang kemampuan berpikir, eksplorasi, dan pemahaman anak.",
                activities: [
                    "Permainan sensorik",
                    "Mengenal warna & bentuk",
                    "Menyusun objek sederhana"
                ]
            },

            motorik: {
                title: "Motorik (0 - 2 Tahun)",
                description: "Mendukung perkembangan gerakan tubuh dan koordinasi anak.",
                activities: [
                    "Bermain dengan balok",
                    "Meraih dan memindahkan benda",
                    "Latihan berjalan dan keseimbangan"
                ]
            },

            bahasa: {
                title: "Bahasa (0 - 2 Tahun)",
                description: "Membantu anak mengenal suara, kata, dan berkomunikasi.",
                activities: [
                    "Mengajak anak berbicara",
                    "Membacakan buku cerita",
                    "Mengenalkan nama benda"
                ]
            },

            sosial: {
                title: "Sosial (0 - 2 Tahun)",
                description: "Membangun kemampuan anak dalam berinteraksi dengan orang di sekitarnya.",
                activities: [
                    "Bermain bersama orang tua",
                    "Mengajak anak berinteraksi",
                    "Mengenalkan ekspresi wajah"
                ]
            },

            emosional: {
                title: "Emosional (0 - 2 Tahun)",
                description: "Membantu anak mengenali dan mengekspresikan emosinya.",
                activities: [
                    "Mengenali ekspresi emosi",
                    "Memberikan rasa aman",
                    "Merespons kebutuhan anak"
                ]
            }

        },


        "3-5": {

            kognitif: {
                title: "Kognitif (3 - 5 Tahun)",
                description: "Mengembangkan kemampuan berpikir, memecahkan masalah, dan rasa ingin tahu.",
                activities: [
                    "Puzzle sederhana",
                    "Mengelompokkan warna dan bentuk",
                    "Permainan mencocokkan benda"
                ]
            },

            motorik: {
                title: "Motorik (3 - 5 Tahun)",
                description: "Mengembangkan koordinasi tubuh dan kemampuan motorik anak.",
                activities: [
                    "Bermain lempar tangkap",
                    "Menggambar dan mewarnai",
                    "Melompat dan berlari"
                ]
            },

            bahasa: {
                title: "Bahasa (3 - 5 Tahun)",
                description: "Mengembangkan kemampuan berbicara dan memahami bahasa.",
                activities: [
                    "Membaca cerita bersama",
                    "Mengajak anak bercerita",
                    "Mengenalkan kosakata baru"
                ]
            },

            sosial: {
                title: "Sosial (3 - 5 Tahun)",
                description: "Membantu anak belajar bekerja sama dan berinteraksi dengan teman.",
                activities: [
                    "Bermain bersama teman",
                    "Belajar berbagi",
                    "Belajar bergantian"
                ]
            },

            emosional: {
                title: "Emosional (3 - 5 Tahun)",
                description: "Membantu anak memahami dan mengelola perasaan.",
                activities: [
                    "Mengenali berbagai emosi",
                    "Mengajarkan cara menenangkan diri",
                    "Memberikan pujian positif"
                ]
            }

        },


        "6-8": {

            kognitif: {
                title: "Kognitif (6 - 8 Tahun)",
                description: "Mendukung kemampuan berpikir logis, belajar, dan menyelesaikan masalah.",
                activities: [
                    "Permainan strategi sederhana",
                    "Mengerjakan teka-teki",
                    "Latihan berhitung"
                ]
            },

            motorik: {
                title: "Motorik (6 - 8 Tahun)",
                description: "Meningkatkan koordinasi tubuh dan keterampilan motorik.",
                activities: [
                    "Bermain olahraga",
                    "Menggambar dan membuat kerajinan",
                    "Bermain aktivitas fisik"
                ]
            },

            bahasa: {
                title: "Bahasa (6 - 8 Tahun)",
                description: "Mengembangkan kemampuan membaca, menulis, dan berkomunikasi.",
                activities: [
                    "Membaca buku",
                    "Menulis cerita sederhana",
                    "Menceritakan kembali isi bacaan"
                ]
            },

            sosial: {
                title: "Sosial (6 - 8 Tahun)",
                description: "Membangun kemampuan bekerja sama dan memahami lingkungan sosial.",
                activities: [
                    "Kerja kelompok",
                    "Bermain bersama teman",
                    "Belajar menghargai pendapat"
                ]
            },

            emosional: {
                title: "Emosional (6 - 8 Tahun)",
                description: "Membantu anak mengelola emosi dan membangun kepercayaan diri.",
                activities: [
                    "Mengenali perasaan",
                    "Belajar mengatasi rasa kecewa",
                    "Memberikan apresiasi"
                ]
            }

        },


        "9-12": {

            kognitif: {
                title: "Kognitif (9 - 12 Tahun)",
                description: "Mengembangkan kemampuan berpikir kritis, kreativitas, dan pemecahan masalah.",
                activities: [
                    "Permainan strategi",
                    "Proyek sederhana",
                    "Memecahkan masalah"
                ]
            },

            motorik: {
                title: "Motorik (9 - 12 Tahun)",
                description: "Mendukung koordinasi dan keterampilan fisik anak.",
                activities: [
                    "Olahraga rutin",
                    "Aktivitas seni",
                    "Permainan yang membutuhkan koordinasi"
                ]
            },

            bahasa: {
                title: "Bahasa (9 - 12 Tahun)",
                description: "Meningkatkan kemampuan membaca, menulis, dan menyampaikan pendapat.",
                activities: [
                    "Membaca buku",
                    "Menulis cerita",
                    "Presentasi sederhana"
                ]
            },

            sosial: {
                title: "Sosial (9 - 12 Tahun)",
                description: "Membangun kemampuan bekerja sama dan berkomunikasi dengan lingkungan.",
                activities: [
                    "Kerja kelompok",
                    "Mengikuti kegiatan bersama",
                    "Belajar menyelesaikan konflik"
                ]
            },

            emosional: {
                title: "Emosional (9 - 12 Tahun)",
                description: "Membantu anak memahami emosi dan membangun rasa percaya diri.",
                activities: [
                    "Mengenali emosi diri",
                    "Belajar mengelola stres",
                    "Membangun kepercayaan diri"
                ]
            }

        }

    };


    /* =========================
       ELEMENT
    ========================== */

    const ageButtons = document.querySelectorAll(".age-btn");
    const developmentButtons = document.querySelectorAll(".development-tab");

    const developmentInfo = document.querySelector(".development-info");

    let selectedAge = "0-2";
    let selectedDevelopment = "kognitif";


    /* =========================
       UPDATE CONTENT
    ========================== */

    function updateDevelopmentContent() {

        const data =
            developmentData[selectedAge][selectedDevelopment];

        developmentInfo.innerHTML = `

            <h2>
                ${data.title}
            </h2>

            <p>
                ${data.description}
            </p>

            <h4>
                Contoh Aktivitas:
            </h4>

            <ul>
                ${data.activities.map(activity => `
                    <li>${activity}</li>
                `).join("")}
            </ul>

            <a href="#" class="recommend-btn">
                Lihat Rekomendasi Produk
            </a>

        `;
    }


    /* =========================
       AGE BUTTON
    ========================== */

    ageButtons.forEach(button => {

    button.addEventListener("click", function () {

        selectAge(this.dataset.age);

    });

});


    /* =========================
       DEVELOPMENT BUTTON
    ========================== */

    developmentButtons.forEach(button => {

        button.addEventListener("click", function () {

            developmentButtons.forEach(btn => {
                btn.classList.remove("active");
            });

            this.classList.add("active");

            selectedDevelopment =
                this.dataset.development;

            updateDevelopmentContent();

        });

    });

    /* =========================
   SELECT AGE DARI KOTAK KANAN
========================= */

function selectAge(age) {

    // Simpan usia yang dipilih
    selectedAge = age;

    // Aktifkan tombol usia di sebelah kiri
    ageButtons.forEach(btn => {
        btn.classList.remove("active");

        if (btn.dataset.age === age) {
            btn.classList.add("active");
        }
    });

    // Aktifkan usia yang sesuai di kotak kanan
    const stageItems = document.querySelectorAll(".stage-item");

    stageItems.forEach(item => {
        item.classList.remove("active");

        if (item.dataset.age === age) {
            item.classList.add("active");
        }
    });

    // Update isi kartu perkembangan
    updateDevelopmentContent();
}

    /* =========================
       INITIAL CONTENT
    ========================== */

    updateDevelopmentContent();

</script>