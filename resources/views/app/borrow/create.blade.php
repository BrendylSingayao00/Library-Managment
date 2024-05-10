<x-user-layout>

    <div class="container">
        <h1>Borrow Book</h1>
        <form action="{{ route('borrow.store') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
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
                <select class="form-control" id="date_return" name="date_return" required>
                    <option value="5">5 days after borrow</option>
                    <option value="10">10 days after borrow</option>
                    <option value="15">15 days after borrow</option>
                    <option value="30">1 month after borrow</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-user-layout>