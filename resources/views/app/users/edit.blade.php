<x-user-layout>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('put')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--                 
                    <div class="mt-4">
                         <x-input-label for="roles" :value="__('Roles')" /> 
                         <select multiple class="" name="roles[]">
                         @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if(in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif>{{ $role->name }}</option>
                         @endforeach

                         </select>
                    </div> -->

        <div class="flex items-center justify-end mt-2">
            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/noanimation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</x-user-layout>