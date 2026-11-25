<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .nav-icon {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .nav-link {
            color: white;
        }
        .active-tab {
            border-bottom: 2px solid #1d4ed8;
        }
    </style>
</head>
<body style="background-color: #f9fafb;">

    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #003eff, #000088); color: white;">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-white" href="#">b<span style="color: orange;">oo</span>ket</a>
            <div class="d-flex align-items-center gap-3">
                <div class="nav-icon">
                    <img src="/icons/transaction.svg" width="20"> <a class="nav-link" href="#">Transaksi</a>
                </div>
                <div class="nav-icon">
                    <img src="/icons/ticket.svg" width="20"> <a class="nav-link" href="#">Tiket</a>
                </div>
                <img src="/icons/user.svg" width="30" class="rounded-circle bg-white p-1" alt="Profil">
            </div>
        </div>
    </nav>

    <div class="bg-white py-2 px-4">
        <div class="d-flex justify-content-around text-center">
            <a href="#" class="text-decoration-none text-dark">Music</a>
            <a href="#" class="text-decoration-none text-dark">Culture</a>
            <a href="#" class="text-decoration-none text-dark">Party</a>
            <a href="#" class="text-decoration-none text-dark">Show</a>
        </div>
    </div>

    <div class="container my-4">
        @yield('content')
    </div>

</body>
</html>
