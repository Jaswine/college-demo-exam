<form method="POST">
    @csrf

    <h2>Registration</h2>

    <div>
        <label>Username:</label>
        <input type="text" 
            name="username" 
            required />
    </div>

    <div>
        <label>Email:</label>
        <input type="email" 
            name="email" 
            required />
    </div>

    <div>
        <label>Password:</label>
        <input type="password" 
            name="password" 
            required />
    </div>

    @if ($message != '')
        <p style="color: red">
            {{ $message }}
        </p>
    @endif

    <button type="submit">Continue</button>
    
    <p>
        <a href="/login">Login</a>
    </p>

</form>