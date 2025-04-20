<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title-header')</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <script src="//unpkg.com/alpinejs" defer></script>
    @yield('syles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-3xl font-bold">@yield('title')</h1>

  <div x-data="{ flash: true }">
    @if (session()->has('success'))
      <div x-show="flash"
        class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
        role="alert">
        <strong class="font-bold">Success!</strong>
        <div>{{ session('success') }}</div>

        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <button type="button" @click="flash = false" class="text-green-700 hover:text-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </span>
      </div>
    @endif
  </div>
    
    @yield('content')
</body>
</html>