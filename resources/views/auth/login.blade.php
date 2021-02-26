<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log It</title>
    <link rel="stylesheet" href="/styles.min.css">
</head>
<body class="">
    <div class="container">
        <div class="row" style="justify-content: center;margin-top: 5rem;">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <h2>Login Request</h2> <br>
                        <form name="identify" action="/login" method="POST">
                            <div class="form-control" style="justify-content: center;">
                                <input id="name" type="text" placeholder="Username" name="name" required>
                            </div>
                            <div class="form-control" style="justify-content: center;">
                                <input id="password" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="button-container">
                                <button type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>