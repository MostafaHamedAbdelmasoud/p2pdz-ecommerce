@extends('layouts.app')

@section('header')
<link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<link href="{{ asset($asset_path.'css/pages/all-pages.css?v3') }}" rel="stylesheet" type="text/css" />
@endsection




@section('content')

@include('layouts.header')


<div id="page-content">
  @yield('page-content')
</div>
<!-- /#page-content -->


@include('layouts.footer')


@endsection




@section('footer')


{{-- scripts --}}
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>

<script src="{{ asset($asset_path.'/js/pages/all-pages.js?ver=3') }}"></script>

<script>
  $(document).ready(function(){
    const fixed_menu    = document.querySelector('#fixed-menu');
    const fixed_menu_ps = new PerfectScrollbar(fixed_menu, {
    wheelSpeed: 1,
    wheelPropagation: false,
    minScrollbarLength: 20
    });
  });
</script>
@endsection