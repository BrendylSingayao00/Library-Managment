<x-user-layout>
    <form action="{{ route('subscribe.update') }}" method="post">
        @csrf
        <label for="book_limit">Choose Subscription:</label>
        <select name="book_limit" id="book_limit">
            <option value="10">Basic (10 books)</option>
            <option value="20">Standard (20 books)</option>
            <option value="30">Premium (30 books)</option>
            <option value="100">Ultimate (100 books)</option>
        </select>
        <button type="submit">Update Subscription</button>
    </form>
</x-user-layout>