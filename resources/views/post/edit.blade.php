<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center">
                    </div>

                    <form method="post" action="{{ route('post.update', $post) }}" >
                        @csrf
                        @method('patch')

                        <div class="justify-center sm:items-center">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-large-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('name', $post->title)"/>
                        </div>

                        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                        </div>

                        <div class="justify-center sm:items-center">
                            <x-input-label for="body" :value="__('Body')" />
                            <x-large-input id="body" name="body" type="text" class="mt-1 block w-full" :value="old('name', $post->body)"/>
                        </div>

                        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                        </div>

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Edit') }}</x-primary-button>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
