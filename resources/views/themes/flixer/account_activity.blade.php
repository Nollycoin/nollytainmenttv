@extends('themes.flixer.layout.app')

@section('title', 'Account Activity')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="setting-container">
                    <div class="col-lg-12">
                        <h1>Account Activity</h1>
                        <p> The latest activity on your account is displayed below. </p>
                        @if(!empty($sessions))
                            <table class="table table-responsive">
                                <thead>
                                <th> Date & Time</th>
                                <th> Location</th>
                                <th> Device</th>
                                <th> Status</th>
                                </thead>
                                <tbody>
                                @foreach($sessions as $session)
                                    <tr>
                                        <td> {{ date('F j, Y, g:i A', $session->time) }}</td>
                                        <td>
                                            {{ \App\Helpers\Constants::getCountryNameByIP($session->user_ip) }}<br>
                                            {{ $session->user_ip }}
                                        </td>
                                        <td> Mac OS X Device</td>
                                        <td>{{ ($session->is_active == 1) ? 'Active' : 'Inactive' }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                            <a href="{{ route('settings') }}"
                               class="btn btn-danger btn-fill btn-md">Done</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection