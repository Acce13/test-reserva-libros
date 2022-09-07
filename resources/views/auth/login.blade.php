<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TLibro | Log In</title>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Custom Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Bootstrap Bundle with Popper -->
    <main class="login-container vh-100 overflow-auto">
        <div class="container h-100">
            <div class="row g-0 h-100 align-items-center">
                <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-4 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <h2 class="m-0 fw-bold">
                                        Welcome Back
                                    </h2>
                                    <h6 class="text-muted">
                                        Login your account
                                    </h6>
                                </div>
                                <div class="mb-3">
                                    <label for="inputUsername" class="form-label fw-bold">Email</label>
                                    <input type="text" class="form-control" id="inputUsername" name="email" placeholder="Email" />
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label fw-bold">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" />
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary rounded-pill py-2">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>