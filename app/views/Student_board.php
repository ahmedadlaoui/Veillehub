<?php
// echo $data['profile'];
//   die('c');

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />

    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div id="calendar"></div>
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
            <form action="/manager/public/Student_board" method="POST">
                <button class="logout-button" name="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <nav class="vertical-nav">
        <div class="sidebar-profile">
            <div class="profile-image">
                <img src="https://i.pinimg.com/736x/09/21/fc/0921fc87aa989330b8d403014bf4f340.jpg" alt="Profile">
                <div class="online-status"></div>
            </div>
            <div class="profile-info">
                <h3><?= $data['firstname'] ?></h3>
                <p><?= $data['email'] ?></p>
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
            <button class="nav-btn" id="prevMonth"><i class="fas fa-chevron-left"></i></button>
            <h2 id="calendarMonth">December 2023</h2>
            <button class="nav-btn" id="nextMonth"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="calendar-grid">
        <div class="calendar-days">

        </div>

        <div class="calendar-dates" id="calendarDates"></div>
    </div>
</div>


        </main>
    </div>
</body>




<STYle>
    .calendar-section {
        font-family: Arial, sans-serif;
        width: 100%;
        margin: 20px auto;
        max-width: 1200px;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .calendar-navigation button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.5em;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: bold;
    }

    .calendar-dates {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .date-cell {
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }

    .date-cell.prev-month {
        color: #888;
    }

    .date-cell.today {
        background-color: #f0f0f0;
        font-weight: bold;
        border-radius: 5px;
    }

    .presentation {
        margin-top: 5px;
        font-size: 0.9em;
    }

    .presentation h4 {
        font-size: 1em;
        margin: 0;
    }

    .presenters img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 5px;
    }



    :root {
        --app-theme: #fbff92;
        --app-theme-rgb: 255, 217, 0;
        --app-theme-color: #000000;
        --app-theme-color-rgb: 0, 0, 0;
        --background: #252525;
        --surface: #161A1D;
        --surface-light: #2D353C;
        --text: #ffffff;
        --text-light: #999999;
        --border: #cacaca;
        --shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: var(--text);
        background-color: var(--surface);
        display: flex;
        min-height: 100vh;
    }

    /* Global Header Styles */
    .main-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: var(--surface);
        padding: 1rem 2rem;
        border-bottom: 1px solid var(--border);
        z-index: 1000;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Vertical Navbar */
    .vertical-nav {
        width: calc(260px / 0.85);
        background: var(--surface-light);
        padding: 2rem 0;
        border-right: 1px solid var(--border);
        height: calc(100vh /0.85);
        position: fixed;
        scale: 0.85;
        transform-origin: top left;
        margin-top: 64px;
        /* Height of header */
    }

    /* Add these styles for the header right section and logout button */
    .header-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logout-button {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: var(--surface-light);
        border: 1px solid var(--border);
        border-radius: 6px;
        color: var(--text);
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .logout-button:hover {
        background: rgba(255, 0, 0, 0.1);
        color: #ff4444;
        border-color: #ff4444;
    }

    .logout-button i {
        font-size: 0.9rem;
    }

    .vertical-nav .logo {
        padding: 0 2rem;
        margin-bottom: 3rem;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .vertical-nav .logo span {
        color: var(--app-theme);
    }

    .nav-links {
        padding: 1.5rem 1rem;
    }

    .nav-links a {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem 1rem;
        color: var(--text);
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .nav-links a:hover,
    .nav-links a.active {
        background: rgba(255, 217, 0, 0.1);
    }

    .nav-links a i {
        color: var(--text-light);
        width: 20px;
    }

    .nav-links a:hover i,
    .nav-links a.active i {
        color: var(--app-theme);
    }

    /* Main Content */
    .main-area {
        flex: 1;
        margin-top: 64px;
        /* Height of header */
        margin-left: 280px;
        padding: 2rem;
    }

    /* Profile Section */
    .sidebar-profile {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .profile-image {
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--app-theme);
    }

    .online-status {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 12px;
        height: 12px;
        background: #22c55e;
        border: 2px solid var(--surface-light);
        border-radius: 50%;
    }

    .profile-info h3 {
        font-size: 1.2rem;
        margin-bottom: 0.25rem;
    }

    .profile-info p {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .points-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 217, 0, 0.1);
        border-radius: 50px;
        font-size: 0.9rem;
    }

    .points-badge i {
        color: var(--app-theme);
    }

    /* Header */
    .header-left {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .logo i {
        color: var(--app-theme);
        margin-right: 0.5rem;
    }

    .header-nav {
        display: flex;
        gap: 1rem;
    }

    .header-nav a {
        color: var(--text-light);
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
    }

    .header-nav a.active {
        color: var(--text);
        background: var(--surface-light);
    }

    /* Calendar Section */
    .calendar-section {
        background: var(--surface-light);
        border-radius: 12px;
        padding: 1.5rem;
    }

    .main-content {
        scale: 0.9;
        transform-origin: top left;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .calendar-navigation {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .calendar-navigation h2 {
        font-size: 1.2rem;
        min-width: 150px;
        text-align: center;
    }

    .nav-btn {
        background: var(--surface);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        color: var(--text);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-btn {
        background: var(--app-theme);
        color: var(--surface);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        cursor: pointer;
    }

    /* Calendar Grid */
    .calendar-grid {
        background: var(--surface);
        border-radius: 8px;
        overflow: hidden;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        background: var(--surface-light);
        border-bottom: 1px solid var(--border);
    }

    .calendar-days span {
        padding: 1rem;
        text-align: center;
        font-weight: 500;
        color: var(--text-light);
    }

    .calendar-dates {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
    }

    .date-cell {
        min-height: 120px;
        padding: 0.75rem;
        border-right: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .date-cell:nth-child(5n) {
        border-right: none;
    }

    .date {
        font-size: 0.9rem;
        color: var(--text);
        margin-bottom: 0.75rem;
        display: block;
    }

    .prev-month .date {
        color: var(--text-light);
        opacity: 0.5;
    }

    /* Presentation Cards */
    .presentation {
        background: var(--surface-light);
        border-radius: 6px;
        padding: 0.75rem;
        margin-top: 0.5rem;
    }

    .presentation.my-presentation {
        background: rgba(255, 217, 0, 0.1);
        border: 1px solid var(--app-theme);
    }

    .presentation h4 {
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .presenters {
        display: flex;
        align-items: center;
    }

    .presenters img {
        width: 34px;
        height: 34px;
        border-radius: 16%;
        border: 2px solid var(--surface);
        object-fit: cover;
    }

    .presenters img:first-child {
        margin-left: 0;
    }

    .presenters img.current-user {
        border: 2px solid var(--app-theme);
    }



    /* Search Bar */
    .search-bar {
        display: flex;
        align-items: center;
        background: var(--surface);
        border-radius: 6px;
        padding: 0.5rem 1rem;
        margin-right: 1rem;
    }

    .search-bar i {
        color: var(--text-light);
        margin-right: 0.5rem;
    }

    .search-bar input {
        background: none;
        border: none;
        color: var(--text);
        outline: none;
        width: 200px;
    }

    .search-bar input::placeholder {
        color: var(--text-light);
    }

    /* Header Actions */
    .header-actions {
        display: flex;
        gap: 0.5rem;
    }

    .icon-btn {
        background: var(--surface);
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 6px;
        color: var(--text-light);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Logout Section */
    .logout-section {
        padding: 1rem;
        border-top: 1px solid var(--border);
        margin-top: auto;
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .logout-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-light);
        text-decoration: none;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background: rgba(255, 0, 0, 0.1);
        color: #ff4444;
    }
</STYle>


<script>
document.addEventListener("DOMContentLoaded", function(){
    // Initialize current month and year using moment.js
    let currentMonth = moment().month();  // moment months are zero-indexed (0=January)
    let currentYear = moment().year();

    function renderCalendar(month, year) {
        const calendarDaysContainer = document.querySelector('.calendar-days');
        const calendarDatesContainer = document.getElementById('calendarDates');

        // Clear existing content
        calendarDaysContainer.innerHTML = "";
        calendarDatesContainer.innerHTML = "";

        // Set the header for weekdays (Monday to Friday)
        const weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
        weekdays.forEach(function(day) {
            let dayCell = document.createElement('div');
            dayCell.className = 'day-cell';
            dayCell.textContent = day;
            calendarDaysContainer.appendChild(dayCell);
        });

        // Get the start and end of the month using moment.js
        let startOfMonth = moment([year, month]).startOf('month');
        let endOfMonth = moment([year, month]).endOf('month');

        // Loop through the entire month and push only weekdays into a workingDays array
        let m = moment(startOfMonth);
        let workingDays = [];
        while(m.month() === month) {
            const dayOfWeek = m.day();  // Sunday=0, Monday=1 ... Saturday=6
            if (dayOfWeek >= 1 && dayOfWeek <= 5) {  // Only Monday to Friday
                workingDays.push(m.date());
            }
            m.add(1, 'day');
        }

        // Populate the calendar-dates container with the working day cells
        workingDays.forEach(function(date) {
            let dateCell = document.createElement('div');
            dateCell.className = 'date-cell';
            dateCell.textContent = date;
            calendarDatesContainer.appendChild(dateCell);
        });

        // Update the calendar header with the formatted month and year
        document.getElementById("calendarMonth").textContent =
            moment([year, month]).format("MMMM YYYY");
    }

    // Month navigation
    document.getElementById("prevMonth").addEventListener("click", function(){
        let newDate = moment([currentYear, currentMonth]).subtract(1, 'month');
        currentMonth = newDate.month();
        currentYear = newDate.year();
        renderCalendar(currentMonth, currentYear);
    });

    document.getElementById("nextMonth").addEventListener("click", function(){
        let newDate = moment([currentYear, currentMonth]).add(1, 'month');
        currentMonth = newDate.month();
        currentYear = newDate.year();
        renderCalendar(currentMonth, currentYear);
    });

    // Render today's calendar on page load.
    renderCalendar(currentMonth, currentYear);
});
</script>

</html>