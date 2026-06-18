<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#0d6efd,#6610f2);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .login-card{
            width:100%;
            max-width:450px;
            border:none;
            border-radius:20px;
            box-shadow:0 15px 40px rgba(0,0,0,.2);
        }

        .card-header{
            background:white;
            border:none;
            text-align:center;
            padding-top:30px;
        }

        .logo{
            width:70px;
            height:70px;
            background:#0d6efd;
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            font-weight:bold;
            margin:auto;
        }

        .title{
            margin-top:15px;
            font-weight:700;
        }

        .form-control{
            height:50px;
            border-radius:10px;
        }

        .btn-login{
            height:50px;
            border-radius:10px;
            font-weight:600;
        }

        .forgot-link{
            text-decoration:none;
        }

        .footer-text{
            text-align:center;
            color:#6c757d;
            font-size:14px;
            margin-top:15px;
        }

    </style>
</head>
<body>

<div class="card login-card">

    <div class="card-header">

        <div class="logo">
            CM
        </div>

        <h3 class="title">
            Customer Management
        </h3>

        <p class="text-muted">
            Sign in to continue
        </p>

    </div>

    <div class="card-body p-4">

        <?php if(session()->getFlashdata('error')) : ?>

            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>

        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">

            <?= csrf_field() ?>

            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter email"
                    autocomplete="email"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password"
                    autocomplete="current-password"
                    required>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox">

                    <label class="form-check-label">
                        Remember Me
                    </label>

                </div>

                <a href="<?= site_url('forgot-password') ?>"
                   class="forgot-link">
                    Forgot Password?
                </a>

            </div>

            <button
                type="submit"
                class="btn btn-primary btn-login w-100">

                Login

            </button>

        </form>

        <div class="footer-text">
            © <?= date('Y') ?> Customer Management System
        </div>

    </div>

</div>

</body>
</html>