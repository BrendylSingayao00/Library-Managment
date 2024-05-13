<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EduAcademia</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/noanimation.css" rel="stylesheet">
    <link href="css/user.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js
"></script>


</head>

<body>
    <nav>
        <x-header />
        <div class="menu-items">

        <ul class="nav-links">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="uil uil-estate"></i>
                <span class="link-name">Dashboard</span>
            </a>
        </li>
        @role('admin')
        <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="uil uil-files-landscapes"></i>
                <span class="link-name">Borrower</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('borrow.*') ? 'active' : '' }}">
            <a href="{{ route('borrow.borrowing') }}">
                <i class=" uil uil-files-landscapes"></i>
                <span class="link-name">Borrowing</span>
            </a>
        </li>
        @endrole
        <li class="{{ request()->routeIs('books.*') ? 'active' : '' }}">
            <a href="{{ route('books.index') }}">
                <i class=""></i>
                <span class="link-name">Books</span>
            </a>
        </li>
        @role('student')
        <li class="{{ request()->routeIs('borrow.library') ? 'active' : '' }}">
            <a href="{{ route('borrow.library') }}">
                <i class=""></i>
                <span class="link-name">My Library</span>
            </a>
        </li>
        @endrole
    </ul>

                <ul class="logout-mode">
                <li>
                    @role('admin')
                    <a href="{{ route('app.profile.edit') }}">
                        <i class="uil uil-signout"></i><span class="link-name">Profile</span>
                    </a>
                    @endrole
                </li>

            
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>

                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li>
                        <a href="#" onclick="confirmLogout(event)">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Logout</span>
                        </a>
                    </li>
                </form>

            </ul>
        </div>
    </nav>

    <main class="dashboard">
        {{ $slot }}
    </main>

</body>
<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
        } else {
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll(".menu-items .nav-links li.menu-item:not(.profile-item):not(.logout-item)");

    // Function to set active state based on current page URL
    const setActiveMenuItem = () => {
        const currentPath = window.location.pathname;
        menuItems.forEach(item => {
            const href = item.querySelector("a").getAttribute("href");
            console.log("Current Path:", currentPath);
            console.log("Href:", href);
            if (currentPath === href) {
                item.classList.add("active");
            } else {
                item.classList.remove("active");
            }
        });
    };

    // Set initial active menu item
    setActiveMenuItem();

    menuItems.forEach(item => {
        item.addEventListener("click", function(event) {
            // Remove active class from all menu items
            menuItems.forEach(item => {
                item.classList.remove("active");
            });

            // Add active class to the clicked menu item
            this.classList.add("active");
        });
    });
});



function confirmLogout(event) {
        event.preventDefault();
        if (confirm("Are you sure you want to logout?")) {
            document.getElementById('logoutForm').submit(); // Submit the form
        }
    }

</script>

</html>