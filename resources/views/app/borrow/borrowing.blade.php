<x-user-layout>
    <div class="container">
        <h1>Borrowing</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Student ID</th>
                    <th>Date of Borrow</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                <tr @if($borrow->date_return < now()->format('Y-m-d') && $borrow->status != 'completed') class="overdue"
                        @endif>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book_title }}</td>
                        <td>{{ $borrow->author }}</td>
                        <td>{{ $borrow->name }}</td>
                        <td>{{ $borrow->email }}</td>
                        <td>{{ $borrow->student_id }}</td>
                        <td>{{ $borrow->date_borrow }}</td>
                        <td>{{ $borrow->date_return }}</td>
                        <td>
                            @if($borrow->status == 'pending')
                            <form action="{{ route('borrow.approve', $borrow) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            @elseif($borrow->status == 'approved')
                            <form action="{{ route('borrow.complete', $borrow) }}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="completed"> <!-- Add this hidden input -->
                                <button type="submit" class="btn btn-primary">Return</button>
                            </form>
                            @endif
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
    .overdue {
        background-color: #ffcccc;
        /* Light red */
    }
    </style>
</x-user-layout>