<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>

<body>
    @inertia
    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>
