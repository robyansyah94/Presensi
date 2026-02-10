<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Admin | Tailzon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-50 relative">

    <!-- Wave bottom -->
    <div class="absolute bottom-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,32 C150,100 350,0 500,32 L500,150 L0,150 Z" fill="#ffffff"></path>
        </svg>
    </div>

    <!-- Login Container -->
    <div class="w-full max-w-sm z-10">
        <div class="bg-white rounded-2xl shadow-lg px-8 py-10 text-center">

            <!-- Title -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Sign in</h2>
            <p class="text-gray-500 text-sm mb-6">Sign in and start managing your candidates!</p>

            <!-- Error Message -->
            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-2 rounded-md mb-4 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="/admin/login" class="space-y-4 text-left">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Login"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400" required>
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-green-400 hover:bg-green-500 transition-all font-semibold py-3 rounded-lg text-white">
                    Login
                </button>
            </form>

        </div>
    </div>

</body>

</html>