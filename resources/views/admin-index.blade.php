<?php
    use Illuminate\Http\Request;
    $page = last(request()->segments());
?>

@extends('layouts.admin-app')

@section('content')
    <App />
@endsection
