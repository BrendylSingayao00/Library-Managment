<x-user-layout>
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
                                    <div>
                                        <div class="small-ratings">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                        </div>
                                        <button type="button" class="btn btn-success"
                                            id="detailsButton">Details</button>
                                    </div>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Detail Modal -->
    <div id="bookDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="bookDetailsContent">
                <h4>{{ $book->title }}</h4>
                <p>{{ $book->description }}</p>
            </div>
        </div>
    </div>
    <link href="{{ url('css/books.css') }}" rel="stylesheet">
    <script>
    // Get the modal
    var modal = document.getElementById("bookDetailsModal");

    // Get the button that opens the modal
    var btn = document.getElementById("detailsButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</x-user-layout>