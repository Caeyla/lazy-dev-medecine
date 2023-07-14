<form action="{{ $data['link'] }}" method="post">
    @csrf
    @isset($top_additional_content)
        {{ $top_additional_content }}
    @endisset
    @foreach ($data['fields'] as $field)
        @if (isset($data['date']) && in_array($field, $data['date']))
            <div class="form-outline mb-4">
                <input type="date" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @elseif (isset($data['datetime']) && in_array($field, $data['datetime']))
            <div class="form-outline mb-4">
                <input type="datetime-local" id="{{ 'input_' . $field }}" class="form-control"
                    name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @else
            <div class="form-outline mb-4">
                <input type="text" id="{{ 'input_' . $field }}" class="form-control" name="{{ $field }}" />
                <label class="form-label" for="{{ 'input_' . $field }}">{{ $field }}</label>
            </div>
        @endif
    @endforeach
    @isset($bottom_additionnal_content)
        {{ $bottom_additionnal_content }}
    @endisset

    <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block mb-4">{{ $data['buttonLabel'] }}</button>
</form>
