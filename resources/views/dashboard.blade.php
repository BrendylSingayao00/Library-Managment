<x-app-layout>

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
<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

<!-- Custom styles for this template-->
<link href="css/map.css" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>
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
    })
    </script>

    <body>
        <section class="dashboard">
            <div class="top">
            <strong class="dashboard-title">Dashboard</strong>
                <i class="uil uil-bars sidebar-toggle"></i>
                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here...">
                </div>

            </div>
            <div class="dash-content">
                <div class="overview">
                    <!-- <div class="title">
                        <span class="text"><strong>DASHBOARD</strong></span>
                    </div> -->
                    <div class="boxes">
    <div class="box box1" style="background-color: #40A2D8;">
        <i class="uil uil-thumbs-up" style="color: #40A2D8;"></i>
        <span class="text" style="color: #333;">Total Likes</span>
        <span class="number" style="color: #333; font-weight: bold;">50,120</span>
    </div>
    <div class="box box2" style="background-color: #3468C0;">
        <i class="uil uil-comments" style="color: #66ff66;"></i>
        <span class="text" style="color: #333;">Comments</span>
        <span class="number" style="color: #333; font-weight: bold;">20,120</span>
    </div>
    <div class="box box3" style="background-color: #FF9843;">
        <i class="uil uil-share" style="color: #6666ff;"></i>
        <span class="text" style="color: #333;">Total Share</span>
        <span class="number" style="color: #333; font-weight: bold;">10,120</span>
    </div>
</div>

                    </div>
                </div>
                <!-- <div class="activity">
                    <div class="title">
                        <i class="uil uil-clock-three"></i>
                        <span class="text">Recent Activity</span>
                    </div>
                    <div class="activity-data">
                        <div class="data names">
                            <span class="data-title">Name</span>
                            <span class="data-list">Prem Shahi</span>
                            <span class="data-list">Deepa Chand</span>
                            <span class="data-list">Manisha Chand</span>
                            <span class="data-list">Pratima Shahi</span>
                            <span class="data-list">Man Shahi</span>
                            <span class="data-list">Ganesh Chand</span>
                            <span class="data-list">Bikash Chand</span>
                        </div>
                        <div class="data email">
                            <span class="data-title">Email</span>
                            <span class="data-list">premshahi@gmail.com</span>
                            <span class="data-list">deepachand@gmail.com</span>
                            <span class="data-list">prakashhai@gmail.com</span>
                            <span class="data-list">manishachand@gmail.com</span>
                            <span class="data-list">pratimashhai@gmail.com</span>
                            <span class="data-list">manshahi@gmail.com</span>
                            <span class="data-list">ganeshchand@gmail.com</span>
                        </div>
                        <div class="data joined">
                            <span class="data-title">Joined</span>
                            <span class="data-list">2022-02-12</span>
                            <span class="data-list">2022-02-12</span>
                            <span class="data-list">2022-02-13</span>
                            <span class="data-list">2022-02-13</span>
                            <span class="data-list">2022-02-14</span>
                            <span class="data-list">2022-02-14</span>
                            <span class="data-list">2022-02-15</span>
                        </div>
                        <div class="data type">
                            <span class="data-title">Type</span>
                            <span class="data-list">New</span>
                            <span class="data-list">Member</span>
                            <span class="data-list">Member</span>
                            <span class="data-list">New</span>
                            <span class="data-list">Member</span>
                            <span class="data-list">New</span>
                            <span class="data-list">Member</span>
                        </div>
                        <div class="data status">
                            <span class="data-title">Status</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                            <span class="data-list">Liked</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>

    </body>

    </html>

</x-app-layout>