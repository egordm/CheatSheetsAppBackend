<div class="form-group row">
    <label for="{{$field->getName()}}" class="col-sm-2 form-control-label">{{$field->getLabel()}}</label>
    <div class="col-sm-10">
        {{$slot}}
        <div class="invalid-feedback">
            {{$error}}
        </div>
    </div>
</div>