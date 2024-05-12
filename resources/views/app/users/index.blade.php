<x-user-layout>
    @role('admin')
    <div class="top">
        <!-- <i class="uil uil-bars sidebar-toggle"></i> -->
        <!-- <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div> -->
        <strong class="borrower-title">BORROWER</strong>

    </div>
    <div class="dash-content">
        <div class="overview">
            <!-- <div class="title">
                <span class="text">Borrower</span>
            </div> -->
            <div class="new-borrower">
                <x-btn-link class="ml-4 float-right" href="{{ route('users.create')}}">
                    New Borrower</x-btn-link>
            </div>

            <div class="activity">
    <div class="activity-data">
        <div class="data">
        <table class="user_table" style="table-layout: fixed; ">
        <thead> <!-- Adjust the value of padding-bottom as needed -->
        <tr>
            <th class="px-6 py-1" style="text-align: center;">Name</th>
            <th class="px-6 py-1" style="text-align: center;">Email</th>
            <th class="px-6 py-1" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        @if (!$loop->first)
        <tr>
            <td class="px-6 py-1 whitespace-nowrap" style="text-align: center;">{{$user->name}}</td>
            <td class="px-6 py-1 whitespace-nowrap" style="text-align: center;">{{$user->email}}</td>
            <td class="px-6 py-1 whitespace-nowrap">
                <span class="text-gray-900">
                    <button onclick="window.location.href='{{ route('users.edit',$user->id)}}'" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px; display: inline-block; margin-left: 100px;">Edit</button>
                </span>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" style="display: inline-block; margin-left: 10px;">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete {{$user->name}}?')" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px; margin-left: 0px;">Delete</button>
            </form>
        </td>
    </tr>
</table>

                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



    @endrole
</x-user-layout>