@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New List</div>

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

            <!-- Current Lists -->
            @if (count($lists) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Lists
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped list-table">

                            <!-- Table Headings -->
                            <thead>
                            <th>Lists</th>
                            <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($lists as $list)
                                <tr>
                                    <!-- List Name -->
                                    <td class="table-text">
                                        <div>{{ $list->name }}</div>
                                    </td>

                                    <td>
                                        <!-- TODO: Delete Button -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
