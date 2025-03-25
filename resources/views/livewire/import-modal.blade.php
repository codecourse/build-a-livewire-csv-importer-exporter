@php use Illuminate\Support\Number; @endphp
<div class="p-8">
    <div>
        <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Import records</h3>

            @if($file)
                <div class="mt-2">
                    <p class="text-sm text-gray-500">You're about to import <strong>{{ Number::format($this->recordCount) }}</strong> {{ str()->plural('record', $this->recordCount) }}.</p>
                </div>
            @endif

            @unless($file)
                <div class="mt-2">
                    <label for="file" class="sr-only">CSV file</label>
                    <div
                        x-data="{
                            dropping: false
                        }"
                        class="mt-2 flex justify-center rounded-lg border border-dashed px-6 py-10"
                        x-bind:class="{ 'border-gray-900/50': dropping, 'border-gray-900/25': !dropping }"
                        x-on:dragover.prevent="dropping = true"
                        x-on:dragleave.prevent="dropping = false"
                        x-on:drop="dropping = false"
                        x-on:drop.prevent="
                            if ($event.dataTransfer.files.length !== 1) {
                                return
                            }

                            const files = $event.dataTransfer.files

                            @this.upload('file', files[0])
                        "
                    >
                        <div class="text-center">
                            <div class="flex text-sm/6 text-gray-600">
                                <label for="file" class="relative cursor-pointer rounded-md font-semibold text-indigo-600">
                                    <span>Upload a file</span>
                                    <input id="file" name="file" type="file" class="sr-only" accept=".csv" wire:model="file">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">CSV up to 10MB</p>
                        </div>
                    </div>
                </div>
            @endunless

        </div>
    </div>

    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse gap-2">
        @if($file)
            <x-primary-button wire:click="startImport">Start import</x-primary-button>
        @endif
        <x-secondary-button wire:click="dispatch('closeModal')">Cancel</x-secondary-button>
    </div>
</div>
