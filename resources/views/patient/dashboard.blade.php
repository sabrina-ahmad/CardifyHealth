<x-layout>
    <div class="container mt-5">
        <h1>Welcome, {{ auth()->user()->name }} 🎉</h1>
        <p>Your role: {{ auth()->user()->role }}</p>
    </div>
</x-layout>
