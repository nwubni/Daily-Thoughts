<x-app-layout>
    <x-slot name="header" class="mb-12">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reactions to') }}
        </h2>
    </x-slot>

    <div class="mb-8 bg-white shadow-lg">
        <div class="mx-auto flex items-center justify-center">
            <div class="w-1/2">
                <div class="px-6 pb-4">
                    <h4 class="mb-1 text-xl font-semibold tracking-tight text-gray-800">{{ $thought->user->name }}</h4>
                    <h5 class="mb-2 text-sm font-semibold tracking-tight text-pink-800">{{ $thought->created_at->diffForHumans() }}</h5>
                    <p class="leading-normal text-gray-700">{{ $thought->message }}</p>
                </div>

                <div class="px-6 pb-4">
                    <form method="POST" action="{{ route('react', $thought->id) }}">
                        @csrf
                        <!-- Reaction -->
                        <div>
                            <input id="reaction" class="block mt-1 w-full" type="text" name="reaction" autocomplete="off" placeholder="What is your reaction?" value="{{ old('reaction') }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3 rounded-full">
                                {{ __('React') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="py-6">
        @if(count($reactions))
        @foreach($reactions as $reaction)
        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 rounded-lg shadow-lg bg-white">
                <div class="px-6 py-4">
                    <h4 class="mb-1 text-l font-semibold tracking-tight text-gray-800">{{ $reaction->user->name }}</h4>
                    <h5 class="mb-2 text-sm font-semibold tracking-tight text-pink-800">{{ $reaction->created_at->diffForHumans() }}</h5>
                    <p class="leading-normal text-gray-700">{{ $reaction->reaction }}</p>
                </div>
            </div>

        </div>
        @endforeach

        <div class="w-1/2 mb-8 mx-auto flex items-center justify-center">
            {{ $reactions->links() }}
        </div>
        @else
        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 rounded-lg shadow-lg bg-white">
                <div class="px-6 py-4">
                    <h4 class="my-3 text-xl font-semibold tracking-tight text-gray-800">There are no reactions to this thought.</h4>
                </div>
            </div>

        </div>
        @endif
    </div>

</x-app-layout>