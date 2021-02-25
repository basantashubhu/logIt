@extends('layout')

@section('content')
    <div class="page-title">
        <h1>Locate &amp; Edit Time Record</h1>
    </div>
    @include('components.identify');
    @include('components.edit-modal')
    @include('components.locate-record');
    @include('components.time-table')
    <div class="button-container">
        <button id="clear">Complete And Clear</button>
    </div>
@endsection
