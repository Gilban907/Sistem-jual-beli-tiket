<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Know Your Enemy Concert - Rage Against The Machine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .nav-header {
            background: linear-gradient(to bottom, #0C4AC8, #062462);

            padding: 20px 60px;
            color: white;
            display: flex;
            flex-direction: column;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .nav-header h1 span {
            color: orange;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>

    <div class="nav-header">
        <div class="d-flex align-items-center justify-content-between">
            <img src="{{ asset('images/logo.png') }}" width="100" alt="">
            <form class="form-inline my-2 my-lg-0" style="width: 400px">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div class="d-flex gap-3">
            <a href="#">Musik</a>
            <a href="#">Culture</a>
            <a href="#">Party</a>
            <a href="#">Show</a>
            </div>
                 
  <div class="d-flex justify-content-center align-items-center">
            <a class="d-flex justify-content-center align-items-center px-3"
                style="border-left:1px solid gray;border-right:1px solid gray;cursor:pointer;color:white;text-decoration:none">Transaksi</a>
           <a class="d-flex justify-content-center align-items-center px-3"
                style="border-left:1px solid gray;border-right:1px solid gray;cursor:pointer;color:white;text-decoration:none">Tiket</a>
           
            <a href="{{ route('profile') }}" class="d-flex justify-content-center align-items-center px-3"
                style="cursor:pointer;color:white;text-decoration:none">
            <i style="font-size: 1.4rem" class="fas fa-user-circle"></i>
            </a>
        </div>
        </div>
    </div>
