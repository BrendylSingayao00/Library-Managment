<x-user-layout>
    <div class="booklist-container container-sm" id="booklist-panel" data-booklist
        style="overflow-y: scroll; max-height: 400px;">
        <table class="book-table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Book Cover</th>
                <th>Name</th>
                <th>Email</th>
                <th>Student ID</th>
                <th>Date Borrow</th>
                <th>Date Return</th>
            </tr>
            @foreach($borrows as $borrow)
            <tr>
                <td>{{ $borrow->id }}</td>
                <td>{{ $borrow->book_title }}</td>
                <td>{{ $borrow->author }}</td>
                <td>{{ $borrow->description }}</td>
                <td><img src="{{ url('uploads/' . $borrow->book_cover) }}" alt="Book Cover" class="book-cover-item">
                </td>
                <td>{{ $borrow->name }}</td>
                <td>{{ $borrow->email }}</td>
                <td>{{ $borrow->student_id }}</td>
                <td>{{ $borrow->date_borrow }}</td>
                <td>{{ $borrow->date_return }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- Stylesheets -->
    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">
</x-user-layout>