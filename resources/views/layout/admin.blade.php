<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="/css/admin/jquery.dataTables.min.css" />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/css/admin/style.css" />
    <style>
        body {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>

    <div class="sidenav">
        <a href="/admin/account">Tài khoản</a>
        <a href="/admin/port">Bài viết</a>
        <a href="/admin/portRef">Bài viết liên kết</a>
        <a href="/admin/report">Số lượt truy cập</a>
    </div>

    <div class="main">
        @yield('content')

    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script src="/js/style.js"></script>
    <script src="/js/style-admin.js"></script>
    @yield('script')
</body>

</html>
