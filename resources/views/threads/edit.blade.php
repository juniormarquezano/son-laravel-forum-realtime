@extends('layouts.default')

@section('content')
    <div class="container">
        <h3>{{ $thread->title }}</h3>
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <form action="/threads/{{ $thread->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="input-field">
                        <input type="text"
                               placeholder="{{ __('Thread Title') }}"
                               name="title"
                               value="{{ $thread->title }}">
                    </div>
                    <div class="input-field">
                        <textarea rows="10"
                                  class="materialize-textarea"
                                  placeholder="{{ __('Thread Body') }}"
                                  name="body"
                        >{{ $thread->body }}</textarea>
                    </div>
                    <button type="submit" class="btn bt-red accent-2">{{ __('Send') }}</button>
                </form>
            </div>
            <div class="card-action">
                <a href="/threads/{{ $thread->id }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="../js/replies.js"></script>
@endpush