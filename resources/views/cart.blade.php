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
                    <a class="btn btn-primary">Cart</a>
                    <a class="btn">User</a>  
                    @endguest
                </div>
              </div>
            </div>
          </nav>
        {{-- Header --}}

   <div style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 4vh 10vw;"> 
    <h1 style="margin-bottom: 5vh">Cart</h1>
    <div class="table-responsive small" style="width: 100%">
      <table class="table table-striped table-sm">
        <tbody>
        
          @foreach ( $products as $product)
            <tr>
              <td><img width='24px' height="24px" src="{{ $product->image_path }}" /></td>
              <td>{{ $product->title }}</td>
              <td>{{ $product->price }}</td>
              <td><a type="button" 
                class="btn btn-sm btn-outline-secondary"
                href="/remove-from-cart/{{ $product->pivot->id }}">-</a></td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>

    <h2 class="btn btn-primary">{{ $price }}$</h2>

    @if ($price > 0)
    <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST" style="width: 100%;  margin: 4vh 0; " action="/create-order">
      <h2 style="width: 100%; text-align: center; margin-bottom: 4vh">Create order</h2>
      @csrf
      <div style="width: 100%; gap: 4%; display: flex">
        <div style="width: 100%">
          <div class="form-floating mb-3">
            <input type="text" name="fio" class="form-control" id="floatingInput" required />
            <label for="floatingInput">Full Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="phone" class="form-control" id="floatingPassword" required />
            <label for="floatingPassword">Phone number</label>
          </div>
        </div>
        <div style="width: 100%">
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" required />
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="address" class="form-control" id="floatingPassword" required />
            <label for="floatingPassword">Address</label>
          </div>
        </div>
  
      </div>

      <div class="form-floating mb-3" >
        <select class="form-control" name="payment_method">
          <option selected disabled>Select payment type</option>
          <option>Card</option>
          <option>PayPal</option>
        </select>
        <label for="floatingPassword">Payment Type</label>
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>
      <hr class="my-4">
    </form>
    @else
    <h2>Price is 0$</h2>
    @endif
   </div>
    
</body>
</html>