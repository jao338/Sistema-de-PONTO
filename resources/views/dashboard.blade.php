<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sistema PONTO') }}
        </h2>

        <span id="clock" class="fw-bolder">00:00:00</span>

    </x-slot>

    @php
        $currentRoute = request()->route()->getName();
    @endphp

    @if ($currentRoute == "dashboard")
        
        @include('sections/hours')

    @elseif($currentRoute == "dashboard-users")
        
        @include('sections/users')

    @elseif($currentRoute == "dashboard-sectors")

        @include('sections/sectors')

    @endif
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>

</x-app-layout>


