<div class="d-flex gap-md-2">
    <x-link class="mb-2" :variant="request()->routeIs('school-data.index') ? 'default' : 'flat'" :color="request()->routeIs('school-data.index') ? 'primary' : 'secondary'" :href="route('school-data.index')">
        <x-tabler-info-circle />
        Info Sekolah
    </x-link>
    @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs' || $satuan_pendidikan == 'fbs')
        <x-link class="mb-2" :variant="request()->routeIs('school-quota.index') ? 'default' : 'flat'" :color="request()->routeIs('school-quota.index') ? 'primary' : 'secondary'" :href="route('school-quota.index')">
            <x-tabler-chart-pie />
            Kuota Sekolah
        </x-link>
        @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs')
            <x-link class="mb-2" :variant="request()->routeIs('school-zone.index') ? 'default' : 'flat'" :color="request()->routeIs('school-zone.index') ? 'primary' : 'secondary'" :href="route('school-zone.index')">
                <x-tabler-map-pin-filled />
                Wilayah Zonasi
            </x-link>
        @endif
    @elseif ($satuan_pendidikan == 'smk')
        <x-link class="mb-2" :variant="request()->routeIs('school-quota.index') ? 'default' : 'flat'" :color="request()->routeIs('school-quota.index') ? 'primary' : 'secondary'" :href="route('school-quota.index')">
            <x-tabler-chart-pie />
            Jurusan dan Kuota
        </x-link>
    @endif
    <x-link class="mb-2" :variant="request()->routeIs('school-data.document') ? 'default' : 'flat'" :color="request()->routeIs('school-data.document') ? 'primary' : 'secondary'" :href="route('school-data.document')">
        <x-tabler-file />
        Dokumen
    </x-link>
    <x-link class="mb-2" :variant="request()->routeIs('school-coordinate.index') ? 'default' : 'flat'" :color="request()->routeIs('school-coordinate.index') ? 'primary' : 'secondary'" :href="route('school-coordinate.index')">
        <x-tabler-current-location />
        Koordinat Sekolah
    </x-link>
</div>
