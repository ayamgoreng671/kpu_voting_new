<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidate = Candidate::create([

            "name" => "Marcellina Septia Safira",
            "bio" => "-",
            "vision" => "-",
            "mission" => "-",
            "classroom_id" => 8,
            "election_id" => 2,
            "photo" => "2/1.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Yosefin Kurniawati Tanto",
            "bio" => "lebih baik dari kemarin, mengusahakan lebih baik dari hari ini",
            "vision" => "menjadikan mpk sebagai wadah aspirasi, ide, dan suara siswa.",
            "mission" => "1. menyuarakan keinginan siswa dapat didengar oleh sekolah <br>
2. terlaksananya kegiatan yang dapat dilakukan dengan nyaman sesuai keinginan siswa.<br>",
            "classroom_id" => 8,
            "election_id" => 2,
            "photo" => "2/2.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Revano Satya",
            "bio" => "Pilihlah sebagaimana adanya kalian memilih sesuai hati nurani. Tidak ada paksaan dan semuanya kembali ke kalian masing-masing",
            "vision" => "Mewujudkan MPK sebagai lembaga pengawas yang profesional, kritis, dan konstruktif dalam mendukung kinerja OSIS demi kemajuan sekolah",
            "mission" => "1. Melaksanakan pengawasan dan evaluasi program kerja OSIS secara objektif dan berkelanjutan <br>
2. Membangun komunikasi yang efektif antara siswa, OSIS, dan pihak sekolah <br>
3. Memberikan masukan dan rekomendasi yang membangun untuk peningkatan kinerja OSIS <br>
4. Menampung aspirasi siswa dan menyalurkannya kepada OSIS untuk ditindaklanjuti <br>
5. Memastikan program OSIS selaras dengan kebutuhan dan kepentingan siswa <br>",
            "classroom_id" => 9,
            "election_id" => 2,
            "photo" => "2/3.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Zafif Haidar I.",
            "bio" => "siap menjadi perwakilan yang peduli, responsif, dan membawa perubahan positif bagi sekolah kita",
            "vision" => "Menjadi MPK yang aktif, kreatif, dan inovatif dalam menciptakan lingkungan sekolah yang positif dan mendukung perkembangan siswa.",
            "mission" => "1. Mendorong keterlibatan siswa dalam kegiatan yang mengembangkan kreativitas dan karakter positif. <br>
2. Menyampaikan aspirasi siswa kepada pihak sekolah dengan cara yang terbuka dan solutif. <br>
3. Membangun budaya saling menghargai, disiplin, dan kerja sama antar siswa untuk menciptakan lingkungan yang kondusif. <br>",
            "classroom_id" => 9,
            "election_id" => 2,
            "photo" => "2/4.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Nadine Aulia P.",
            "bio" => "Pioneer Of Technology Based Organization",
            "vision" => "Menjadikan majelis perwakilan kelas sebagai fasilitator untuk menampung aspirasi para warga sekolah serta menjadikan majelis perwakilan kelas sebagai jembatan penghubung antara siswa dan guru.",
            "mission" => "1. Membangun relasi yang baik dengan warga warga sekolah dan tentunya membangun kepercayaan warga sekolah.  <br>
2. Membuka ruang diskusi antar Majelis Perwakilan Kelas dengan warga sekolah untuk saling bertukar aspirasi dan pendapat. <br>
3. Memberikan google form rutin setiap bulan untuk mengetahui keluh kesah teman teman kelas tentang hal yang terkait kenyamanan disekolah <br>
4. Melakukan kegiatan sharing bersama antara guru dan murid untuk menjaring atau mengevaluasi aspirasi siswa. <br>
5. Mengadakan acara diskusi yang mengundang guru, siswa-siswi, dan berberapa perwakilan dari alumni untuk demi kemajuan almamater. <br>",
            "classroom_id" => 10,
            "election_id" => 2,
            "photo" => "2/5.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Nezha Putri Syahbila",
            "bio" => "-",
            "vision" => "-",
            "mission" => "-",
            "classroom_id" => 11,
            "election_id" => 2,
            "photo" => "2/6.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Atthaya Rasya Arianto",
            "bio" => "-",
            "vision" => "-",
            "mission" => "-",
            "classroom_id" => 11,
            "election_id" => 2,
            "photo" => "2/7.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Devi Nabila Riyanti",
            "bio" => "-",
            "vision" => "Menjadi jembatan komunikasi yang efektif antara siswa dan guru dalam menyampaikan aspirasi serta keluhan siswa, guna menciptakan lingkungan sekolah yang harmonis, adil, dan saling memahami.",
            "mission" => "1. Mengelola dan menyalurkan keluhan siswa dengan cara yang sopan kepada guru <br>
2. Mendorong keterbukaan dan transparansi dalam penyelesaian masalah antara siswa dan guru. Contohnya Menyampaikan laporan hasil data dari forum atau pertemuan dengan guru secara terbuka kepada siswa, sehingga semua siswa mengetahui penyelesaian masalah dan alasan yang diambil oleh pihak sekolah. <br>
3. Menyediakan wadah yang aman dan terpercaya bagi siswa untuk menyampaikan aspirasi dan protes. <br>",
            "classroom_id" => 12,
            "election_id" => 2,
            "photo" => "2/8.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Elsa Puspita Kumala",
            "bio" => "saya sebagai anggota MPK siap mendengarkan dan mewujudkan aspirasi siswa, serta menciptakan lingkungan positif dan inovatif.",
            "vision" => "Menjadi organisasi siswa yang inovatif, aspiratif, dan berdampak positif bagi seluruh siswa dan lingkungan sekolah",
            "mission" => "1. Menjadi wadah bagi siswa untuk menyampaikan aspirasi dan membangun komunikasi yang efektif. <br>
2. Merancang dan mengimplementasikan program-program pengembangan diri kepemimpinan, dan kewirausahaan untuk meningkatkan kompetensi siswa. <br>
3. Mengawasi dan mengkritisi kebijakan sekolah demi terwujud nya lingkungan belajar yang kondusif. <br>
    ",
            "classroom_id" => 12,
            "election_id" => 2,
            "photo" => "2/9.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Kirana Krisna Dewi",
            "bio" => "-",
            "vision" => "Mewujudkan sekolah yang penuh inspirasi, di mana setiap siswa memiliki kesempatan untuk bersuara, berkreasi, dan berkolaborasi.",
            "mission" => "1. Menumbuhkan pengembangan minat bakat siswa agar dapat mengasah keterampilan. <br>
2. Mendorong partisipasi aktif <br>
3. Menciptakan lingkungan inklusif <br>
4. Mengembangkan program kreatif <br>
5. Meningkatkan kesejahteraan siswa <br>
6. Memfasilitasi kolaborasi <br>",
            "classroom_id" => 12,
            "election_id" => 2,
            "photo" => "2/10.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Fahrezy Ahmad Ghifari",
            "bio" => "Mewujudkan Sekolah yang Ramah, Inklusif, dan Berprestasi melalui Kepemimpinan yang Transparan dan Terbuka.",
            "vision" => "Mewujudkan MPK yang berintegritas sebagai wadah aspirasi, bakat, potensi dan kreativitas siswa dengan mengoptimalkan fungsi organisasi sehingga tercipta transparansi pada setiap kegiatan sekolah. ",
            "mission" => "1. Menaati peraturan yang berlaku dalam menjalankan fungsi organisasi. <br>
2. Memberikan dukungan dan program pendukung bagi siswa untuk mencapai prestasi akademik yang tinggi. <br>
3. Meningkatkan solidaritas dan rasa tanggung jawab serta kedisiplinan anggota-anggota MPK. <br>",
            "classroom_id" => 12,
            "election_id" => 2,
            "photo" => "2/11.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Chico Alfaro Jonathan Setiawan",
            "bio" => "Menjadi pendengar yang baik yang mampu menampung aspirasi",
            "vision" => "Menjadi wadah aspirasi dan penghubung antara siswa, guru, serta pihak sekolah untuk menciptakan lingkungan sekolah yang harmonis, kreatif, dan inovatif.",
            "mission" => "1.Menampung dan menyampaikan aspirasi siswa untuk kepentingan bersama dalam pembangunan sekolah. <br>",
            "classroom_id" => 12,
            "election_id" => 2,
            "photo" => "2/12.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Deviara Putri Aulia Bakti",
            "bio" => " saya siap untuk menjadi jembatan aspirasi siswa dan siap berkerja dengan penuh tanggung jawab",
            "vision" => "Mewujudkan MPK sebagai organisasi yang solid, aspiratif, dan berintegritas dalam mendukung terciptanya lingkungan sekolah yang harmonis.  ",
            "mission" => "1. Memperkuat kerja sama internal kepengurusan secara profesional.  <br>
2. Menampung dan menyalurkan aspirasi siswa dengan adil.  <br>
3. Menjalin hubungan eksternal untuk mendukung pengembangan potensi siswa. <br>",
            "classroom_id" => 13,
            "election_id" => 2,
            "photo" => "2/13.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Achmad Nabron Zaen Aska",
            "bio" => "-",
            "vision" => "Mewujudkan lingkungan sekolah yang demokratis, berintegritas, serta menciptakan hubungan harmonis antara siswa, guru, dan sekolah",
            "mission" => "1.Mengembangkan jiwa kepemimpinan siswa melalui kegiatan-kegiatan yang inovatif dan inspiratif.
Menampung aspirasi siswa dengan membentuk forum atau diskusi untuk mendengar dan menindaklanjuti kebutuhan serta keinginan siswa. <br>",
            "classroom_id" => 13,
            "election_id" => 2,
            "photo" => "2/14.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Glory Geo S.",
            "bio" => "-",
            "vision" => "Menyatukan aspirasi dari Seluruh siswa skomda, membantu aspirasi tersebut agar dapat menjadi kenyataan atau menjadi suatu kegiatan yang real",
            "mission" => "1. Meningkatkan kualitas kerja MPK dengan Pelatihan dan Evaluasi <br>
2. Menyatukan Seluruh siswa Skomda agar dapat menjadi satu kesatuan Dengan tujuan yang sama <br>
3. Mempererat lebih lagi hubungan Organisasi Osis & MPK dan Sub Organ lainya <br>",
            "classroom_id" => 14,
            "election_id" => 2,
            "photo" => "2/15.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Haikal Tyo",
            "bio" => "saya layak menjadi MPK karena memiliki dedikasi, tanggung jawab, dan kemampuan untuk mengawal aspirasi siswa demi menciptakan lingkungan sekolah yang lebih baik.",
            "vision" => "menyalurkan aspirasi teman saya dan ingin membantu kegiatan osis yang lebih postif",
            "mission" => "1.menyalurkan aspirasi teman saya dan ingin membantu kegiatan osis yang lebih postif <br>",
            "classroom_id" => 15,
            "election_id" => 2,
            "photo" => "2/16.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Brahma Alfaris Reyraharjo",
            "bio" => "-",
            "vision" => "Mewujudkan kelas 
yang dikenal aktif, kompak, dan berprestasi di lingkungan sekolah.",
            "mission" => "1.Menjalin komunikasi yang baik antara kelas  dengan pihak sekolah. <br>
2.Mengorganisir kegiatan kelas yang mendukung citra positif kelas di lingkungan sekolah. <br>
3.Meningkatkan keterlibatan kelas dalam berbagai kegiatan sekolah. <br>",
            "classroom_id" => 1,
            "election_id" => 2,
            "photo" => "1/2.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Atha Raditya Primaldi",
            "bio" => "bisa menjadi contoh bagi siswa-siswa lain dalam hal kejujuran",
            "vision" => "menciptakan suasana belajar yang kreatif di sekolah",
            "mission" => "1. mewujudkan tata tertib dan disiplin di kelas
menjadi contoh bagi siswa-siswa lain dalam hal kejujuran, kerja keras dan sikap positif dalam belajar <br>",
            "classroom_id" => 1,
            "election_id" => 2,
            "photo" => "1/1.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Evan Satria M.",
            "bio" => "Perjuangkan aspirasi bersama, wujudkan aksi nyata",
            "vision" => "Menjadi wadah yang menginspirasi, menyuarakan aspirasi, dan memajukan SMK Telkom Sidoarjo melalui penguatan komunikasi, partisipasi aktif, dan kolaborasi antara siswa, guru, dan pihak sekolah untuk menciptakan lingkungan sekolah yang harmonis dan berkualitas",
            "mission" => "1.Meningkatkan komunikasi antara siswa, guru, dan pihak sekolah
MPK akan menjadi jembatan komunikasi yang efektif, menyampaikan aspirasi dan permasalahan siswa kepada pihak sekolah, serta menyebarkan informasi yang penting bagi seluruh warga sekolah. <br>
2.Menjadi wadah aspirasi bagi siswa
MPK akan membuka saluran bagi seluruh siswa untuk mengemukakan ide, kritik, dan saran guna perbaikan kualitas kegiatan dan kebijakan sekolah. <br>
3. Menyelenggarakan program kegiatan yang mendukung pengembangan karakter dan keterampilan siswa
MPK akan berperan aktif dalam merancang dan mendukung berbagai kegiatan yang dapat mengasah kemampuan soft skills, seperti kepemimpinan, kerja sama tim, dan tanggung jawab. <br>
4.Membangun semangat gotong royong dan kebersamaan
MPK akan menjadi motor penggerak untuk menciptakan lingkungan sekolah yang lebih inklusif dan harmonis, dengan mengadakan berbagai acara yang mempererat hubungan antar siswa. <br>",
            "classroom_id" => 2,
            "election_id" => 2,
            "photo" => "1/4.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Saqa Pandega",
            "bio" => "Yang terpercaya dan bertanggung jawab, bukan kabur-kaburan.",
            "vision" => "- Menjadikan Majelis Perwakilan Kelas (MPK) menjadi saluran atau alat komunikasi utama bagi para siswa untuk menyampaikan pendapat kepada Organisasi Siswa Intra Sekolah (OSIS). <br>
- Menyampaikan dan mewujudkan hal-hal penting yang disampaikan maupun dikeluhkan oleh para siswa kepada OSIS. <br>
- Mampu menjadi partner yang baik bagi OSIS dalam menjalankan prograam kerja, serta menghapus anggapan bahwa MPK memiliki jabatan lebih tinggi daripada OSIS. <br>
",
            "mission" => "1. Mengubah cara penyampaian keluhan, saran dan pendapat dari siswa agar tidak terlalu formal dan ribet, semua pendapat dari siswa dapat disampaikan secara langsung dan tidak harus melalui prosedur tertentu baru bisa diterima. Meski begitu kami juga tidak sembarangan menerima pendapat dan saran, semisal kami memperoleh saran diadakannya suatu event, kami akan terlebih dahulu mempertimbangkan apakah event yang diminta tersebut layak atau tidak. <br>
2. Membantu dan mendampingi setiap program kerja yang dilaksanakan OSIS dengan penuh tanggung jawab. <br>
3. Melakukan pendekatan kepada siswa agar tidak ada yang malu jika ingin berpendapat dan semua pendapat kritik dan saran dapat tersampaikan.<br>",
            "classroom_id" => 2,
            "election_id" => 2,
            "photo" => "1/3.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Farrel Al Farizi Putra Ahmad",
            "bio" => "Karena saya akan berusaha yang terbaik untuk organisasi selain itu saya juga memiliki pengalaman dalam organisasi saat SMP jadi saya akan memberikan yang terbaik dan juga sebisa mungkin saya tidak melakukan kesalahan ",
            "vision" => " menjadi wadah aspirasi siswa siswi dalam mengembangkan bakat yang di miliki siswa",
            "mission" => "1. Mengembangkan potensi dan kreativitas siswa dalam kegiatan yang bermanfaat dan juga menumbuhkan rasa tanggung jawab terhadap sesama siswa agar tidak terjadi perundungan <br>",
            "classroom_id" => 3,
            "election_id" => 2,
            "photo" => "1/6.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Mahafreen Chesna Nugroho",
            "bio" => "Saya siap bekerja sama dengan anggota MPK lainnya untuk memastikan bahwa aspirasi-aspirasi siswa dapat tersampaikan. Dengan semangat disiplin dan kreativitas, serta kemampuan komunikasi yang baik, saya ingin menciptakan lingkungan sekolah yang nyaman dan mendukung potensi setiap siswa.",
            "vision" => "Mewujudkan lingkungan sekolah yang harmonis, disiplin, kreatif dan nyaman melalui peran aktif siswa.",
            "mission" => "1. Menjadi jembatan yang kuat antara siswa dan pihak sekolah, serta menyalurkan aspirasi siswa. <br>
2. Mendorong keterlibatan siswa dalam sebuah kegiatan yang mendukung kreativitas, dan kemampuan siswa <br>
3. Membentuk dan mengawasi peraturan yang adil serta mendukung kenyamanan seluruh warga sekolah. <br>",
            "classroom_id" => 3,
            "election_id" => 2,
            "photo" => "1/5.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Zeirra Hanny Kayla Amirah",
            "bio" => "untuk membangun siswa siswi membangun ide ide kreatifitasnya dan juga untuk mengembangkan suatu organisasi",
            "vision" => " ingin membuat organisasi mpk lebih terkenal kedepannya dan jika ada usulan ide dari siswa siswi bisa saya ambil dan akan saya renungkan bareng anggota mpk yang lain dan membuat edukasi tentang kebersihan sekolah dan juga anti perundungan di lingkungan sekolah",
            "mission" => "1. saya ingin membuat banyak projek\proker yang menarik untuk siswa siswa di smk Telkom dengan ide saya atau ide siswa siswi smk Telkom sidoarjo <br>",
            "classroom_id" => 3,
            "election_id" => 2,
            "photo" => "1/7.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Aisha Ayu Prameswari",
            "bio" => "kalimat tanpa aksi hanyalah imajinasi, jadikan motivasi untuk mendengar aspirasi",
            "vision" => "ingin memaksimalkan acara acara yg akan diadakan dan mengundang antusias dan keterlibatan dari seluruh siswa serta tetap mengedepankan moral dan kreatifitas siswa dalam acara.",
            "mission" => "1. Menjadi pihak yang dipercayai oleh siswa untuk menyampaikan pendapat atau saran yang nantinya akan dituangkan dalam forum dan tentunya akan tetap bekerja sama dengan osis untuk memaksimalkan acara. <br>",
            "classroom_id" => 4,
            "election_id" => 2,
            "photo" => "1/9.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Naura Intania Farah Jinan",
            "bio" => "Saya siap menjadi penghubung antara siswa/i dan sekolah, mendengarkan aspirasi, serta bekerja sama untuk menciptakan perubahan positif. Pilih saya untuk mewakili suara kalian dengan penuh tanggung jawab.",
            "vision" => "Mewujudkan MPK sebagai organisasi yang inspiratif, responsif, dan inovatif dalam mendukung terciptanya lingkungan sekolah yang harmonis, berprestasi, dan berkarakter.",
            "mission" => "1. Membangun komunikasi efektif antara siswa, guru, dan pihak sekolah untuk menciptakan lingkungan yang kondusif. <br>
2. Menampung dan menyalurkan aspirasi siswa agar tercapai keadilan dan kenyamanan di lingkungan sekolah. <br>
3. Mengembangkan program-program yang mendukung kreativitas serta keterampilan siswa sesuai dengan kompetensi keahlian yang ada di SMK TELKOM. <br>
4. Menanamkan nilai-nilai karakter dan moral melalui kegiatan-kegiatan positif dan edukatif. <br>
5. Meningkatkan partisipasi aktif siswa dalam kegiatan sekolah untuk memperkuat rasa kebersamaan dan solidaritas antar-siswa. <br>
6. Mengadakan kegiatan pembinaan dan pelatihan bagi pengurus MPK agar memiliki kemampuan kepemimpinan yang kuat dan bertanggung jawab. <br>
",
            "classroom_id" => 4,
            "election_id" => 2,
            "photo" => "1/8.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Aliyatusshafa Hana Ekasari",
            "bio" => "-",
            "vision" => "Menjadi penghubung yang efektif antara siswa dan sekolah, serta menciptakan lingkungan yang  inovatif, dinamis dan adaptif terhadap perubahan kedepan.
",
            "mission" => "1. Mewakili Suara Siswa <br>
2. Meningkatkan Keterlibatan Siswa. <br>
3. Mewakili Kepentingan Siswa. <br>
4. Meningkatkan Komunikasi dan Kolaborasi. <br>",
            "classroom_id" => 5,
            "election_id" => 2,
            "photo" => "1/11.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Aka Lintang Prastama Putra",
            "bio" => "Suara Siswa, Aksi Nyata!",
            "vision" => "MPK sebagai penggerak harmoni dan inovasi sekolah.",
            "mission" => "1. Menyuarakan aspirasi siswa. <br>",
            "classroom_id" => 5,
            "election_id" => 2,
            "photo" => "1/10.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Ava Zabrina Tunggadewi",
            "bio" => "-",
            "vision" => "Menjadi wadah inspiratif yang menghubungkan saran , pendapat , maupun kritik siswa dengan osis ataupun sekolah . Serta menciptakan suasana lingkungan sekolah yang harmonis , dan mewujudkan sekolah yang penuh motivasi dan inovasi.",
            "mission" => "1. Menyatukan suara dan ide kreatif siswa untuk memperbaiki dan mengembangkan sekolah, menjadikan sekolah sebagai tempat yang lebih menyenangkan dan positif. <br>
2. Menyediakan peluang bagi setiap siswa untuk menjadi pribadi yang memiliki keterampilan berkomunikasi dengan baik , kerja sama tim  ,berpikir kritis dan kreatif . Melalui kegiatan yang mengasah potensi keterampilan mereka. <br>
3. Mendorong kerjasama antara siswa, guru, maupun sekolah untuk menciptakan lingkungan yang saling mendukung, memotivasi, dan memberikan dampak positif bagi perkembangan seluruh warga sekolah. <br>
4. Menyelenggarakan acara dan program yang tidak hanya menarik, tetapi juga memberikan pengalaman belajar dan pengembangan diri siswa. <br>",
            "classroom_id" => 6,
            "election_id" => 2,
            "photo" => "1/12.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Queisha Aletha",
            "bio" => "kita hidup berorganisasi, jangan cari hidup di organisasi",
            "vision" => "Meningkatkan potensi serta menjadi wadah aspirasi bagi para siswa, melaksanakan tugas secara profesional efisien dan disiplin agar terciptanya keselarasan serta suasana yang kondusif dan demokratif.",
            "mission" => "1. Meningkatkan kinerja mpk yang dilandasi oleh akhlak, iman dan taqwa <br>
2. Menciptakan lingkungan sekolah yang positif, bersih dan nyaman <br>
3. Menjalin kerja sama yang baik antara OSIS dan mpk <br>
4. Membangun protensi siswa yang kreatif dan inovatif agar tercipta keterbukaan dlm lingkungan sekolah <br>",
            "classroom_id" => 6,
            "election_id" => 2,
            "photo" => "1/13.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Kirani Alika Putri",
            "bio" => "-",
            "vision" => " mampu mengoptimalkan kinerja mpk sebagai wadah yang mengutamakan aspirasi siswa dalam mendukung sistem keterbukaan informasi di lingkungan sekola",
            "mission" => "1. mampu menjalankan fungsi dan tugas mpk sesuai peraturan dan ketentuan sekolah <br>
2. membangun hubungan kordinasi dan sinkronisasi informasi dengan guru dan siswa sekolah <br>
3.  mengembangkan media siswa sebagai sarana untuk  menyampaikan aspirasi dan keterbukaan di lingkungan sekolah <br>",
            "classroom_id" => 7,
            "election_id" => 2,
            "photo" => "1/14.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Nesha Hazimah Anjani",
            "bio" => "Saya akan menjadi anggota MPK yang bertanggung jawab, mendengar aspirasi siswa, dan berkomitmen menciptakan lingkungan sekolah yang lebih baik",
            "vision" => "Menjadi jembatan komunikasi antara siswa dan sekolah, serta menciptakan lingkungan belajar yang inklusif, produktif, dan inovatif",
            "mission" => "1. Meningkatkan komunikasi <br>
2. Mendorong partisipasi aktif <br>
3. Menciptakan lingkungan inklusif <br>
4. Mengembangkan program kreatif <br>
5. Meningkatkan kesejahteraan siswa <br>
6. Memfasilitasi kolaborasi <br>",
            "classroom_id" => 7,
            "election_id" => 2,
            "photo" => "1/15.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Gabriella Fajar S & Charen Jullieta K",
            "bio" => "-",
            "vision" => "Menjadikan osis ini menjadi wadah kreatifitas dan inspiratif siswa membentuk karakter cerdas, aktif, mulia, dan berprestasi.",
            "mission" => "Mengembangkan kreativitas dan kepemimpinan berbagai kegiatan, meningkatkan partisipasi kegiatan osis, membangun karakter siswa yg mulia, menjalin kerjasama dalam berbagai pihak, menciptakan lingkungan positif.",
            "classroom_id" => 9,
            "election_id" => 1,
            "photo" => "3/1.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Ahmad Nabil Fauzan A. & Syarifatun Nisa'i Nur Aulia",
            "bio" => "-",
            "vision" => "Mewujudkan osis wadah kolaborasi aktif yg menyelenggarakn kegiatan yg bermanfaat dan inspiratif yg bermanfaat.",
            "mission" => "Menyelenggarakan kegiatan yg mempertemukan minat dan bakat siswa, menciptakan program osis yg berfokus pada kreatif dan kolaboratif.",
            "classroom_id" => 8,
            "election_id" => 1,
            "photo" => "3/2.png",



        ]);

        $candidate = Candidate::create([

            "name" => "Ilham Yudistira S.A. & Tifanny Oriza Meiladina",
            "bio" => "-",
            "vision" => "Mewujudkan dan membangun lingkungan sekolah kreatif inspiratif utk mendorong siswa mencapai ilmu yg berarti",
            "mission" => "Mewujudkan program kerja yang inspiratif dan menarik, hubungan harmonis siswa dan guru,melibatkan siswa dalam organisasi utk menjalin kebersamaan.",
            "classroom_id" => 15,
            "election_id" => 1,
            "photo" => "3/3.png",



        ]);


        $candidate = Candidate::create([

            "name" => "Reyjuno Al Cannavaro & Auraluthfia Annisa",
            "bio" => "-",
            "vision" => "Menjadikan osis wadah pengembangan siswa yg kreatif dan berjiwa kreatif tangguh, lingkungan nyaman.",
            "mission" => "Mengembangkan potensi siswa program kreatif, menciptakan lingkungan harmonis, solidaritas siswa, mewujudkan generasi berkualitas, dan penggadaian siswa, Mewujudkan siswa yg berdaya saing.",
            "classroom_id" => 9,
            "election_id" => 1,
            "photo" => "3/4.png",



        ]);

    }
}
