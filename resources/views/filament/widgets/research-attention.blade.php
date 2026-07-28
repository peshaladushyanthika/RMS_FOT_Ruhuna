<x-filament-widgets::widget>

    <x-filament::section>

        <x-slot name="heading">
            <div class="flex items-center gap-2">
                <x-filament::icon
                    icon="heroicon-o-bell-alert"
                    class="w-5 h-5"
                />

                <span>
                    Research Attention Required
                </span>
            </div>
        </x-slot>


        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">


    {{-- Missed Deadlines --}}
    <div class="rounded-2xl border border-danger-200 
        bg-gradient-to-br from-danger-50 to-white
        dark:from-danger-950 dark:to-gray-900
        p-6 shadow-sm hover:shadow-lg transition">

        <div class="flex items-center gap-4">

            <div class="flex items-center justify-center 
                w-14 h-14 rounded-2xl
                bg-danger-100 dark:bg-danger-900">

                <x-filament::icon
                    icon="heroicon-o-clock"
                    class="w-8 h-8 text-danger-600"
                />

            </div>


            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                    Missed Deadlines
                </p>

                <p class="text-5xl font-extrabold text-danger-600">
                    {{ $delayedGroups }}
                </p>
            </div>

        </div>


        <p class="mt-5 text-sm text-gray-500">
            Groups exceeded submission deadlines
        </p>

    </div>





    {{-- Pending Reviews --}}
    <div class="rounded-2xl border border-warning-200
        bg-gradient-to-br from-warning-50 to-white
        dark:from-warning-950 dark:to-gray-900
        p-6 shadow-sm hover:shadow-lg transition">


        <div class="flex items-center gap-4">

            <div class="flex items-center justify-center 
                w-14 h-14 rounded-2xl
                bg-warning-100 dark:bg-warning-900">

                <x-filament::icon
                    icon="heroicon-o-document-check"
                    class="w-8 h-8 text-warning-600"
                />

            </div>


            <div>

                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                    Pending Reviews
                </p>

                <div class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                    {{ $pendingReviews }}
</div>

            </div>


        </div>


        <p class="mt-5 text-sm text-gray-500">
            Submissions waiting for evaluation
        </p>


    </div>






    {{-- Missing Progress --}}
    <div class="rounded-2xl border border-info-200
        bg-gradient-to-br from-info-50 to-white
        dark:from-info-950 dark:to-gray-900
        p-6 shadow-sm hover:shadow-lg transition">


        <div class="flex items-center gap-4">

            <div class="flex items-center justify-center 
                w-14 h-14 rounded-2xl
                bg-info-100 dark:bg-info-900">

                <x-filament::icon
                    icon="heroicon-o-document-text"
                    class="w-8 h-8 text-info-600"
                />

            </div>


            <div>

                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                    Missing Progress 2
                </p>

                <p class="text-5xl font-extrabold text-info-600">
                    {{ $missingProgress2 }}
                </p>

            </div>


        </div>


        <p class="mt-5 text-sm text-gray-500">
            Groups have not submitted Progress 2
        </p>


    </div>







    {{-- Supervisor --}}
    <div class="rounded-2xl border border-primary-200
        bg-gradient-to-br from-primary-50 to-white
        dark:from-primary-950 dark:to-gray-900
        p-6 shadow-sm hover:shadow-lg transition">


        <div class="flex items-center gap-4">


            <div class="flex items-center justify-center 
                w-14 h-14 rounded-2xl
                bg-primary-100 dark:bg-primary-900">

                <x-filament::icon
                    icon="heroicon-o-user-group"
                    class="w-8 h-8 text-primary-600"
                />

            </div>



            <div>

                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                    Supervisor Pending
                </p>

                <p class="text-5xl font-extrabold text-primary-600">
                    {{ $pendingSupervisorReviews }}
                </p>

            </div>


        </div>



        <p class="mt-5 text-sm text-gray-500">
            Reviews awaiting supervisor action
        </p>


    </div>


</div>


    </x-filament::section>

</x-filament-widgets::widget>