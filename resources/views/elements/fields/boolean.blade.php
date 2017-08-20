@component('elements.fields.component', compact('field', 'model', 'error'))
    <div class="checkbox">
        <input type="checkbox" id="{{$field->getName()}}" name="{{$field->getName()}}" class="{{ !empty($error) ? 'is-invalid' : ''  }}"
                {{ ($model != null && $field->getValue($model)) ? 'checked' : '' }}>
    </div>
@endcomponent