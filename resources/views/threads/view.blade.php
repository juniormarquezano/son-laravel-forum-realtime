@extends('layouts.default')

@section('content')
    <div>
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">{{ $result->title }}</span>
                {{ $result->body }}
            </div>
        </div>
        <replies
            replied="{{ __('Replied') }}"
            reply="{{ __('Reply') }}"
            your-answer="{{ __('Your Answer') }}"
            send="{{ __('Send') }}"
        >@include('layouts.default.preloader')</replies>
    </div>
@endsection

@push('scripts')
    <script src="../js/replies.js"></script>
@endpush