@extends('themes.flixer.layout.app')

@section('title', 'Language')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="setting-container">
                    <div class="col-lg-9">
                        <h1>Language</h1>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="" method="post">
                            <p> Select your preferred language for Flixer. All TV programmes and films are not available
                                in
                                all languages. </p>
                            <div class="col-lg-3">
                                @foreach ($languages as $language)
                                    @if(substr($language, 0, 1) != '.')
                                    <label class="radio radio-red">
                                        <input type="radio" name="language[]" data-toggle="radio"
                                               value="{{ strtolower($language) }}"/>
                                       {{-- < ? php echo(strtolower($language) == $_SESSION['fl_language'] ? 'checked' : false); ?>>--}}
                                        <i></i>{{ ucfirst($language) }}
                                    </label>
                                    @endif
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                            <button type="submit" name="save"
                                    class="btn btn-danger btn-md btn-fill">Save</button>
                            <a href="settings"
                               class="btn btn-default btn-md btn-fill">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection