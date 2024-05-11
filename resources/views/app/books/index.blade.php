<x-user-layout>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="dash-content">
        <div class="search-bar">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </div>
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Book</span>
            </div>
            @role('admin')
            <div>
                <x-btn-link class="ml-4 float-right flex" href="{{ route('books.create') }}">
                    Add Book</x-btn-link>
            </div>
            @endrole
            <div>

                <div class="booklist-container container-sm" id="booklist-panel" data-booklist
                    style="overflow-y: scroll; max-height: 400px;">
                    <table class="book-table">
                        <tr>
                            @foreach($books as $book)
                            <td class="book-details book-details-wide booklist-panel">
                                <div><img src="{{ url('uploads/' . $book->book_cover) }}" alt="book Cover"
                                        class="book-cover-item">
                                    <br>
                                    <p>{{ $book->category }}</p>
                                    <strong>{{ $book->title }}</strong><br>
                                    <b>{{ $book->author }}</b><br>
                                    Book Copy:
                                    @if($book->quantity == 0)
                                    <b>The book is not available right now</b>
                                    @else
                                    <b>{{ $book->quantity }}</b>
                                    @endif
                                    <!-- <button type="button" class="btn btn-success"
                                            id="detailsButton">Details</button> -->
                                    <button type="button" class="btn btn-success detailsButton"
                                        data-title="{{ $book->title }}"
                                        data-description="{{ $book->description }}">Details</button>


                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @foreach($books as $book)
    <!-- Detail Modal -->
    <div id="bookDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="bookDetailsContent">

                <h4>{{ $book->title }}</h4>
                <p>{{ $book->description }}</p>
            </div>

            @role('admin')
            <div style="display: inline;">
                <form action="{{ route('books.edit', $book->id) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                <form action="{{ route('books.destroy', $book->id) }}" method="post" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                </form>
            </div>
            @endrole
            @role('student')
            <form action="{{ route('books.borrow', $book->id) }}" method="get">
                @csrf
                <button type="submit" class="btn btn-primary">Borrow</button>
            </form>
            @endrole
        </div>
    </div>
    </div>
    @endforeach



    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <script>
    var modal = document.getElementById("bookDetailsModal");
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

    var detailsButtons = document.querySelectorAll(".detailsButton");
    detailsButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var title = this.getAttribute("data-title");
            var description = this.getAttribute("data-description");
            document.getElementById("bookDetailsContent").innerHTML = '<h4>' + title + '</h4><p>' +
                description + '</p>';
            modal.style.display = "block";
        });
    });
    </script>
</x-user-layout>