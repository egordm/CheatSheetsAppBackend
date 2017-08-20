@component('elements.fields.component', compact('field', 'model', 'error'))
    <select id="{{$field->getName()}}" name="{{$field->getName()}}" class="form-control {{ !empty($error) ? 'is-invalid' : ''  }}">
        @foreach($field->getOptions() as $key => $value)
            <option {{($model != null && $field->getValue($model) == $key) ? 'selected' : ''}}
                    value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
@endcomponent