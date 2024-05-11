<x-mail::message>
    WELCOME TO OUR LIBRARY

    Account Information
    Name: {{$user->name}}
    Email: {{$user->email}}
    Password: {{ $password }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>