<?php
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$timestamp = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $timestamp);
$firstDay = date('N', $timestamp);

$prevMonth = $month - 1;
$prevYear = $year;
if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}

$monthName = date('F', $timestamp);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veillehub - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Global Header -->
    <header class="main-header">
        <div class="header-left">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                Veille<span>hub</span>
            </div>
            <nav class="header-nav">
                <a href="#" class="active">Overview</a>
                <a href="#">Help</a>
            </nav>
        </div>
        <div class="header-right">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <button class="logout-button">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </div>
    </header>

    <!-- Vertical Navbar -->
    <nav class="vertical-nav">
        <div class="sidebar-profile">
            <div class="profile-image">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile">
                <div class="online-status"></div>
            </div>
            <div class="profile-info">
                <h3>Alex Mitchell</h3>
                <p>alex.mitchell@university.edu</p>
                <div class="points-badge">
                    <i class="fas fa-star"></i>
                    <span>2,340 Points</span>
                </div>
            </div>
        </div>

        <div class="nav-links">
            <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
            <a href="#"><i class="fas fa-calendar"></i> Calendar</a>
            <a href="#"><i class="fas fa-tasks"></i> My Presentations</a>
            <a href="#"><i class="fas fa-users"></i> Groups</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </div>

        <div class="logout-section">
            <a href="#" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="main-area">
        <main class="main-content">
            <div class="calendar-section">
                <div class="calendar-header">
                    <div class="calendar-navigation">
                        <button class="nav-btn"><i class="fas fa-chevron-left"></i></button>
                        <h2>December 2023</h2>
                        <button class="nav-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>

                </div>

                <div class="calendar-grid">
                    <div class="calendar-days">
                        <span>Monday</span>
                        <span>Tuesday</span>
                        <span>Wednesday</span>
                        <span>Thursday</span>
                        <span>Friday</span>
                    </div>

                    <div class="calendar-dates">
                        <!-- Week 1 -->
                        <div class="date-cell prev-month">
                            <span class="date">27</span>
                        </div>
                        <div class="date-cell prev-month">
                            <span class="date">28</span>
                        </div>
                        <div class="date-cell prev-month">
                            <span class="date">29</span>
                        </div>
                        <div class="date-cell prev-month">
                            <span class="date">30</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">1</span>
                        </div>

                        <!-- Week 2 -->
                        <div class="date-cell">
                            <span class="date">4</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">5</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">6</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">7</span>
                            <div class="presentation">
                                <h4>Neural Networks & Deep Learning</h4>
                                <div class="presenters">
                                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Sarah Chen"
                                        title="Sarah Chen">
                                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="David Kumar"
                                        title="David Kumar">
                                </div>
                            </div>
                        </div>
                        <div class="date-cell">
                            <span class="date">8</span>
                        </div>

                        <!-- Week 3 -->
                        <div class="date-cell">
                            <span class="date">11</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">12</span>
                            <div class="presentation my-presentation">
                                <h4>Cloud Computing Architecture</h4>
                                <div class="presenters">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="You"
                                        class="current-user" title="Alex Mitchell">
                                    <img src="https://randomuser.me/api/portraits/women/23.jpg" alt="Emma Wilson"
                                        title="Emma Wilson">
                                </div>
                            </div>
                        </div>
                        <div class="date-cell">
                            <span class="date">13</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">14</span>
                            <div class="presentation">
                                <h4>Blockchain Technology</h4>
                                <div class="presenters">
                                    <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="James Wilson"
                                        title="James Wilson">
                                </div>
                            </div>
                        </div>
                        <div class="date-cell">
                            <span class="date">15</span>
                        </div>

                        <!-- Week 4 -->
                        <div class="date-cell">
                            <span class="date">18</span>
                            <div class="presentation my-presentation">
                                <h4>Cybersecurity Fundamentals</h4>
                                <div class="presenters">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="You"
                                        class="current-user" title="Alex Mitchell">
                                </div>
                            </div>
                        </div>
                        <div class="date-cell">
                            <span class="date">19</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">20</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">21</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">22</span>
                        </div>

                        <!-- Week 5 -->
                        <div class="date-cell">
                            <span class="date">25</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">26</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">27</span>
                            <div class="presentation">
                                <h4>DevOps Practices</h4>
                                <div class="presenters">
                                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Sophie Martin"
                                        title="Sophie Martin">
                                    <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="Michael Chang"
                                        title="Michael Chang">
                                </div>
                            </div>
                        </div>
                        <div class="date-cell">
                            <span class="date">28</span>
                        </div>
                        <div class="date-cell">
                            <span class="date">29</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>