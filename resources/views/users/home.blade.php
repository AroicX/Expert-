@extends('users\layout.app')

@section('title')
	<title>Home</title>
@endsection

@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
@endsection

 
@section('content')

@endsection




@section('scripts')
<script src="/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.init.js"></script>
@endsection