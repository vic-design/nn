@extends('layouts.app')

@section('content')
    <div class="panel panel-default col-md-8 col-md-offset-2">
        <div class="panel-heading">Create new neural network</div>
        <div class="panel-body">
            <form action="{{ route('nn.create') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" value="" name="name" required/>
                </div>

                <div class="form-group">
                    <label># of inputs: </label>
                    <input type="number" class="form-control" value="" name="inputs" required/>
                </div>

                <div class="form-group">
                    <label># of hidden layers: </label>
                    <input type="number" class="form-control" value="" name="layers" required/>
                </div>

                <div class="form-group">
                    <label># of outputs: </label>
                    <input type="number" class="form-control" value="" name="outputs" required/>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Create" class="btn btn-success"/>
                    <a href="{{ route('nn') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection