<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Parkir</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
        }

        /* NAVBAR */
        .navbar {
            background: #2563eb;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
        }

        /* LAYOUT */
        .container {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background: #1f2933;
            min-height: 100vh;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li:hover {
            background: #2563eb;
        }

        .sidebar ul li:hover a {
            color: white;
        }

        .sidebar .logout a {
            color: #f87171;
        }

        /* CONTENT */
        .content {
            flex: 1;
            padding: 30px;
        }
        .logout-form {
    margin: 0;
}

.menu-link {
    width: 100%;
    background: none;
    border: none;
    text-align: left;
    padding: 15px 20px;
    color: #cfd8dc;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

/* hover sama kayak menu lain */
.menu-link:hover {
    background-color: #2d5be3; /* biru */
    color: white;
}

/* biar full width */
.logout-form button {
    width: 100%;
}

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <h2>Sistem Parkir</h2>
    <span>petugas</span>
</nav>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul>
            <li><a href="/transaksi">Transaksi</a></li>
            <li><a href="/kendaraan">Kendaraan</a></li>
<form action="{{ route('logout') }}" method="POST" class="menu-item logout-form">
    @csrf
    <button type="submit" class="menu-link">Logout</button>
</form>
        </ul>
    </aside>

    <!-- CONTENT -->
    <main class="content">
        @yield('content')
    </main>

</div>

</body>
</html>