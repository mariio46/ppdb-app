<x-modal modal_id="add-new-zone" label_by="createZone" align="modal-dialog-centered" size="modal-lg">
    <x-modal.header>
        <h5 class="modal-title fw-bolder">Tambah Wilayah Baru</h5>
        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
    </x-modal.header>
    <x-modal.body>
        <form id="form-add-zone" action="{{ route('school-zone.store', $sekolah_id) }}" method="POST">
            @csrf
            <div class="row match-height">
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-label for="provinsi">Provinsi</x-label>
                        <x-select class="select2-in-modal form-select" id="provinsi" name="provinsi" data-placeholder="Pilih Provinsi">
                            <x-empty-option />
                        </x-select>
                    </div>
                    <div class="mb-2">
                        <x-label for="kabupaten">Kabupaten/Kota</x-label>
                        <x-select class="select2-in-modal form-select" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kabupaten/Kota" disabled>
                            <x-empty-option />
                        </x-select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-label for="kecamatan">Kecamatan</x-label>
                        <x-select class="select2-in-modal form-select" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan" disabled>
                            <x-empty-option />
                        </x-select>
                    </div>
                </div>
            </div>
            <div class="justify-content-center d-flex gap-1 my-1">
                <x-button id="save-school-zone" type="submit" color="success">Simpan</x-button>
                <x-button data-bs-dismiss="modal" type="button" color="secondary">Batalkan</x-button>
            </div>
        </form>
    </x-modal.body>
</x-modal>
