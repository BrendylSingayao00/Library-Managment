<x-user-layout>
    <div class="container">
        <h1>Borrow Library</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Date of Borrow</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->book_title }}</td>
                    <td>{{ $borrow->author }}</td>
                    <td>{{ $borrow->date_borrow }}</td>
                    <td>{{ $borrow->date_return }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-user-layout>