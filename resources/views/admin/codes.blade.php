@extends('admin.layouts.app')

@section('title', 'Codes')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Settings</a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title">New Code</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label> Action </label>
                                    <select name="code_action" class="form-control chosen">
                                        <option value="add_subscription"> Add subscription</option>
                                        <option value="add_subscription_time"> Extend subscription time</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Amount </label>
                                    <select name="code_amount" class="form-control chosen">
                                        <option value="1_day"> 1 Day</option>
                                        <option value="1_week"> 1 Week</option>
                                        <option value="1_month"> 1 Month</option>
                                    </select>
                                </div>
                                <button type="submit" name="generate" class="btn btn-success btn-fill">Generate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if(!empty($codes))
                <table class="table table-responsive card">
                    <thead>
                    <th class="text-center"> Code</th>
                    <th class="text-center"> Action</th>
                    <th class="text-center"> Amount</th>
                    </thead>
                    <tbody>
                    @foreach($codes as $code)
                        <tr>
                            <td class="text-center">{{ $code->code }}</td>
                            <td class="text-center">{{ ucfirst(str_replace('_', ' ', $code->action)) }}</td>
                            <td class="text-center">{{ $code->amount_plain }}</td>

                            <td class="text-center">
                                <a href="delete_code.php?id={{ $code->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            {{ $codes->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
        </div>
        <div class="clearfix"></div>
    </div>
@endsection