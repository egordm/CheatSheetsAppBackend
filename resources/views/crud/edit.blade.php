@extends('layouts.default')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post"
                  action="{{$action == \Admin\Presenters\Presenter::ACTION_CREATE ? route("$route.store") : route("$route.update", ['id' => $model->getKey()])}}">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header d-flex align-items-center" style="height: auto">
                        <h2 class="h5 display">{{$action == \Admin\Presenters\Presenter::ACTION_CREATE ? 'Create' : 'Edit'}}</h2>
                    </div>
                    <div class="card-block">
                        @foreach($fields as $field)
                            {!! $field->renderInput($model,
                            (!empty($errors) && $errors->get($field->getName()) != null) ?  $errors->get($field->getName())[0] : null) !!}
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                        <a class="btn btn-sm btn-danger" href="{{route("$route.index")}}"><i class="fa fa-trash-o"></i>
                            Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop