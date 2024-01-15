<div class="d-flex gap-md-2">
    <x-link class="mb-2" :variant="request()->routeIs('school-data.index') ? 'default' : 'flat'" :color="request()->routeIs('school-data.index') ? 'primary' : 'secondary'" :href="route('school-data.index', [$sekolah_id, $satuan_pendidikan])">
        <x-tabler-home />
        Info Sekolah
    </x-link>
    @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs' || $satuan_pendidikan == 'fbs')
        <x-link class="mb-2" :variant="request()->routeIs('school-data.quota') ? 'default' : 'flat'" :color="request()->routeIs('school-data.quota') ? 'primary' : 'secondary'" :href="route('school-data.quota')">
            <x-tabler-chart-pie />
            Kuota Sekolah
        </x-link>
        @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs')
            <x-link class="mb-2" :variant="request()->routeIs('sekolah.zone') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zone') ? 'primary' : 'secondary'" :href="route('sekolah.zone', [$sekolah_id, $satuan_pendidikan])">
                <x-tabler-map-pin-filled />
                Wilayah Zonasi
            </x-link>
        @endif
    @elseif ($satuan_pendidikan == 'smk')
        <x-link class="mb-2" :variant="request()->routeIs('school-data.quota') ? 'default' : 'flat'" :color="request()->routeIs('school-data.quota') ? 'primary' : 'secondary'" :href="route('school-data.quota')">
            <x-tabler-chart-pie />
            Jurusan dan Kuota
        </x-link>
    @endif
    <x-link class="mb-2" :variant="request()->routeIs('school-data.document') ? 'default' : 'flat'" :color="request()->routeIs('school-data.document') ? 'primary' : 'secondary'" :href="route('school-data.document')">
        <x-tabler-file />
        Dokumen
    </x-link>
</div>
