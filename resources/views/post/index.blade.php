@extends('layouts.app')

@include('navbar')

@section('content')


{{-- サインアウトリンク --}}
<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
  サインアウト<br />
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
{{-- //サインアウトリンク --}}

<p>このページは仮のトップページです</p>

<a href="#" class="btn btn-success">仮のボタンです</a>

@endsection