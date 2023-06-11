<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center">
                    </div>

                    <div class="mt-16">
                        {{$post->body}}
                    </div>

                    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                            <div class="flex items-center gap-4">
                                @if($edited == false)
                                    {{$post->created_at}}
                                @elseif($edited == true)
                                    {{$post->updated_at}} (edited)
                                @endif
                            </div>
                        </div>

                        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                            @if($can_edit == false)
                            {{$user->name}}
                            @elseif($can_edit == true)
                                <x-button class="ml-4">
                                    {{ __('Edit Post') }}
                                </x-button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-app-layout>
