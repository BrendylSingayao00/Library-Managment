<x-user-layout>

    <div class="container">
        <h1>Borrow Book</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('borrow.store') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" readonly>
            </div>
            <div class="form-group">
                <label for="author">Book Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" readonly>
            </div>
            <div class="form-group">
                <label for="book_cover">Book Cover</label>
                <img src="{{ url('uploads/' . $book->book_cover) }}" alt="Book Cover" class="book-cover-item">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    readonly>{{ $book->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>
            <div class="form-group">
                <label for="date_borrow">Date of Borrow</label>
                <input type="date" class="form-control" id="date_borrow" name="date_borrow" required>
            </div>
            <div class="form-group">
                <label for="date_return">Return Date</label>
                <input type="date" class="form-control" id="date_return" name="date_return" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">

</x-user-layout>