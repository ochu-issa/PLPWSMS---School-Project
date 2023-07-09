@extends('layout/app')
@section('content')
    <livewire:lesson-scheme-show>
@endsection
@section('script-scheme')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addscheme').modal('hide');
        })
    </script>
@endsection
