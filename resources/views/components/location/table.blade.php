<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Locations List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Location</th>
                    <th>Shore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                	<td><p class="ibm-ind-link ibm-icononly ibm-nospacing">
                    @isset($record->user_intranet)
                    	{{ link_to_route('admin.location.edit', '', ['location' => Str::of($record->location)->trim(), 'shore' => Str::of($record->shore)->trim()]) }}
                    @endisset
                    </p></td>
                	<td>{{ $record->location }}</td>
                    <td>{{ $record->shore }}</td>
                    <td><p class="ibm-ind-link ibm-icononly ibm-nospacing"><a class="ibm-close-link" href="{{-- route('admin.location.delete', ['ref' => '1']) --}}"></a></p></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Edit</th>
                    <th>Location</th>
                    <th>Shore</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>