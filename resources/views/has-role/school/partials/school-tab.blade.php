<x-link class="mb-2" :variant="request()->routeIs('sekolah.detail') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.detail') ? 'primary' : 'secondary'" :href="route('sekolah.detail', $school->npsn)">
    <x-tabler-home />
    Info Sekolah
</x-link>
@if ($school->unit == 'SMA')
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', $school->npsn)">
        <x-tabler-chart-pie />
        Kuota Sekolah
    </x-link>
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.zone') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zone') ? 'primary' : 'secondary'" :href="route('sekolah.zone', $school->npsn)">
        <x-tabler-map-pin-filled />
        Wilayah Zonasi
    </x-link>
@elseif ($school->unit == 'SMK')
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.major-quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.major-quota') ? 'primary' : 'secondary'" :href="route('sekolah.major-quota', $school->npsn)">
        <x-tabler-chart-pie />
        Jurusan dan Kuota
    </x-link>
@endif
