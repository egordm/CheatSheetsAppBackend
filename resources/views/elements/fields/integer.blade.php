@component('elements.fields.component', compact('field', 'model', 'error'))
    <input id="{{$field->getName()}}" type="number" class="form-control" name="{{$field->getName()}}"
           value="{{ ($model != null) ? $field->getValue($model) : ''  }}">
@endcomponent