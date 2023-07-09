@extends('layout/app')
@section('content')
    <livewire:subject>

@endsection

@section('script-subject')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addsubject').modal('hide');
            $('#updatesubject').modal('hide');
            $('#deletesubject').modal('hide');
        })
    </script>
@endsection

