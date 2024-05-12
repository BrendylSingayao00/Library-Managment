<x-user-layout>
    <!-- <div class="container"> -->
    <div class="top">
    <strong class="borrowing-title">BORROWING</strong>
    </div>
         <div class="dash-content">
        <div class="overview">
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
    .borrowing-title {
    margin: 0;
    font-size: 24px;
    color: #333;
    margin-right: auto; /* Pushes the title to the left */
}

.top {
    display: flex;
    align-items: center;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
}

    thead {
    background-color: #f2f2f2; /* Light gray background color */
}

thead th {
    padding: 10px; /* Add padding to the header cells */
    text-align: left; /* Align text to the left */
    font-weight: bold; /* Make text bold */
    border-bottom: 1px solid #ddd; /* Add bottom border */
    color: black; 
}

thead th:first-child {
    border-top-left-radius: 5px; /* Add rounded corners to the top left header cell */
}

thead th:last-child {
    border-top-right-radius: 5px; /* Add rounded corners to the top right header cell */
}
   
    </style>
</x-user-layout>