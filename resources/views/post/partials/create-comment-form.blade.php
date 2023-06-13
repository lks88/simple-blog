<section>

<form method="post" action="{{ route('comment.store', $post) }}" class="mt-6 space-y-6">
    @csrf
    @method('post')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <x-input-label for="body" :value="__('Add Comment')" />
        <x-text-input id="body" name="body" type="text" class="mt-1 block w-full" required autofocus autocomplete="body" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Add') }}</x-primary-button>

            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >{{ __('Saved.') }}</p>

    </div>
</form>

</section>
