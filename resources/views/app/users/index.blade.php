<x-user-layout>
    @role('admin')
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
                <span class="text">Borrower</span>
            </div>
            <div>
                <x-btn-link class="ml-4 float-right" href="{{ route('users.create')}}">
                    New Borrower</x-btn-link>
            </div>

            <div class="activity">
                <div class="activity-data">
                    <div class="data">
                        <table class="user_table">
                            <thead>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        Name
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-500">
                                            Email
                                        </span>
                                    </td>

                                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-500">
                                            Role

                                        </span>
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-900">
                                            Action
                                        </span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @if (!$loop->first)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$user->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Add your product color here -->
                                        <span class="text-gray-500">
                                            {{$user->email}}
                                        </span>
                                    </td>

                                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-500">
                                            @foreach($user->roles as $role)
                                            {{ $role->name }}{{ $loop->last ? '':',' }}
                                            @endforeach

                                        </span>
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Add your product price here -->
                                        <span class="text-gray-900">
                                            <x-btn-link href="{{ route('users.edit',$user->id)}}">Edit
                                            </x-btn-link>
                                        </span>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{$user->name}}?')" class="btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-user-layout>