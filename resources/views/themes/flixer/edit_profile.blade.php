@extends('themes.flixer.layout.app')

@section('title', 'Edit Profile')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="content animated fadeIn" v-on:click="hideSearch()">
        <div class="edit-profile col-lg-6 col-centered">
            <form action="" method="post">
                <h1 class="pull-left">Edit Profile</h1>
                <div class="clearfix"></div>
                <div class="entry">
                    <form action="" method="post">
                        <div class="col-lg-2 avatar-container pull-left">
                            <img src="{{ session('theme_path') }}/assets/images/avatars/{{ $profile->profile_avatar }}.png"
                                 class="avatar pull-left">
                            <input type="hidden" name="profile_avatar" value="{{ $profile->profile_avatar }}">
                        </div>
                        <div class="col-lg-7 pull-left">
                            <div class="input-group">
                                <input type="text" name="profile_name" value="{{ $profile->profile_name }}"
                                       placeholder="Name" class="form-control input-dark input-lg pull-left">
                                <span class="input-group-addon checkbox-kids">
                <label class="checkbox pull-right" for="checkbox5">
                  <input type="checkbox" name="is_kid" value="1" id="checkbox5"
                         data-toggle="checkbox" {{ ($profile->is_kid == 1) ? 'checked' : '' }}>
                  <span class="description">Kid</span>
                </label>
              </span>
                            </div>
                            <div class="col-lg-4 pull-left text-left">
                                <label>Language</label>
                                <div class="clearfix"></div>
                                <div class="chosen-settings pull-left">
                                    <select name="profile_language" class="form-control input-dark chosen"
                                            style="border-radius:0px;">
                                        <option {{ ($profile->profile_language == 'english') ? 'selected' : '' }}>
                                            English <b class="caret"></b></option>
                                        <option {{ ($profile->profile_language == 'bulgarian') ? 'selected' : '' }}>
                                            Bulgarian
                                        </option>
                                        <option {{ ($profile->profile_language == 'turkish') ? 'selected' : '' }}>
                                            Turkish
                                        </option>
                                        <option {{ ($profile->profile_language == 'italian') ? 'selected' : '' }}>
                                            Italian
                                        </option>
                                        <option {{ ($profile->profile_language == 'spanish') ? 'selected' : '' }}>
                                            Spanish
                                        </option>
                                        <option {{ ($profile->profile_language == 'chinese') ? 'selected' : '' }}>
                                            Chinese
                                        </option>
                                        <option {{ ($profile->profile_language == 'polish') ? 'selected' : '' }}> Polish
                                        </option>
                                        <option {{ ($profile->profile_language == 'danish') ? 'selected' : '' }}> Danish
                                        </option>
                                        <option {{ ($profile->profile_language == 'german') ? 'selected' : '' }}> German
                                        </option>
                                        <option {{ ($profile->profile_language == 'french') ? 'selected' : '' }}> French
                                        </option>
                                        <option {{ ($profile->profile_language == 'russian') ? 'selected' : '' }}>
                                            Russian
                                        </option>
                                        <option {{ ($profile->profile_language == 'japanese') ? 'selected' : '' }}>
                                            Japanese
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                <button type="submit" name="save"
                        class="btn btn-neutral btn-fill btn-lg pull-left">Save
                </button>
                <a href="manage_profiles"
                   class="btn btn-default btn-lg pull-left">Cancel</a>
            </form>
        </div>
    </div>
@endsection