<x-mail::message>


    @component('mail::message')
    # Welcome to Your App!

    We're excited to have you as a new tenant. Here's your account information:
    - Domain name: @foreach($tenant->domains as $domain)
    {{ $domain->domain }}{{ $loop->last ? '' : ',' }}
    @endforeach
    - **Name:** {{ $tenant->name }}
    - **Email:** {{ $tenant->email }}
    - **Password:** {{ $password }}

    You can use this password to login to your account.

    Thanks
    {{ config('app.name') }}
    @endcomponent
</x-mail::message>