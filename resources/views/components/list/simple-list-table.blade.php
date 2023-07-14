<div class="table-responsive" id="Mytable">
    <table class="table table-hover align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                @foreach ($metaData['listHeader'] as $header)
                    <th> {{ $header }}</th>
                @endforeach
                @isset($children_additional_header)
                    {{ $children_additional_header }}
                @endisset
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    @foreach ($metaData['listCall'] as $call)
                        <td>
                            <p class="fw-normal mb-1">
                                @if (method_exists($item, $call))
                                    {{ call_user_func([$item, $call]) }}
                                @else
                                    {{ $item[$call] }}
                                @endif
                            </p>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination-block mt-3 ">
    {{ $data->links('layouts.pagination') }}
</div>


<script>
    function appendColumns() {
        let table = document.getElementById('Mytable');
        let extraColumnsTable= document.getElementById('display-none').firstElementChild;
        let extraColrows = extraColumnsTable.rows;
        let tableRows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        for (let i = 0; i < tableRows.length; i++) {
            let row = tableRows[i];
            let extraColrow = extraColrows[i];
            let extraColcells = extraColrow.cells;
            for (let j = 0; j < extraColcells.length; j++) {
                let cell = row.insertCell(-1);
                cell.innerHTML = extraColcells[j].innerHTML;
            }
        }
    }
</script>


@if (isset($children_additional_column))
    <div style="display: none;" id="display-none">
        {{ $children_additional_column }}
    </div>
    <script>
        appendColumns();
    </script>
@endif

