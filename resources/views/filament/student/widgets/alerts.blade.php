<x-filament-widgets::widget>

    <x-filament::section>

        <x-slot name="heading">
            🔔 Research Alerts
        </x-slot>


        <div class="space-y-6">

            @forelse($this->getAlerts() as $alert)

                <div class="flex items-start gap-4 p-4 rounded-xl border bg-gray-50 dark:bg-gray-800" style="padding-bottom:20px;">

                    <div class="text-3xl">
                        {{ $alert['icon'] }}
                    </div>


                    <div>

                        {{-- Notification Title --}}
                        <div class="text-lg font-bold text-gray-900 dark:text-white" style="font-weight:600">
                            {{ $alert['title'] }}
                        </div>


                        {{-- Notification Message --}}
                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            {{ $alert['message'] }}
                        </div>


                    </div>

                </div>

            @empty

                <div class="text-gray-500">
                    🎉 No pending alerts
                </div>

            @endforelse


        </div>

    </x-filament::section>

</x-filament-widgets::widget>