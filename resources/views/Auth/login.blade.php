<form action="/login" method="POST">
    @csrf

    

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <style>
    .login-container {
        width: 350px;
        margin: 80px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        background: #fff;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #3490dc;
        border: none;
        color: white;
        border-radius: 5px;
    }

    button:hover {
        background: #2779bd;
    }

    </style>

<div class="login-container">
    <h2>Login</h2>

        <div class="form-group">
            <input type="text" name="username" placeholder="nama" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Login</button>
</div>

</form>