<!doctype html>
<html lang="en" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include("site.layout.partials.links")

    <title>Blood Bank</title>
</head>
<body class="@yield("class_body")">
<!--upper-bar-->
@include("site.layout.partials.upper-bar")

<!--nav-->
@include("site.layout.partials.navbar")

@yield("content")

<!--footer-->
@include("site.layout.partials.footer")
@include("site.layout.partials.scripts")


</body>
</html>
