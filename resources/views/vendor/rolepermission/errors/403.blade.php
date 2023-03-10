@extends('admin.layout.master')

@section('content')

    <div class="row text-center" style="padding-top:200px;">
        <h2 t>{{ (isset($error)) ? $error : 'This action is unauthorized.' }}</h2>
    </div>
<!-- /row -->

@stop