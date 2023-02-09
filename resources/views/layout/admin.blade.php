<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
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
        @if (session('adminSession')[0]['role']===1)
        <a href="/admin/account">Tài khoản</a>
        @endif
        <a href="/admin/port">Bài viết</a>
        <a href="/admin/portRef">Bài viết liên kết</a>
        @if (session('adminSession')[0]['role']===1)
        <a href="/admin/report">Số lượt truy cập</a>
        @endif
    </div>
    <div class="logout-container">
        <div class="btn-group " style="position: absolute;
        right: 10px;
        top: 5px;">
            <button type="button" class="btn btn-violet dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Xin chào {{session('adminSession')[0]['username']}}
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" type="button" href="/admin/account/accountPage">Trang cá nhân</a>
              <a class="dropdown-item" type="button" href="/admin/account/changePass">Đổi mật khẩu</a>
              <a href="/logout" class="dropdown-item" type="button">Đăng xuất</a>
            </div>
          </div>
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
