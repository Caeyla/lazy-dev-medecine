<form action="/edit/{{ $model }}/{{$instance->id}}" method="post">
    @csrf
    @foreach ($instance->createModeling->fields as $field)
        <input type="hidden" name="model" value="{{ $model }}">

        @if (in_array($field,$instance->createModeling->select))
            @php
                $methodToInvoke = 'select' . Str::ucfirst($field);
                if (method_exists($instance, $methodToInvoke)) {
                    $valiny = call_user_func([$instance, $methodToInvoke]);
                } else {
                    echo 'la methode ' . $methodeToInvoke . ' est introuvable dans ' . $instance->getClass();
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
        @else
            <div class="form-outline mb-4">
                    <input type="text" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" value="{{$instance->$field}}"
                         />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @endif
    @endforeach
    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block mb-4">Update</button>
</form>
