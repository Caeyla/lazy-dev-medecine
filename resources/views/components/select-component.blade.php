<div class="form-group">
    <label class="form-label" for="select">{{$label}}</label>
    <select id="select" class="form-control" name="{{ $name }}">
        <option value={{null}}>Select - {{ $label }}</option>
        @foreach ($data as $item)
            <option value="{{ $item->id }}">
                @if (method_exists($item, $intitule))
                    {{ call_user_func([$item, $intitule]) }}
                @else
                    {{ $item->$intitule }}
                @endif
            </option>
        @endforeach
    </select>
    <br />
</div>
