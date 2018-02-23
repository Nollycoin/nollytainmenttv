@extends('themes.flixer.layout.app')

@section('title', 'Add Profile')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="content animated fadeIn" onclick="hideSearch();">
        <div class="edit-profile col-lg-6 col-centered">
            <div action="" method="post">
                <h1 class="pull-left">Add Profile</h1>
                <div class="clearfix"></div>
                <div class="entry">
                    <form action="" method="post">
                        <div class="col-lg-2 avatar-container pull-left">
                            <img src="{{ asset('themes/flixer/assets/images/avatars').'/'.$profileAvatar.'.png' }}"
                                 class="avatar pull-left">
                            <input type="hidden" name="profile_avatar" value="{{ $profileAvatar }}">
                        </div>
                        <div class="col-lg-7 pull-left">
                            <div class="input-group">
                                <input type="text" name="profile_name" placeholder="Name"
                                       class="form-control input-dark input-lg pull-left">
                                @if($settings->kid_profiles == 1)
                                    <span class="input-group-addon checkbox-kids">
                                        <label class="checkbox checkbox-circle pull-right" for="checkbox5">
                                          <input type="checkbox" name="is_kid" value="1" id="checkbox5"
                                                 data-toggle="checkbox">
                                          <span class="description">Kid</span>
                                        </label>
                                      </span>
                                @endif
                            </div>
                            <div class="col-lg-4 pull-left text-left">
                                <label>Language</label>
                                <div class="clearfix"></div>
                                <div class="chosen-settings">
                                    <select name="profile_language" class="form-control input-dark chosen"
                                            style="border-radius:0px;">
                                        <option> English <b class="caret"></b></option>
                                        <option> Bulgarian</option>
                                        <option> Turkish</option>
                                        <option> Italian</option>
                                        <option> Spanish</option>
                                        <option> Chinese</option>
                                        <option> Polish</option>
                                        <option> Danish</option>
                                        <option> German</option>
                                        <option> French</option>
                                        <option> Russian</option>
                                        <option> Japanese</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" name="continue"
                                class="btn btn-neutral btn-fill btn-lg pull-left">Continue
                        </button>
                        <a href="manage_profiles"
                           class="btn btn-default btn-lg pull-left">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection