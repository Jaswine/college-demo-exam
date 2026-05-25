<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Product List</title>
</head>
<body>
    
    {{-- Header --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="#">Store.</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/product-list">Product List</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-disabled="true">Description</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-disabled="true">Contact</a>
                </li>
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                @guest
                <a class="btn" href="/sign-in">Sign In</a>
                <a class="btn btn-primary" href="sign-up">Sign Up</a>
                @else
                <a class="btn btn-primary" href="/cart">Cart</a>
                <a class="btn">User</a>  
                @endguest
            </div>
            </div>
        </div>
        </nav>
    {{-- Header --}}

    <div style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 4vh 10vw;"> 
    <h1>{{ $user->name }}</h1>
    <h2 style="margin-bottom: 5vh">Orders</h2>
    <div class="table-responsive small" style="width: 100%">
      <table class="table table-striped table-sm">
        <tbody>
        
          @foreach ( $orders as $order)
            <tr>
              <td>
                <a href='/order-list/{{ $order->id }}'>
                    {{ $order->unique_numbers }}
                </a>
              </td>
              <td>{{ $order->fio }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->address }}</td>
              <td><a type="button" 
                class="btn btn-sm btn-outline-secondary"
                href="/order-list/{{ $order->id }}">Read</a></td>
              <td><a type="button" 
                class="btn btn-sm btn-outline-secondary"
                href="/remove-order/{{ $order->id }}">Remove</a></td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>


</body>
</html>