<x-user-layout>
    <div class="mt-5 ml-5 mr-5">
        <form action="{{ route('subscribe.update') }}" method="post">
            @csrf
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h3>THANK YOU FOR USING OUR APPLICATION YOUR FREE TRIAL ENDED IF YOU WANTED TO ADD MORE BOOK PLEASE CHOOSE
                SUBSCRIPTION </h3>
            <label for="book_limit">Choose Subscription:</label>
            <select name="book_limit" id="book_limit">
                <option value="10">Basic (10 books) $5</option>
                <option value="20">Standard (20 books) $10</option>
                <option value="30">Premium (30 books) $15</option>
                <option value="100">Ultimate (100 books) $20</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Subscription</button>
        </form>
    </div>
</x-user-layout>