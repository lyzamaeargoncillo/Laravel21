<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lyza's Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<body class="flex h-screen bg-green-100">

    <div class="flex w-full">

        <nav id="main-nav" class="bg-red-700 text-white w-64 min-h-screen p-5 flex flex-col">
            <div id="brand" class="text-2xl mb-5">
               Lyza's Store
            </div>
            <a href="/" class="p-3 hover:bg-red-600">Home</a>
            <a href="/about" class="p-3 hover:bg-red-600">About</a>
            <a href="/products" class="p-3 hover:bg-red-600">Products</a>
            <a href="/contact" class="p-3 hover:bg-red-600">Contact</a>
        </nav>

        <div class="flex-1 flex flex-col">
            <div class="w-full mx-auto bg-yellow-100 shadow-lg">
                <article id="content" class="min-h-[41rem] p-5">
                    @yield('content')
                </article>

                <footer class="text-center text-gray-600 py-3">
                    Copyright &copy; 2024. All rights reserved.
                </footer>
            </div>
        </div>
    </div>

</body>
</html>
