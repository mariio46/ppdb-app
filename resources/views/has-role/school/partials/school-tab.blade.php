<div class="d-flex gap-md-2">
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.detail') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.detail') ? 'primary' : 'secondary'" :href="route('sekolah.detail', ['id' => $id, 'unit' => $unit])">
        <x-tabler-info-circle />
        Info Sekolah
    </x-link>
    @if ($unit == 'sma' || $unit == 'hbs' || $unit == 'fbs')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', ['id' => $id, 'unit' => $unit])">
            <x-tabler-chart-pie />
            Kuota Sekolah
        </x-link>
    @endif
    @if ($unit == 'smk')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', ['id' => $id, 'unit' => $unit])">
            <x-tabler-chart-pie />
            Jurusan dan Kuota
        </x-link>
    @endif
    @if ($unit == 'sma' || $unit == 'hbs')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.zones') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zones') ? 'primary' : 'secondary'" :href="route('sekolah.zones', ['id' => $id, 'unit' => $unit])">
            <x-tabler-map-pin-filled />
            Wilayah Zonasi
        </x-link>
    @endif
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.document') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.document') ? 'primary' : 'secondary'" :href="route('sekolah.document', ['id' => $id, 'unit' => $unit])">
        <x-tabler-file />
        Dokumen
    </x-link>
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.coordinate') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.coordinate') ? 'primary' : 'secondary'" :href="route('sekolah.coordinate', ['id' => $id, 'unit' => $unit])">
        <x-tabler-current-location />
        Koordinat Sekolah
    </x-link>
</div>
