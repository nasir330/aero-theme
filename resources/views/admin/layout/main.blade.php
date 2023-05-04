@include('admin.layout.hader')

<title> @yield('title')</title>

@yield('style')

@include('admin.layout.sidebar')

@yield('content')

@include('admin.layout.footer')

@yield('script')

