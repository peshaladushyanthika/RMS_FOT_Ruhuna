<x-filament::section>

    <x-slot name="heading">
        Research Group Overview
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div>
            <p class="text-sm text-gray-500">
                Group Name : {{ $group->group_name }}
            </p>

            <!-- <p class="text-xl font-bold">
                {{ $group->group_name }}
            </p> -->
        </div>


        <div>
            <p class="text-sm text-gray-500">
                Supervisor Name : {{ $supervisor?->user?->name ?? 'Not Assigned' }}
            </p>

            <!-- <p class="text-xl font-bold">
                {{ $supervisor?->user?->name ?? 'Not Assigned' }}
            </p> -->
        </div>


        <div>
            <p class="text-sm text-gray-500">
                Group Members : 
                <div class="divide-y">

        @foreach($students as $member)

            <div class="flex items-center justify-between py-3">

                <div>
                    <p class="font-medium">
                        {{ $member->user?->name }}
                    </p>

                    <!-- <p class="text-sm text-gray-500">
                        {{ $member->stu_number }}
                    </p> -->
                </div>


                @if(auth()->user()->student?->id == $member->id)

                    <span class="px-3 py-1 rounded-full text-xs bg-primary-100 text-primary-700">
                        You
                    </span>

                @endif

            </div>

        @endforeach

    </div>
            </p>

            <!-- <p class="text-xl font-bold">
                {{ $students->count() }}
            </p> -->
        </div>

    </div>


</x-filament::section>


