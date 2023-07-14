<form action="{{ $url }}" method="get">
    @csrf
    @foreach ($fields as $field)
        @if (in_array($field, $select))
            @php
                $methodToInvoke = 'select' . Str::ucfirst($field);
                if (method_exists($instance, $methodToInvoke)) {
                    $valiny = call_user_func([$instance, $methodToInvoke]);
                } else {
                    echo 'la methode ' . $methodeToInvoke . ' est introuvable dans ' . instance->getClass();
                }
            @endphp

            @if (isset($valiny))
                @component('components.select-component')
                    {{-- Passer des données au composant si nécessaire --}}
                    @slot('label', $valiny['label'])
                    @slot('name', $valiny['name'])
                    @slot('intitule', $valiny['intitule'])
                    @slot('data', $valiny['data'])
                @endcomponent
            @endif
        @elseif (in_array($field, $between))
            <div class="form-outline mb-4">
                <input type="text" id="{{ 'max_input_' . $field }}" class="form-control" name="{{ 'min_' . $field }}" />
                <input type="text" id="{{ 'min_input_' . $field }}" class="form-control" name="{{ 'max_' . $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @elseif (in_array($field, $dates))
            <div class="form-outline mb-4">
                <input type="datetime-local" id="{{$field }}" class="form-control"
                    name="{{$field}}" />
                <label class="form-label" for="{{ $field }}">{{ $field }}</label>
            </div>
        @else
            <div class="form-outline mb-4">
                <input type="text" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @endif
    @endforeach
    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block mb-4">Search</button>
</form>
