@extends('layouts.default')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center" style="height: auto">
                    <h2 class="h5 display">Show</h2>
                    <a class="btn btn-primary d-inline" href="{{route("$route.edit", ['id' => $model->id])}}"
                       style="margin-left: 16px">Edit</a>
                    <form action="{{route("$route.destroy", ['id' => $model->id])}}">
                        <button class="btn btn-danger d-inline" style="margin-left: 16px">Delete</button>
                    </form>

                </div>
                <div class="card-block">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($fields as $field)
                            <tr>
                                <td><b>{{$field->getLabel()}}</b></td>
                                <td>{{$field->formatModel($model)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop