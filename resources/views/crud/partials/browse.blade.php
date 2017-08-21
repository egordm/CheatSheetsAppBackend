<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header align-items-center" style="height: auto">
                <div class="float-left">
                    <h2 class="h5 display">{{$title}}</h2>
                </div>
                <a class="btn btn-primary d-inline" href="{{route("$route.create")}}" style="margin-left: 16px">Create</a>
                <div class="float-right">
                    <form>
                        <input name="{{$route.'_query'}}" placeholder="Search" class="form-control d-inline"
                               style="width: auto">
                        <button class="btn btn-primary d-inline">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        @foreach($fields as $field)
                            <th>{{$field->getLabel()}}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            @foreach($fields as $field)
                                <td>
                                    {!! $field->formatModel($model) !!}
                                </td>
                            @endforeach
                            <td>
                                <a href="{{route("$route.show", ['id' => $model->id])}}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{route("$route.edit", ['id' => $model->id])}}" class="btn btn-sm btn-success">Edit</a>
                                <form class="d-inline" method="post" action="{{route("$route.destroy", ['id' => $model->id])}}">
                                    {{csrf_field()}}
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="center-block">
                    {{$models->links('elements.pagination')}}
                </div>
            </div>
        </div>
    </div>
</div>