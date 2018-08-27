@extends('layouts.default')

@section('content')
    <!-- Component Vue -->
    <div>
        <h3>{{ __('Most recent threads') }}</h3>
        <threads
            title="{{ __('Threads') }}"
            threads="{{ __('Threads') }}"
            replies="{{ __('Replies') }}"
            open="{{ __('Open') }}"
            new-thread="{{ __('New Thread') }}"
            thread-title="{{ __('Thread Title') }}"
            thread-body="{{ __("Thread Body") }}"
            send="{{ __('Send') }}"
        >@include('layouts.default.preloader')</threads>
    </div>
@endsection

@push('scripts')
    <script src="js/threads.js"></script>
@endpush