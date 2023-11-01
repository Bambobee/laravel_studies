<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add or Update user Profile picture.") }}
        </p>
    </header>

    @if(session('message'))
         <div class="text-red-500">
            {{ session('message')}}
         </div>
    @endif
    <form method="post" action="{{ route('profile.Image') }}">
        <!-- the following a Laravel helpers -->
        @method('patch')
        @csrf
        <!-- instead of the above u can use this method also -->
        <!-- <input type="hidden" name="_method" value="patch"> -->
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        
        <div>
            <x-input-label for="Image" :value="__('Image')" />
            <x-text-input id="Image" name="Image" type="file" class="mt-1 block w-full"
             :value="old('Image', $user->Image)" required autofocus autocomplete="Image" />
            <x-input-error class="mt-2" :messages="$errors->get('Image')" />
        </div>

       

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
