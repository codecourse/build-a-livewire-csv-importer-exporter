<div class="p-8">
    <div>
        <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Import records</h3>

            <!-- <div class="mt-2">
                <p class="text-sm text-gray-500">You're about to import <strong>x</strong> records.</p>
            </div> -->

            <div class="mt-2">
                <label for="file" class="sr-only">CSV file</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <div class="flex text-sm/6 text-gray-600">
                            <label for="file" class="relative cursor-pointer rounded-md font-semibold text-indigo-600">
                                <span>Upload a file</span>
                                <input id="file" name="file" type="file" class="sr-only" accept=".csv">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs/5 text-gray-600">CSV up to 10MB</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse gap-2">
        <x-primary-button>Start import</x-primary-button>
        <x-secondary-button>Cancel</x-secondary-button>
    </div>
</div>
