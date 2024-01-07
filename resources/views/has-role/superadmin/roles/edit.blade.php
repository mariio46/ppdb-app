@extends('layouts.has-role.auth', ['title' => "Role {$role->name}"])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Edit {{ $role->name }}
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <x-label value="Nama Role" />
                    <x-input id="role" name="role" placeholder="Masukkan Nama Role" :value="$role->name" />
                </div>
                <div class="mb-2">
                    <x-label value="Permission" />
                    <x-select class="select2 form-select" data-placeholder="Pilih Permission" multiple>
                        @foreach ($permissions as $item)
                            <option value="{{ $item->value }}" {{ in_array($item->value, $selected_permissions) ? 'selected' : '' }}>{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                    <x-button color="success">Tambah Role</x-button>
                    <x-link color="secondary" :href="route('roles.index')">Batalkan</x-link>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Hapus Role</div>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                    <div class="alert-body p-2">
                        <span>
                            Apakah anda yakin ingin menghapus data ini?
                        </span>
                    </div>
                </div>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data ini" variant="danger" />

                <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#delete-role-{{ $role->id }}" type="button" color="danger">Hapus Role</x-button>
                <x-modal modal_id="delete-role-{{ $role->id }}" label_by="deleteRoleModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Role {{ $role->name }}</h5>
                        <p>
                            Apakah Anda yakin ingin menghapus data ini? Data yang sudah di hapus tidak bisa di kembalikan kembali
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <x-button color="danger">Ya, Hapus</x-button>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection
