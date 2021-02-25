@extends('layout')

@section('content')
    <div class="page-title">
        <h1>LogIt</h1>
    </div>
    @include('components.edit-modal')
    @include('components.time-entry')
    @include('components.time-table')
    <div class="button-container">
        <button id="complete">Complete Time Records</button>
    </div>
@endsection
