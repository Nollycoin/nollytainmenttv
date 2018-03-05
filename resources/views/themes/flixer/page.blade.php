@extends('themes.flixer.layout.app')

@section('title', $page->page_name)

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-page">
                    <h1> {{ $page->page_name }} </h1>
                    <p>
                        {!! nl2br(e($page->page_content)) !!}
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection