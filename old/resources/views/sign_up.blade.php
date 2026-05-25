<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Sign Up</title>
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

<div style="widht: 100%; display: flex; justify-content:center; flex-direction: column; align-items: center; height: 80vh">
    <form method="POST" style="display: flex; flex-direction: column; width: 440px;" >
        @csrf
        <h1>Sign Up</h1>

        <label>Username: </label>
        <input 
            type="text" 
            name="name" 
            placeholder="Username"
            required 
        />

        <label>Email: </label>
        <input 
            type="email" 
            name="email" 
            placeholder="Email"
            required 
        />

        <label>Password: </label>
        <input 
            type="password" 
            name="password" 
            placeholder="Password"
            required 
        />

        <label>Password confirmation: </label>
        <input 
            type="password" 
            name="password_confirmation" 
            placeholder="Password"
            required 
        />

        <p></p>

        <button type="submit">Continue</button>

        <p>You alredy have an account? <a href="/sign-in">Sign In</a></p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>