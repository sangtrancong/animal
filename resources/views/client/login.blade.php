<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="/css/admin/jquery.dataTables.min.css" />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
    <link rel="stylesheet" href="/css/admin/style.css" />
    <style>
        body {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>



    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            @if (session()->has('loginfail'))
                <div class="text-danger">
                    {{ session()->get('loginfail') }}
                </div>
            @endif
            <div class="form-group">
                <label for="email">Username:</label>
                <input class="form-control" id="email" name="username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    <script src="/js/style.js"></script>

</body>

</html>
