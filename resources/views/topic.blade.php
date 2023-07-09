@extends('layout/app')
@section('content')
    <livewire:topic-show>
@endsection
@section('script-topic')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addtopic').modal('hide');
            $('#updatetopic').modal('hide');
            $('#deletetopic').modal('hide');
        })
    </script>
@endsection
