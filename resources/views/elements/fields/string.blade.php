@component('elements.fields.component', compact('field', 'model', 'error'))
    <input id="{{$field->getName()}}" class="form-control {{ !empty($error) ? 'is-invalid' : ''  }}"
           name="{{$field->getName()}}" value="{{ ($model != null) ? $field->getValue($model) : ''  }}">
@endcomponent