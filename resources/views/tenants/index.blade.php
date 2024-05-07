<x-app-layout>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

        </div>
        <div class="dash-content">

            <button type="button" class="btn btn-primary ml-4 mt-5 float-right " data-toggle="modal" data-target="#exampleModal">
                Add New Tenant
            </button>

            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Tenant</span>
                </div>
            </div>
        </div>


        <div class="activity">
            <div class="title">

            </div>
            <div class="activity-data">
                <table class="data">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 data-title">Name</th>
                            <th scope="col" class="px-6 py-3 data-title">Email</th>
                            <th scope="col" class="px-6 py-3 data-title">Domain</th>
                            <th scope="col" class="px-6 py-3 data-title">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tenants as $tenant)
                        <tr>
                            <td scope="col" class="px-6 py-3 data-list">{{$tenant->name}}</td>
                            <td scope="col" class="px-6 py-3 data-list">{{$tenant->email}}</td>
                            <td scope="col" class="px-6 py-3 data-list">
                                @foreach($tenant->domains as $domain)
                                {{ $domain->domain }}{{ $loop->last ? '' : ',' }}
                                @endforeach
                            </td>
                            <td method="post" scope="col" class="px-6 py-3 data-list" style="display: inline;">
                                <form action="{{ route('tenants.destroy', $tenant->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                </form>

                                <form action="{{ route('tenants.edit', $tenant->id) }}" method="get">
                                    @csrf
                                    <button type="submit">Edit</button>
                                </form>
                                <button>view</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <form method="POST" action="{{ route('tenants.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="domain_name" :value="__('Domain Name')" />
                <x-text-input id="domain_name" class="block mt-1 w-full" type="text" name="domain_name" :value="old('domain_name')" required autofocus autocomplete="domain_name" />
                <x-input-error :messages="$errors->get('domain_name')" class="mt-2" />
            </div>




            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input id="password" class="form-control" type="text" name="password" readonly required autocomplete="new-password" />
                    <button type="button" class="btn btn-secondary" id="generatePassword">Generate</button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



            <div class="col-md-6" id="confirmPasswordWrapper">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input id="password_confirmation" class="form-control" type="text" name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" class="btn btn-primary" id="confirmPassword">Confirm</button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type="submit" class="ms-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
        </form>
    </section>




    <script>
        // Function to generate random password
        function generatePassword() {
            const length = 10; // Length of the generated password
            const charset =
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+<>?"; // Characters to include in the password
            let password = "";
            for (let i = 0; i < length; ++i) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            return password;
        }

        // Event listener for the generate password button
        document.getElementById("generatePassword").addEventListener("click", function() {
            const passwordField = document.getElementById("password");
            const confirmPasswordField = document.getElementById("password_confirmation");
            const generatedPassword = generatePassword();
            passwordField.value = generatedPassword;
            confirmPasswordField.value = generatedPassword;
            passwordField.removeAttribute("readonly"); // Make password field editable
            passwordField.focus(); // Set focus to the password field
        });

        // Event listener for confirming the password
        document.getElementById("confirmPassword").addEventListener("click", function() {
            const passwordField = document.getElementById("password");
            passwordField.setAttribute("readonly", true); // Make password field readonly again
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</x-app-layout>