<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Delegates List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>User Intranet</th>
                    <th>Delegate Intranet</th>
                    <th>Delegate Notes Id</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                	<td><p class="ibm-ind-link ibm-icononly ibm-nospacing">
                    @isset($record->user_intranet)
                    	{{ link_to_route('admin.delegate.edit', '', ['user_intranet' => Str::of($record->user_intranet)->trim(), 'delegate_intranet' => Str::of($record->delegate_intranet)->trim()], ['class' => 'ibm-edit-link']) }}
                    @endisset
                    </p></td>
                	<td>{{ $record->user_intranet }}</td>
                    <td>{{ $record->delegate_intranet }}</td>
                    <td>{{ $record->delegate_notesid }}</td>
                    <td><p class="ibm-ind-link ibm-icononly ibm-nospacing"><a class="ibm-close-link" href="{{-- route('admin.delegate.delete', ['ref' => '1']) --}}"></a></p></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Edit</th>
                    <th>User Intranet</th>
                    <th>Delegate Intranet</th>
                    <th>Delegate Notes Id</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>