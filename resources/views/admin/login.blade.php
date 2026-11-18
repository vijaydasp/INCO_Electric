<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --color-default: #212529;
            --color-primary: #ce1212;
            --color-secondary: #37373f;
            --color-border: #e0e0e0;
            --color-bg: #ffffff;
        }

        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--color-default);
        }

        .login-card {
            background: var(--color-bg);
            width: 100%;
            max-width: 400px;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: var(--color-secondary);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: var(--color-secondary);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            font-size: 14px;
            color: var(--color-default);
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 2px rgba(206, 18, 18, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: var(--color-primary);
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #a50e0e;
        }

        .extra-links {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .extra-links a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-card">
    <img src="{{ asset('assets/img/logo.png') }}" alt="" style="display: block; margin: 0 auto 20px auto; width: 160px;">
    <!-- <h2>Login</h2> -->

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="login-btn">Sign In</button>
    </form>


</div>

</body>
</html>
