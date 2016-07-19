@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('errors.common')

                    <!-- New List Form -->
                    <form action="/list" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                        <!-- List Name -->
                        <div class="form-group">
                            <label for="list-name" class="col-sm-3 control-label">List</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="list-name" class="form-control">
                            </div>
                        </div>

                        <!-- Add List Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Create List
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
