<x-user-layout>
    <div class="booklist-container container-sm" id="booklist-panel" data-booklist
        style="overflow-y: scroll; max-height: 400px;">
        <form action="{{ route('borrow.update', $borrow) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date_borrow">Date of Borrow</label>
                <input type="date" class="form-control" id="date_borrow" name="date_borrow"
                    value="{{ $borrow->date_borrow }}" required>
            </div>
            <div class="form-group">
                <label for="date_return">Return Date</label>
                <input type="date" class="form-control" id="date_return" name="date_return"
                    value="{{ $borrow->date_return }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

</x-user-layout>