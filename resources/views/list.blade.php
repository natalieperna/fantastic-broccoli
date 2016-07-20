@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('errors.common')

            <!-- Share List -->
            <div class="panel panel-default">
                <div class="panel-heading">Invite</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/invite') }}">
                        {{ csrf_field() }}

                        {{-- TODO This can't be the right way to pass the list ID --}}
                        <input name="list_id" type="hidden" value="{{ $list->id }}">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-share"></i> Invite
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Add an Item</div>

                <div class="panel-body">
                    <!-- New Item Form -->
                    <form action="/list" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                        <!-- Item Name -->
                        <div class="form-group">
                            <label for="list-name" class="col-sm-3 control-label">Item</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="list-name" class="form-control">
                            </div>
                        </div>



                        <!-- Add Item Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Item
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
