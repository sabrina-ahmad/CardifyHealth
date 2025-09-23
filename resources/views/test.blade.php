<x-layout :title="'Test'">

    <div class="container mt-5 py-5">

        <div class="card">
            <form method="GET" action="{{ route('test') }}">
                <input type="text" name="search" placeholder="Search hospital..."
                    value="{{ request()->get('search') }}">
                <button type="submit">Search</button>
            </form>

            <h1>Result</h1>
            <ul>
                @foreach ($results as $result)
                    <li>{{ $result->id }} - {{ $result->name }} - {{ $result->department }} - {{ $result->doctors }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row gap-2 mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">

                </ul>
            </nav>

        </div>
    </div>

</x-layout>
