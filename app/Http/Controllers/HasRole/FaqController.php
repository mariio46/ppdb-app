<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        return view('has-role.faq.index');
    }

    public function create(): View
    {
        return view('has-role.faq.create');
    }

    public function edit(string $slug): View
    {
        return view('has-role.faq.edit', compact('slug'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function faq(string $slug): JsonResponse
    {
        $faq = collect($this->faqs()->original)->firstWhere('slug', $slug);

        return response()->json($faq);
    }

    protected function faqs(): JsonResponse
    {
        $faqs = [
            [
                'question' => $question = 'Apa syarat utama untuk mendaftar di sekolah ini?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Syarat utama untuk mendaftar adalah memiliki usia minimal 6 tahun dan telah menyelesaikan pendidikan taman kanak-kanak.',
            ],
            [
                'question' => $question = 'Bagaimana cara mengisi formulir pendaftaran online?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Anda dapat mengakses situs web resmi kami, masuk ke bagian pendaftaran, dan mengisi formulir online dengan informasi yang diperlukan.',
            ],
            [
                'question' => $question = 'Berapa biaya pendaftaran untuk sekolah ini?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Biaya pendaftaran sekolah kami adalah Rp 500.000,- per peserta didik baru.',
            ],
            [
                'question' => $question = 'Apakah tersedia beasiswa untuk peserta didik baru?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Ya, kami menyediakan program beasiswa berdasarkan prestasi akademis dan non-akademis. Informasi lebih lanjut dapat ditemukan di kantor sekolah.',
            ],
            [
                'question' => $question = 'Bagaimana proses seleksi peserta didik baru dilakukan?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Proses seleksi melibatkan ujian tertulis dan wawancara. Rincian lebih lanjut akan diumumkan setelah pendaftaran selesai.',
            ],
            [
                'question' => $question = 'Kapan pengumuman hasil seleksi akan diumumkan?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Pengumuman hasil seleksi akan diumumkan pada tanggal 15 Juni melalui situs web dan pemberitahuan akan dikirimkan melalui email.',
            ],
            [
                'question' => $question = 'Bagaimana cara pembayaran biaya pendidikan?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Biaya pendidikan dapat dibayarkan melalui transfer bank atau datang langsung ke kantor sekolah. Nomor rekening akan diberikan setelah hasil seleksi.',
            ],
            [
                'question' => $question = 'Apakah ada kegiatan ekstrakurikuler yang tersedia?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Ya, kami menyediakan berbagai kegiatan ekstrakurikuler, termasuk olahraga, seni, dan ilmiah. Peserta didik dapat memilih sesuai minat mereka.',
            ],
            [
                'question' => $question = 'Bagaimana jika ada pertanyaan lebih lanjut?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Anda dapat menghubungi kantor sekolah kami pada jam kerja atau mengirimkan pertanyaan melalui formulir kontak di situs web.',
            ],
            [
                'question' => $question = 'Apakah sekolah ini memiliki fasilitas transportasi?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Ya, kami menyediakan fasilitas transportasi sekolah untuk peserta didik yang membutuhkan. Tarif dan rute dapat dilihat di bagian informasi sekolah.',
            ],
            [
                'question' => $question = 'Apa program unggulan yang ditawarkan oleh sekolah ini?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Program unggulan kami melibatkan pengembangan keterampilan 21st century, seperti literasi digital dan pemecahan masalah.',
            ],
            [
                'question' => $question = 'Adakah bantuan beasiswa bagi siswa yang berprestasi?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Kami memberikan beasiswa berdasarkan prestasi akademis, sosial, dan olahraga. Informasi lebih lanjut dapat ditemukan di kantor sekolah.',
            ],
            [
                'question' => $question = 'Bagaimana cara mengajukan izin ketidakhadiran?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Izin ketidakhadiran dapat diajukan dengan menghubungi wali kelas atau mengisi formulir izin yang tersedia di kantor sekolah.',
            ],
            [
                'question' => $question = 'Apakah ada kegiatan khusus untuk memperkuat hubungan antara sekolah dan orang tua?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Kami menyelenggarakan pertemuan orang tua guru, acara keluarga, dan lokakarya yang dirancang untuk memperkuat keterlibatan orang tua dalam pendidikan anak.',
            ],
            [
                'question' => $question = 'Bagaimana cara mendapatkan informasi tentang kegiatan ekstrakurikuler?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Informasi tentang kegiatan ekstrakurikuler dapat ditemukan di situs web sekolah, papan pengumuman, dan bisa ditanyakan langsung kepada guru pembimbing.',
            ],
            [
                'question' => $question = 'Apa persyaratan untuk mengikuti kegiatan belajar di luar negeri?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Peserta didik yang ingin mengikuti kegiatan belajar di luar negeri harus memenuhi persyaratan tertentu dan mendapatkan persetujuan dari pihak sekolah.',
            ],
            [
                'question' => $question = 'Apakah ada kursus persiapan ujian nasional?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Ya, kami menyelenggarakan kursus persiapan ujian nasional bagi siswa kelas akhir untuk membantu mereka mempersiapkan diri dengan baik.',
            ],
            [
                'question' => $question = 'Bagaimana prosedur jika ingin mengajukan saran atau keluhan?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Saran atau keluhan dapat diajukan melalui formulir yang disediakan di situs web sekolah atau langsung melalui kantor sekolah.',
            ],
            [
                'question' => $question = 'Apakah ada klub buku di sekolah ini?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Ya, kami memiliki klub buku yang aktif di sekolah, di mana siswa dapat berpartisipasi dalam diskusi buku dan kegiatan terkait literasi.',
            ],
            [
                'question' => $question = 'Apa fasilitas yang tersedia di perpustakaan sekolah?',
                'slug' => str(strtolower($question))->slug(),
                'answer' => 'Perpustakaan sekolah dilengkapi dengan koleksi buku yang beragam, komputer, dan area baca yang nyaman untuk mendukung kegiatan literasi siswa.',
            ],
        ];

        return response()->json($faqs);
    }
}
