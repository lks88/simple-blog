<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center">
                    </div>

                        <form method="POST" action="{{ route('post.store') }}">
                            @csrf
                            @method('post')

                            <div class="justify-center sm:items-center">
                                <x-label for="title" value="{{ __('Title') }}" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required/>
                            </div>

                            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                            </div>

                            <div class="justify-center sm:items-center">
                                <x-label for="body" value="{{ __('Body') }}" />
                                <x-text-input id="body" class="block mt-1 w-full" type="text" name="body" required/>
                            </div>

                            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                            </div>

                            <div class="mt-16 justify-center sm:items-center">
                            <x-button class="ml-4">
                                {{ __('Create Blog') }}
                            </x-button>
                            </div>
                        </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
