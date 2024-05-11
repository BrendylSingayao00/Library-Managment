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
                <tr @if($borrow->status == 'approved')
                    class="approved"
                    @elseif($borrow->status == 'completed')
                    class="completed"
                    @elseif($borrow->date_return < now()->format('Y-m-d'))
                        class="due-date"
                        @endif
                        >
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book_title }}</td>
                        <td>{{ $borrow->author }}</td>
                        <td>{{ $borrow->date_borrow }}</td>
                        <td>{{ $borrow->date_return }}</td>
                        <td>
                            @if($borrow->status == 'completed')
                            {{ $borrow->status }}
                            @elseif($borrow->date_return < now()->format('Y-m-d'))
                                <span style="color: red;">Due Date</span>
                                @else
                                {{ $borrow->status }}
                                @endif
                        </td>
                        <td>
                            @if($borrow->status == 'pending')
                            <button type="button" class="btn btn-primary"
                                onclick="openEditModal('{{ $borrow->id }}', '{{ $borrow->date_borrow }}', '{{ $borrow->date_return }}')">Edit</button>

                            <form action="{{ route('borrow.destroy', $borrow) }}" method="post" id="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                            </form>
                            @endif
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
    .cancelled {
        background-color: #ffcccc;
        /* Light red */
    }

    .completed {
        background-color: #6da4fc;
        /* Light blue */
    }

    .approved {
        background-color: #adff85;

    }

    .due-date {
        background-color: #ffcccc;
        /* Light red */
    }
    </style>
    <script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete your Borrowing Book form?")) {
            document.getElementById('delete-form').submit();
        }
    }

    function openEditModal(id, dateBorrow, dateReturn) {
        $('#borrow_id').val(id);
        $('#date_borrow').val(dateBorrow);
        $('#date_return').val(dateReturn);
        $('#editModal').modal('show');
    }

    function updateBorrow() {
        var id = $('#borrow_id').val();
        var dateBorrow = $('#date_borrow').val();
        var dateReturn = $('#date_return').val();

        $.ajax({
            url: "{{ route('borrow.update', ['borrow' => ':id']) }}".replace(':id', id),
            type: 'PUT',
            data: {
                date_borrow: dateBorrow,
                date_return: dateReturn,
                _token: '{{ csrf_token() }}',
                _method: 'PUT'
            },
            success: function(response) {
                // Handle success
                $('#editModal').modal('hide');
                // Optionally, update the UI
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</x-user-layout>

<div id="editModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"
    style="z-index: 1050;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Borrow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date_borrow">Date of Borrow</label>
                        <input type="date" class="form-control" id="date_borrow" name="date_borrow" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="date_return">Return Date</label>
                        <input type="date" class="form-control" id="date_return" name="date_return" value="" required>
                    </div>
                    <input type="hidden" id="borrow_id" name="borrow_id" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateBorrow()">Save changes</button>
            </div>
        </div>
    </div>
</div>