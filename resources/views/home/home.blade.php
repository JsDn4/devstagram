<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('layouts.app')

@section('tituloPagina')
Home
@endsection

@section('titulo')
Home
@endsection

@section('contenido')


<x-listar-post :posts="$posts"/>


@endsection
