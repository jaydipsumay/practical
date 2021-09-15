<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Practical_Task</title>
    <style>
      .error{
        color:red;
      }
    </style>

  </head>
  <body>
<div class="container py-1">
 <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item " >
    <a class="nav-link px-5 {{ Request::is('new_product') ? 'active' : '' }} {{ Request::is('edit_product/*') ? 'active' : '' }} {{ Request::is('/') ? 'active' : '' }}" href="{{ route('product')}}">Product</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link px-5 {{ Request::is('category') ? 'active' : '' }} {{ Request::is('edit_category/*') ? 'active' : '' }} {{ Request::is('new_category') ? 'active' : '' }}" href="{{ route('category')}}">Category</a>
  </li>
</ul>
</div>