<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
</head>
<body>
@section('sidebar')
    這是側選欄
    @show

<div class="container">
    @yield('content')
</div>

@include('site.layouts.footer')

</body>
</html>