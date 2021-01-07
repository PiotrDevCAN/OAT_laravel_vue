<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">Accounts List</h2>
    <div class="ibm-container-body">
        <table class="ibm-data-table ibm-altrows ibm-padding-small" data-scrollaxis="x" data-info="true" data-ordering="true" data-paging="true" data-searching="true" data-widget="datatable" id="{{ $name }}">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Account</th>
                    <th>Approver</th>
                    <th>Verified</th>
                    <th>Location</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $record)
                <tr>
                    <td><p class="ibm-ind-link ibm-icononly ibm-nospacing">
                    @isset($record->account)
                    	{{ link_to_route('admin.account.edit', '', ['account_name' => Str::of($record->account)->trim(), 'location' => Str::of($record->location)->trim()], ['class' => 'ibm-edit-link']) }}
                    @endisset
                    </p></td>
                    <td>{{ $record->account }}</td>
                    <td>{{ $record->approver }}</td>
                    <td>{{ $record->verified }}</td>
                    <td>{{ $record->location }}</td>
                    <td><p class="ibm-ind-link ibm-icononly ibm-nospacing"><a class="ibm-close-link" href="{{-- route('admin.account.delete', ['ref' => '1']) --}}"></a></p></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Edit</th>
                    <th>Account</th>
                    <th>Approver</th>
                    <th>Verified</th>
                    <th>Location</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>