@extends('layouts.has-role.auth', ['title' => 'Perangkingan'])

@section('content')
    <h1>Perangkingan</h1>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body px-0">
                        <div class="table-responsive border-bottom">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Satuan Pendidikan</th>
                                        <th class="align-middle">Jalur Pendaftaran</th>
                                        <th class="align-middle">Tanggal Pengumuman</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Detail</th>
                                        <th class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Afirmasi</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Perpindahan Tugas Orang Tua</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Anak Guru</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Prestasi Akademik</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Prestasi Non Akademik</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Zonasi</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>Boarding School</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Afirmasi</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Perpindahan Tugas Orang Tua</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Anak Guru</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Prestasi Akademik</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Prestasi Non Akademik</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Domisili Terdekat</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SMK</td>
                                        <td>Anak DUDI</td>
                                        <td>31 Januari 2024</td>
                                        <td>sudah publish</td>
                                        <td>
                                            <x-link variant="outline" color="success">Detail</x-link>
                                        </td>
                                        <td>
                                            <x-button color="warning">Rangking</x-button>
                                            <x-button color="primary">Publish</x-button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
