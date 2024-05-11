<x-app-layout>
    <section class="dashboard">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight">
            {{ __('Edit Department') }}
        </h2>

        <div class="py-12">
            <form action="{{ route('tenants.update', $tenant->id) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Add your form fields for editing here -->
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $tenant->name }}">

                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $tenant->email }}">

                <!-- Add other fields as needed -->

                <button type="submit">Update Department</button>
            </form>
        </div>
    </section>
    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">
</x-app-layout>