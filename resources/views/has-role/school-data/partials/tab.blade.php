<div class="d-flex gap-md-2">
    <x-link class="mb-2" :variant="request()->routeIs('school-data.index') ? 'default' : 'flat'" :color="request()->routeIs('school-data.index') ? 'primary' : 'secondary'" :href="route('school-data.index', [$npsn, $unit])">
        <x-tabler-home />
        Info Sekolah
    </x-link>
    @if ($unit == 'SMA' || $unit == 'SMA Half Boarding' || $unit == 'SMA Boarding')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', [$npsn, $unit])">
            <x-tabler-chart-pie />
            Kuota Sekolah
        </x-link>
        @if ($unit == 'SMA' || $unit == 'SMA Half Boarding')
            <x-link class="mb-2" :variant="request()->routeIs('sekolah.zone') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zone') ? 'primary' : 'secondary'" :href="route('sekolah.zone', [$npsn, $unit])">
                <x-tabler-map-pin-filled />
                Wilayah Zonasi
            </x-link>
        @endif
    @elseif ($unit == 'SMK')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.major-quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.major-quota') ? 'primary' : 'secondary'" :href="route('sekolah.major-quota', [$npsn, $unit])">
            <x-tabler-chart-pie />
            Jurusan dan Kuota
        </x-link>
    @endif
</div>
