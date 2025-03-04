@php use Illuminate\Support\Number; @endphp
<div class="p-8">
    <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <h3 class="text-base font-semibold text-gray-900">Export records</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">You're about to export <strong>{{ Number::format($this->recordCount) }} {{ str()->plural('record', $this->recordCount) }}</strong>. We'll send you an email when the export is available.</p>
            </div>
        </div>
    </div>
    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse gap-2">
        <x-primary-button wire:click="startExport">Start export</x-primary-button>
        <x-secondary-button wire:click="$dispatch('closeModal')">Cancel</x-secondary-button>
    </div>
</div>
