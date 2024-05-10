<x-user-layout>
    <div>
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
                </ul>
            </div>

            <div id="row-3" class="d-flex justify-content-between">
                <input type="submit" value="ADD BOOK" class="btn btn-success flex-grow-1 me-1" id="add-btn"
                    name="submit">
                <button type="button" class="btn btn-secondary flex-grow-1 ms-1" data-bs-dismiss="modal">CANCEL</button>
            </div>
        </form>
    </div>


    <link href="{{ url('css/sidebar.css') }}" rel="stylesheet">
</x-user-layout>