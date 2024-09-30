<thead class="fw-bold">
    <tr>
        @foreach($table->columns() as $column)
            <td @class([$column->headerAlignmentClass()])>{{ $column->label }}</td>
        @endforeach
    </tr>
</thead>
