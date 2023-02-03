<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body class="dark-sidenav">
    @include('components.preloader')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.topbar')
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.layer').style.display = 'none';
            }, 1000);
        });
    </script>
    <x:notify-messages/>

    @include('layouts.footer')
</body>

</html>