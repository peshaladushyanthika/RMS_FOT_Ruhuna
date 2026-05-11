<x-filament::page>

    <div class="space-y-6">

        <x-filament::section>
            <x-slot name="heading">
                {{ $schedule->title }}
            </x-slot>

            <div class="space-y-4">

                <div>
                    <strong>Type:</strong>
                    {{ $schedule->type }}
                </div>

                <div>
                    <strong>Start Date:</strong>
                    {{ $schedule->start_date }}
                </div>

                <div>
                    <strong>Due Date:</strong>
                    {{ $schedule->due_date }}
                </div>

                <div>
                    <strong>Instructions:</strong>
                    
                        {!! nl2br(e($schedule->description ?: 'No instructions available.')) !!}
                    
                </div>

                @if($schedule->template_file)
                    <!-- <div>
                        <a href="{{ Storage::url($schedule->template_file) }}"
                           target="_blank"
                           class="text-primary-600 font-semibold">
                            Download Template
                        </a>
                    </div> -->
                    <div
                        class=" space-y-6 rounded-2xl border border-primary-200 dark:border-primary-800 bg-primary-50 dark:bg-primary-900/10 p-5">

                        <div class="flex items-center justify-between gap-4">

                            <div>
                                <strong class="font-semibold text-lg">
                                    Submission Template
</strong>

                                <p class="text-sm text-gray-500 mt-1">
                                    Download the official template before preparing your document.
                                </p>
                            </div>

                            <a href="{{ Storage::url($schedule->template_file) }}"
                               target="_blank">

                                <x-filament::button
                                    icon="heroicon-m-arrow-down-tray">
                                    Download Template
                                </x-filament::button>

                            </a>

                        </div>

                    </div>
                @endif

            </div>
        </x-filament::section>
        <div class="space-y-6" style="margin-top:20px;">

        <x-filament::section>
            <x-slot name="heading">
                Upload Submission
            </x-slot>

            <form wire:submit="submit" class="space-y-6">
                {{ $this->form }}

                <div class="mt-6" style="margin-top: 20px;">
                    <x-filament::button type="submit">
                        Submit File
                    </x-filament::button>
                </div>
            </form>
        </x-filament::section>
</div>

    </div>

</x-filament::page>