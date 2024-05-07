<x-user-layout>
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>
    </div>
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Book</span>
            </div>
            @role('admin')
            <div>
                <x-btn-link class="ml-4 float-right" href="{{ route('books.create') }}">
                    Add Book</x-btn-link>
            </div>
            @endrole
            <div>

            </div>
        </div>
    </div>

</x-user-layout>