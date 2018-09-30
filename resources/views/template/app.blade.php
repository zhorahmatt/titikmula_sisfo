<!DOCTYPE html>
<html>
<head>
    @include('includes.meta')
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <header class="main-header">
        @include('includes.header')
    </header>

    <aside class="main-sidebar">
        @include('includes.sidebar')
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        @include('includes.footer')
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        @include('includes.sidebar_down')
    </aside>
</div>

@include('includes.scripts')
</body>
</html>
