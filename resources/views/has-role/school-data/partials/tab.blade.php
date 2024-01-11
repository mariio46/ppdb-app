<div class="d-flex gap-md-2">
    <x-link class="mb-2" :variant="request()->routeIs('school-data.index') ? 'default' : 'flat'" :color="request()->routeIs('school-data.index') ? 'primary' : 'secondary'" :href="route('school-data.index', [$npsn, $unit])">
        <x-tabler-home />
        Info Sekolah
    </x-link>
    @if ($unit == 1 || $unit == 4 || $unit == 3)
        <x-link class="mb-2" :variant="request()->routeIs('school-data.quota') ? 'default' : 'flat'" :color="request()->routeIs('school-data.quota') ? 'primary' : 'secondary'" :href="route('school-data.quota')">
            <x-tabler-chart-pie />
            Kuota Sekolah
        </x-link>
        @if ($unit == 1 || $unit == 4)
            <x-link class="mb-2" :variant="request()->routeIs('sekolah.zone') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zone') ? 'primary' : 'secondary'" :href="route('sekolah.zone', [$npsn, $unit])">
                <x-tabler-map-pin-filled />
                Wilayah Zonasi
            </x-link>
        @endif
    @elseif ($unit == 2)
        <x-link class="mb-2" :variant="request()->routeIs('school-data.quota') ? 'default' : 'flat'" :color="request()->routeIs('school-data.quota') ? 'primary' : 'secondary'" :href="route('school-data.quota')">
            <x-tabler-chart-pie />
            Jurusan dan Kuota
        </x-link>
    @endif
</div>
