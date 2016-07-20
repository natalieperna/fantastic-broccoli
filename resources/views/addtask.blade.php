@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if (Auth::guest())
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        <p>Have you tried the fantastic broccoli?</p>
                    </div>
                </div>
            @else
            <div class="panel panel-default">
                <div class="panel-heading">New List</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('errors.common')

                    <!-- New Item Form -->
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
                                    <i class="fa fa-plus"></i> Create Item
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

                                        <form action="/list/{{ $list->id }}" method="POST">
                                            {{ csrf_field() }}
<!-- 
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn"></i>{{ $list->name }}
                                            </button> -->
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ $list->name }}</a>
                                        </form>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="/list/{{ $list->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
