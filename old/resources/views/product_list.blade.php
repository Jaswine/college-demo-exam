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

    {{-- <div  style="display: flex; flex-wrap: wrap; align-items: center; width: 100%; padding: 5vh 10vw; gap: 3%; row-gap: 3vh">
        @foreach ( $products as $product )
            <div class="card" style="width: 30%;">
                {{ $product->title }}
            </div>
        @endforeach
    </div> --}}

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
            @foreach ( $products as $product )
            <div class="col">
              <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" style="object-fit: cover" src="{{ $product->image_path }}" />
                <div class="card-body">
                  <p class="card-text">{{ $product->title }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a type="button" 
                          class="btn btn-sm btn-outline-secondary"
                          href="/add-to-cart/{{ $product->id }}">+</a>
                    </div>
                    <small class="text-body-secondary">{{ $product->price }}$</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
</body>
</html>