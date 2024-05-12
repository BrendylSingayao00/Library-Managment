<x-user-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EduAcademia | Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/map.css" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">


    </head>

    <body>
        <section>
            <div class="header-box">
                <div class="top">
                <strong class="dashboard-title">DASHBOARD</strong>
                    <i class="uil uil-bars sidebar-toggle"></i>
                    <div class="search-box">
                        <i class="uil uil-search"></i>
                        <input type="text" placeholder="Search here...">
                    </div>
                </div>

            </div>

            </div>


            <div class="dash-content">
                <div class="overview">
                    <!-- <div class="title">
                        <strong class="text">DASHBOARD</strong>
                    </div> -->

                    <div class="boxes">
                        <div class="box box1">
                            <strong span class="text">TOTAL BOOKS</strong>
                            <span class="number">{{ $totalBooks }}</span>
                        </div>
                        <div class="box box2">
                            <span class="text">AVAILABLE BOOKS</span>
                            <span class="number">{{ $availableBooks }}</span>
                        </div>
                        <div class="box box3">
                            <span class="text">NEW BOOKS</span>
                            <span class="number">{{ $newBooks }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity">
                    <div class="title">
                        <span class="text">RECENTLY ADDED</span>
                    </div>
                    <div class="activity-data">
                        <table>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Available No.</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>
                                        @if($book->quantity == 0)
                                        Not Available
                                        @else
                                        <b>{{ $book->quantity }}</b>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </section>

    </body>

    </html>


</x-user-layout>