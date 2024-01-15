<x-link class="mb-2" :variant="request()->routeIs('sekolah.detail') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.detail') ? 'primary' : 'secondary'" :href="route('sekolah.detail', [$id, $unit])">
    <x-tabler-home />
    Info Sekolah
</x-link>
@if ($unit == 'sma' || $unit == 'hbs' || $unit == 'fbs')
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', [$id, $unit])">
        <x-tabler-chart-pie />
        Kuota Sekolah
    </x-link>
    @if ($unit == 'sma' || $unit == 'hbs')
        <x-link class="mb-2" :variant="request()->routeIs('sekolah.zone') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.zone') ? 'primary' : 'secondary'" :href="route('sekolah.zone', [$id, $unit])">
            <x-tabler-map-pin-filled />
            Wilayah Zonasi
        </x-link>
    @endif
@elseif ($unit == 'smk')
    <x-link class="mb-2" :variant="request()->routeIs('sekolah.quota') ? 'default' : 'flat'" :color="request()->routeIs('sekolah.quota') ? 'primary' : 'secondary'" :href="route('sekolah.quota', [$id, $unit])">
        <x-tabler-chart-pie />
        Jurusan dan Kuota
    </x-link>
@endif
