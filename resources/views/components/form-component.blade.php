<form action="/insert/{{ $modeling->actionModel }}" method="post" enctype="multipart/form-data">
    @csrf
    @foreach ($modeling->fields as $field)
        <input type="hidden" name="model" value="{{ $modeling->actionModel }}">

        @if (in_array($field, $modeling->select))
            @php
                $methodToInvoke = 'select' . Str::ucfirst($field);
                if (isset($modeling->callableMethod[$methodToInvoke])) {
                    $valiny = $modeling->callableMethod[$methodToInvoke]();
                } else {
                    echo 'la methode ' . $field . ' est introuvable';
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
        @elseif (in_array($field, $modeling->date))
            <div class="form-outline mb-4">
                <input type="date" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @elseif (in_array($field, $modeling->datetime))
            <div class="form-outline mb-4">
                <input type="datetime-local" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @elseif (in_array($field, $modeling->img))
            <div class="form-outline mb-4">
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
                <input type="file" name="{{ $field }}" accept="image/*">
            </div>
        {{-- @elseif (in_array($field, $modeling->file))
            <div class="form-outline mb-4">
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
                <input type="file" name="{{ $field }}" >
            </div> --}}
        @else
            <div class="form-outline mb-4">
                <input type="text" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @endif
    @endforeach
    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block mb-4">{{ $modeling->intituleBtn }}</button>
</form>
