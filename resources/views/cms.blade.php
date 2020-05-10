@extends('layouts.html')

@section('content')
    @include('layouts.header')
    @include('layouts.title', [
        'title' => $seo['name']
    ])
    <div class="container">
        <div class="row justify-content-center">
            {!!  $seo['description'] ?? ''  !!}
        </div>
    </div>
    @include('layouts.footer')
@endsection
