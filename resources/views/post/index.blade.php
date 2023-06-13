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

                    <div class="font-semibold">
                        {{$post->title}}
                    </div>

                    <div class="mt-10 text-gray-500">
                        {{$post->body}}
                    </div>

                    <div class="flex justify-center mt-10 px-0 sm:items-center sm:justify-between">

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                            <div class="flex items-center gap-4">
                                @if($edited == false)
                                    {{$post->created_at}}
                                @elseif($edited == true)
                                    {{$post->updated_at}} (edited)
                                @endif
                            </div>
                        </div>
                        @if(!$can_edit)

                            <div
                                class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                {{$user->name}}
                            </div>

                        @elseif($can_edit)

                            <div
                                class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                <a href="{{ route('post.edit', $post) }}" class="ml-4">
                                    {{ __('Edit Post') }}
                                </a>
                            </div>

                            <form method="POST" action="{{ route('post.delete', $post) }}">
                                @csrf
                                @method('delete')
                                <div
                                    class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                    <x-button class="ml-4">
                                        {{ __('Delete Post') }}
                                    </x-button>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        @foreach($comments as $comment)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="flex justify-center">
                            </div>

                            <div class="mt-10">
                                {{$comment->body}}
                            </div>

                            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left sm:ml-0">
                                {{$comment->created_at}}
                            </div>

                        @if($comment->user->id != \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                {{$comment->user->name}}
                            </div>
                        @elseif($comment->user->id == \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())


                            <form method="POST" action="{{ route('comment.delete', $comment, $post) }}">
                                @csrf
                                @method('delete')
                                <div
                                    class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                    <x-button class="ml-4">
                                        {{ __('Delete Comment') }}
                                    </x-button>
                                </div>
                            </form>
                        @endif


                    </div>
                </div>
            </div>
                    @endforeach

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        @include('post.partials.create-comment-form', $post)
                    </div>
            </div>
        </div>
            </div>
    </div>
</x-app-layout>
