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
                        <div class="mt-16">
                    <form method="post" action="{{ route('post.update', $post) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('name', $post->title)"/>
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-input id="body" name="body" type="text" class="mt-1 block w-full" :value="old('name', $post->body)"/>
                        </div>

                    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </div>
                    </div>

                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
