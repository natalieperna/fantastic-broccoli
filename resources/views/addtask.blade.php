@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add an Item</div>

                <div class="panel-body">
                    @include('errors.common')

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
    </div>
</div>
@endsection
