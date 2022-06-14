<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Explore Thoughts') }}
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 p-8 rounded-lg shadow-lg bg-white">
                <form method="POST" action="{{ route('create.thought') }}">
                    @csrf

                    <!-- Thought -->
                    <div>
                        <label for="message">{{__('Thought')}}</label>
                        <textarea id="message" class="block mt-1 w-full" name="message" placeholder="What are you thinking?" maxlength="200" required autofocus>{{ old('thought') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3 rounded-full">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

        @if(count($thoughts))
        @foreach($thoughts as $thought)
        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 rounded-lg shadow-lg bg-white">
                <!-- <img class="w-full h-48" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80" alt="product" /> -->
                <div class="px-6 py-8">
                    <h4 class="mb-1 text-xl font-semibold tracking-tight text-gray-800">{{ $thought->user->name }}</h4>
                    <h5 class="mb-2 text-sm font-semibold tracking-tight text-pink-800">{{ $thought->created_at->diffForHumans() }}</h5>
                    <p class="leading-normal mb-4 text-gray-700">{{ $thought->message }}</p>
                    <a href="{{ url('/reactions/'. $thought->id) }}" class="w-auto bg-indigo-800 hover:bg-indigo-600 rounded-full text-white text-sm px-2 py-1">
                        Reactions <span class="rounded-full bg-white text-sm text-gray-800 mx-1 px-1 py-0">{{ $thought->reactions_count }}</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="w-1/2 mb-8 mx-auto flex items-center justify-center">
            {{ $thoughts->links() }}
        </div>
        @else
        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 rounded-lg shadow-lg bg-white">
                <div class="px-6 py-4">
                    <h4 class="my-3 text-xl font-semibold tracking-tight text-gray-800">There are no thoughts here.</h4>
                </div>
            </div>

        </div>
        @endif
</x-app-layout>