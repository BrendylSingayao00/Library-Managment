<x-user-layout>
    @if($books->count() >= 1 && auth()->user()->subscription()->exists())

    <div class="alert alert-warning" role="alert">

        You have reached the maximum limit of 10 books. Please <a href="{{ route('subscription.index') }}">subscribe</a>

        to add more.

    </div>

    @endif
    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('books.store') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <label for="title" id="title-author">Title</label>
            <label for="author" id="author-label">Author</label>
            <div id="row-1">
                <input type="text" id="title" class="form-control" placeholder="Title.." required name="title">
                <input type="text" id="author" class="form-control" placeholder="Author.." required name="author">
            </div>

            <label for="description">Description</label>
            <div id="row-2">
                <textarea id="description" class="form-control" placeholder="Description.." style="height:180px"
                    name="description" required></textarea>
                <ul>
                    <label for="book_id">Book Cover</label>
                    <input type="file" class="form-control" id="bookCover" name="book_cover" required>
                    <label for="book_id">Category</label>
                    <select id="category" class="form-control" name="category">
                        <option>Adventure</option>
                        <option>Business</option>
                        <option>Comedy</option>
                        <option>Fairytales</option>
                        <option>Fantasy</option>
                        <option>Horror</option>
                        <option>Action</option>
                        <option>Romance</option>
                        <option>Science</option>
                        <option>Sports</option>
                        <option>Technology</option>
                    </select>
                    <!-- Add book quantity -->
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                </ul>
            </div>

            <div id="row-3" class="d-flex justify-content-between">
                <input type="submit" value="ADD BOOK" class="btn btn-success flex-grow-1 me-1" id="add-btn"
                    name="submit">
                <a href="{{ route('books.index') }}" class="btn btn-secondary flex-grow-1 ms-1">CANCEL</a>
            </div>
        </form>

    </div>


    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">
</x-user-layout>