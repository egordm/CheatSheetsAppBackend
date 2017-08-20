@component('elements.fields.component', compact('field', 'model', 'error'))
    <textarea id="{{$field->getName()}}" name="{{$field->getName()}}" rows="9" class="form-control {{ !empty($error) ? 'is-invalid' : ''  }}"
    >{{ ($model != null) ? $field->getValue($model) : ''  }}</textarea>
@endcomponent