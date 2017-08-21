<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header align-items-center" style="height: auto">
                <div class="float-left">
                    <h2 class="h5 display">{{$title}}</h2>
                </div>
                <a class="btn btn-sm btn-primary d-inline " href="{{route("$route.create")}}" style="margin-left: 16px">Create</a>
                <div class="float-right">
                    <form>
                        <input name="{{$route.'_query'}}" placeholder="Search" class="form-control d-inline"
                               style="width: auto">
                        <button class="btn btn-sm btn-primary d-inline">Submit</button>
                        <a class="btn btn-sm btn-primary btn-minimize" data-toggle="collapse"
                           href="#{{"$route-collapse"}}" aria-expanded="true" aria-controls="{{"$route-collapse"}}">
                            <i class="icon-arrow-down"></i>
                        </a>
                    </form>
                </div>
            </div>
            <div class="card-block collapse in show" id="{{"$route-collapse"}}" aria-expanded="true">
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
                                <a href="{{route("$route.show", ['id' => $model->getKey()])}}"
                                   class="btn btn-sm btn-primary">View</a>
                                <a href="{{route("$route.edit", ['id' => $model->getKey()])}}"
                                   class="btn btn-sm btn-success">Edit</a>
                                <form class="d-inline" method="post"
                                      action="{{route("$route.destroy", ['id' => $model->getKey()])}}">
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