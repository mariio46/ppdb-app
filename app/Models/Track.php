<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Track
{
    private function requirement(array $additional_array = null): array
    {
        $data = [
            "Ijazah / Surat Keterangan Lulus (SKL) asli dan fotokopi pengesahan/legalisir oleh kepala sekolah asal",
            "Kartu Keluarga asli dan fotokopi",
            "Akta Kelahiran asli dan fotokopi",
            "Rapor asli semester 1 sampai 5 asli dan fotokopi pengesahan/legalisir oleh kepala sekolah asal",
            "Bukti pendaftaran (dapat diunduh dengan menggunakan tombol di bawah)",
        ];

        if ($additional_array !== null) {
            array_merge($data, $additional_array);
        }

        return $data;
    }

    protected function collection(): Collection
    {
        return collect([
            [
                'code' => 'AA',
                'type' => 'sma',
                'name' => 'Afirmasi',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>',
                'info' => 'Afirmasi'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement()
            ],
            [
                'code' => 'AB',
                'type' => 'sma',
                'name' => 'Perpindahan Tugas Orang Tua',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 5l0 2" /><path d="M15 11l0 2" /><path d="M15 17l0 2" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>',
                'info' => 'Perpindahan Tugas Orang Tua'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Surat keterangan domisili",
                    "Surat keterangan perpindahan / mutasi orang tua / wali asli dan fotokopi"
                ])
            ],
            [
                'code' => 'AC',
                'type' => 'sma',
                'name' => 'Anak Guru',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>',
                'info' => 'Anak Guru'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Surat keterangan penugasan orang tua asli dan fotokopi"
                ])
            ],
            [
                'code' => 'AD',
                'type' => 'sma',
                'name' => 'Prestasi Akademik',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" /></svg>',
                'info' => 'Prestasi Akademik'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement()
            ],
            [
                'code' => 'AE',
                'type' => 'sma',
                'name' => 'Prestasi Non Akademik',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 21l8 0" /><path d="M12 17l0 4" /><path d="M7 4l10 0" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /></svg>',
                'info' => 'Prestasi Non Akademik'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Sertifikat / piagam prestasi asli dan fotokopi dengan pengesahan dari lembaga terkait",
                    "Bagi Hafidz / penghafal Al-Qur'an: Sertifikat hafidz asli dan fotokopi dengan pengesahan dari lembaga pemberi sertifikat"
                ]),
            ],
            [
                'code' => 'AF',
                'type' => 'sma',
                'name' => 'Zonasi',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>',
                'info' => 'Zonasi'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement()
            ],
            [
                'code' => 'AG',
                'type' => 'sma',
                'name' => 'Boarding School',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" /><path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" /></svg>',
                'info' => 'Boarding School'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement(),
            ],
            [
                'code' => 'KA',
                'type' => 'smk',
                'name' => 'Afirmasi',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>',
                'info' => 'Afirmasi'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement(),
            ],
            [
                'code' => 'KB',
                'type' => 'smk',
                'name' => 'Perpindahan Tugas Orang Tua',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 5l0 2" /><path d="M15 11l0 2" /><path d="M15 17l0 2" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>',
                'info' => 'Perpindahan Tugas Orang Tua'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Surat keterangan domisili",
                    "Surat keterangan perpindahan / mutasi orang tua / wali asli dan fotokopi"
                ]),
            ],
            [
                'code' => 'KC',
                'type' => 'smk',
                'name' => 'Anak Guru',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>',
                'info' => 'Anak Guru'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Surat keterangan penugasan orang tua asli dan fotokopi"
                ]),
            ],
            [
                'code' => 'KD',
                'type' => 'smk',
                'name' => 'Prestasi Akademik',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" /></svg>',
                'info' => 'Prestasi Akademik'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement()
            ],
            [
                'code' => 'KE',
                'type' => 'smk',
                'name' => 'Prestasi Non Akademik',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 21l8 0" /><path d="M12 17l0 4" /><path d="M7 4l10 0" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /></svg>',
                'info' => 'Prestasi Non Akademik'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement([
                    "Sertifikat / piagam prestasi asli dan fotokopi dengan pengesahan dari lembaga terkait",
                    "Bagi Hafidz / penghafal Al-Qur'an: Sertifikat hafidz asli dan fotokopi dengan pengesahan dari lembaga pemberi sertifikat"
                ]),
            ],
            [
                'code' => 'KF',
                'type' => 'smk',
                'name' => 'Domisili Terdekat',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>',
                'info' => 'Domisili Terdekat'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement(),
            ],
            [
                'code' => 'KG',
                'type' => 'smk',
                'name' => 'Anak DUDI',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" /><path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19.001 15.5v1.5" /><path d="M19.001 21v1.5" /><path d="M22.032 17.25l-1.299 .75" /><path d="M17.27 20l-1.3 .75" /><path d="M15.97 17.25l1.3 .75" /><path d="M20.733 20l1.3 .75" /></svg>',
                'info' => 'Anak Dunia Usaha / Dunia Industri'
                    . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
                    . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
                    . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
                    . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
                    . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
                'requirement' => $this->requirement(),
            ],
        ]);
    }

    public function get(string $type): Collection
    {
        return $this->collection()->where('type', '=', $type)->values();
    }

    public function getCodeName(): Collection
    {
        return collect($this->collection()->pluck('name', 'code')->all());
    }

    public function getIcon(): Collection
    {
        return collect($this->collection()->pluck('icon', 'code')->all());
    }

    public function getInfo(string $code): string
    {
        return $this->collection()->where('code', '=', $code)->pluck('info')->first();
    }

    public function getRequirements(): Collection
    {
        return collect($this->collection()->pluck('requirement', 'code')->all());
    }
}
