<!-- <x-filament-panels::page>

</x-filament-panels::page> -->
@extends('filament::pages.dashboard')

@section('content')
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
        @livewire(\App\Filament\Widgets\UserStats::class)
        {{-- Add more custom widgets or components here --}}
    </div>
@endsection
