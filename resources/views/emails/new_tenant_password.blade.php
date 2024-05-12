<x-mail::message>


    @component('mail::message')
    # Welcome to Your Library Management!

    We are thrilled to welcome you as a new tenant to our website! Your presence adds to the vibrancy of our community, and we're excited to have you join us.
    As promised, here are your account credentials to access your workspace:

    - Name: {{ $tenant->name }}
    - Email: {{ $tenant->email }}
    - Password: {{ $password }}

    With these credentials, you can now log in to your workspace and explore all the features and resources available to you. Should you have any questions or need assistance at any point, feel free to reach out to our support team. We're here to help you every step of the way.
    Once again, welcome aboard! We look forward to seeing you thrive in our community.

    Warm regards,
    {{ config('app.name') }}
    @endcomponent
</x-mail::message>