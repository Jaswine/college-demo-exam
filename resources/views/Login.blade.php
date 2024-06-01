<form method="POST">
    @csrf
    <h2>Login</h2>

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
        <a href="/registration">Registration</a>
    </p>
</form>