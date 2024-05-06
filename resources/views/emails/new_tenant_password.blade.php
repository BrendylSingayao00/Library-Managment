<x-mail::message>


    @component('mail::message')
    # Welcome to Your App!

    We're excited to have you as a new tenant. Here's your account information:

    - **Name:** {{ $tenant->name }}
    - **Email:** {{ $tenant->email }}
    - **Password:** {{ $password }}

    You can use this password to login to your account.

    Thanks,<br>
    {{ config('app.name') }}
    @endcomponent

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,
    {{ config('app.name') }}
</x-mail::message>