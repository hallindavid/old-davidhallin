<div class="mt-4 w-full overflow-hidden">
    <span class="text-green-400 inline">dave@localhost:~$</span>
    <p class="typing items-center pl-2 inline">mysql -e "{{ $query }}"</p>
    @php
        $heading_line = '|';
        $markup_line = '+';
        foreach($cols as $col) {
            $markup_line .= str_pad('', $col['width'], '-', STR_PAD_BOTH) . '+';
            $heading_line .= str_replace(' ', '&nbsp;',str_pad(" " . $col['heading'], $col['width'], ' ', STR_PAD_RIGHT)) . '|';
        }

        foreach($data_items as $line) {
            $new_line = '|';
            $col_index = 0;
            foreach($line as $line_part) {
                $new_line .= str_replace(' ', '&nbsp;',str_pad(" " . $line_part, $cols[$col_index]['width'], ' ', STR_PAD_RIGHT)) . '|';
                $col_index++;
            }
            $data_lines[] = $new_line;
        }
    @endphp

    <p class="font-mono typing items-center pl-2 py-0 my-0">{!! $markup_line !!}</p>
    <p class="font-mono typing items-center pl-2 py-0 my-0">{!! $heading_line !!}</p>
    <p class="font-mono typing items-center pl-2 py-0 my-0">{!! $markup_line !!}</p>

    @foreach($data_lines as $line)
        <p class="font-mono typing items-center pl-2 py-0 my-0">{!! $line !!}</p>
    @endforeach
    <p class="font-mono typing items-center pl-2 py-0 my-0">{!! $markup_line !!}</p>
</div>