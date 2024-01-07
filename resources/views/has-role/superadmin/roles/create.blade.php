@extends('layouts.has-role.auth', ['title' => 'Tambah Role'])

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
                    Tambah Role
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <x-label value="Nama Role" />
                    <x-input id="role" name="role" placeholder="Masukkan Nama Role" />
                </div>
                <div class="mb-2">
                    <x-label value="Permission" />

                    <x-select class="select2 form-select" data-placeholder="Pilih Permission" multiple>
                        @foreach ($permissionsChunk as $index => $pemissions)
                            @php $groupName = $permissionGroupNames[$index] ?? 'Unknown Group'; @endphp
                            <optgroup label="{{ $groupName }}">
                                @foreach ($pemissions as $item)
                                    <option value="{{ $item->value }}">{{ $item->label }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </x-select>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                    <x-button color="success">Tambah Role</x-button>
                    <x-link color="secondary" :href="route('roles.index')">Batalkan</x-link>
                </div>
            </div>
        </div>
    </div>
@endsection
