<x-user-layout>
    <div class="container">
        <h1>Edit Book</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author"
                    value="{{ old('author', $book->author) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required>{{ old('description', $book->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity"
                    value="{{ old('quantity', $book->quantity) }}" required>
            </div>
            <div class="form-group">
                <label for="book_cover">Book Cover</label>
                <input type="file" class="form-control" id="book_cover" name="book_cover">
                <img src="{{ url('uploads/' . $book->book_cover) }}" alt="Book Cover" class="book-cover-item"
                    style="max-width: 200px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">

</x-user-layout>