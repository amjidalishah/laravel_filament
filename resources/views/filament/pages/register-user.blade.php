<x-filament::page>
    <form wire:submit.prevent="register" class="space-y-4">
        {{ $this->form }}
        <button type="submit" class="filament-button filament-button-primary w-full">
            Register
        </button>
    </form>
    <div class="text-center mt-4">
        <a href="{{ route('filament.auth.login') }}" class="text-primary-600">
            Already have an account? Login
        </a>
    </div>
</x-filament::page>