@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Image</div>

                <div class="panel-body">
             <form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="{{ route('stories.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">image</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" name="image" autofocus>

                            </div>
                        </div>

                        
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ENVOYER
                                </button>
                            </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
