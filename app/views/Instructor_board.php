<?php
// Dummy data for demonstration if none is provided
if (empty($data['users'])) {
    $data['users'] = [
        ['id' => 1, 'name' => 'Alice'],
        ['id' => 2, 'name' => 'Bob'],
        ['id' => 3, 'name' => 'Charlie'],
        ['id' => 4, 'name' => 'David'],
        ['id' => 5, 'name' => 'Eve'],
        ['id' => 6, 'name' => 'Frank'],
        ['id' => 7, 'name' => 'Grace']
    ];
}
if (empty($data['suggested'])) {
    $data['suggested'] = [
        ['title' => 'Advanced Python'],
        ['title' => 'Machine Learning 101'],
        ['title' => 'Cloud Strategies'],
        ['title' => 'DevOps Best Practices'],
        ['title' => 'Cybersecurity Deep Dive'],
        ['title' => 'Modern JavaScript'],
        ['title' => 'Responsive Web Design'],
        ['title' => 'Data Analysis with R']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veillehub - Instructor Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="calendar"></div>
    <!-- Main Header -->
    <header class="main-header">
        <div class="header-left">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                Veille<span>hub</span>
            </div>
            <nav class="header-nav">
                <a href="#" class="active">Dashboard</a>
                <a href="#">Help</a>
            </nav>
        </div>
        <div class="header-right">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <form action="/manager/public/Instructor_board" method="POST">
                <button class="logout-button" name="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Vertical Sidebar -->
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

        <!-- Modified navigation links for the instructor board -->
        <div class="nav-links">
            <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
            <a href="#"><i class="fas fa-plus"></i> Add Presentation</a>
            <a href="#"><i class="fas fa-lightbulb"></i> Suggested</a>
            <a href="#"><i class="fas fa-calendar"></i> Calendar</a>
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
            <!-- Add Presentation Section -->
            <section class="add-presentation-section">
                <h2>Add a Presentation</h2>
                <form action="/manager/public/Instructor_board" method="POST" class="add-presentation-form">
                    <div class="form-group">
                        <label for="presentation-title">Title:</label>
                        <input type="text" name="title" id="presentation-title" required>
                    </div>
                    <div class="form-group">
                        <label for="presentation-date">Date:</label>
                        <input type="date" name="date" id="presentation-date" required>
                    </div>
                    <div class="form-group assign-users">
                        <label>Assign To:</label>
                        <!-- Live Search Input -->
                        <input type="text" id="userSearch" placeholder="Search users...">
                        <div class="user-list">
                            <?php foreach ($data['users'] as $user): ?>
                                <div class="user-item">
                                    <input type="checkbox" name="assigned_users[]" value="<?= $user['id'] ?>" id="user-<?= $user['id'] ?>">
                                    <label for="user-<?= $user['id'] ?>"><?= $user['name'] ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="add_presentation" class="add-btn">
                            <i class="fas fa-plus"></i> Add Presentation
                        </button>
                    </div>
                </form>
            </section>

            <!-- Suggested Presentations Section -->
            <section class="suggested-presentations-section">
                <h2>Suggested Presentations</h2>
                <div class="suggestion-list">
                    <?php foreach ($data['suggested'] as $suggestion): ?>
                        <div class="presentation">
                            <h4><?= $suggestion['title']; ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>

    <style>
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
            .header-left {
        display: flex;
        align-items: center;
        gap: 2rem;
    }
        input{
            background-color: transparent;
            color: white;
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

        /* Main Header Styles */
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
            height: calc(100vh / 0.85);
            position: fixed;
            scale: 0.85;
            transform-origin: top left;
            margin-top: 64px; /* Height of header */
        }

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
            margin-bottom: 1rem;
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

        /* Header Right and Search Bar */
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

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

        .main-area {
            flex: 1;
            margin-top: 64px; /* Height of header */
            margin-left: 280px;
            padding: 2rem;
        }

        /* Add Presentation & Suggested Presentations Sections */
        .add-presentation-section,
        .suggested-presentations-section {
            background: var(--surface-light);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            font-family: Arial, sans-serif;
        }

        .add-presentation-section h2,
        .suggested-presentations-section h2 {
            margin-bottom: 1rem;
        }

        .add-presentation-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            padding: 0.5rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 1rem;
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
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            opacity: 0.9;
        }

        .suggested-presentations-section .presentation {
            background: var(--surface-light);
            border-radius: 6px;
            padding: 0.75rem;
            margin-top: 0.75rem;
        }

        .suggested-presentations-section .presentation h4 {
            font-size: 1em;
            margin-bottom: 0.5rem;
        }

        /* Live search input styling */
        .assign-users input[type="text"] {
            margin-bottom: 0.5rem;
            padding: 0.4rem 0.6rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: transparent;
            color: var(--text);
        }

        /* User list scroll container */
        .assign-users .user-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            max-height: 150px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        /* Custom scrollbar styling for the user list */
        .assign-users .user-list::-webkit-scrollbar {
            width: 8px;
        }
        .assign-users .user-list::-webkit-scrollbar-track {
            background: var(--surface);
            border-radius: 4px;
        }
        .assign-users .user-list::-webkit-scrollbar-thumb {
            background: var(--app-theme);
            border-radius: 4px;
        }

        .user-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.3rem 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        /* Custom checkbox styling */
        .user-item input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
        }
        .user-item input[type="checkbox"]:checked {
            background: var(--app-theme);
            border-color: var(--app-theme);
        }

        .form-actions {
            text-align: right;
            margin-top: 1rem;
        }

        .accept-btn {
            background: var(--app-theme);
            color: var(--surface);
            border: none;
            padding: 0.3rem 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        .accept-btn:hover {
            opacity: 0.9;
        }
    </style>

    <!-- JavaScript for Live Search in the Assign Users Container -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userSearch = document.getElementById('userSearch');
            userSearch.addEventListener('keyup', function () {
                const searchQuery = this.value.toLowerCase();
                const userItems = document.querySelectorAll('.user-list .user-item');
                userItems.forEach(function (item) {
                    const userName = item.querySelector('label').innerText.toLowerCase();
                    item.style.display = userName.indexOf(searchQuery) > -1 ? 'flex' : 'none';
                });
            });
        });
    </script>
</body>
</html>