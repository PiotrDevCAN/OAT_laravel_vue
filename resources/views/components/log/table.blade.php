<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
    <h2 data-open="true">{{ $list->label }} Entries</h2>
    <div class="ibm-container-body">
    	<table class="ibm-data-table ibm-altrows ibm-padding-small" width="100%" data-widget="datatableReady" id="{{ $list->id }}">
            <thead>
                <tr>
                    <th>Log Entry</th>
                    <th>Last Updated</th>
                    <th>Last Updater</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($list->records as $key => $record)
                <tr>
                    <td>{{ $record->log_entry }}</td>
                    <td>{{ $record->last_updated }}</td>
                    <td>{{ $record->last_updater }}</td>
	            </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Log Entry</th>
                    <th>Last Updated</th>
                    <th>Last Updater</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
jQuery( document ).ready(function() {

	var requestData = {
		requestType: "{{ $list->id }}"
	};
	
	var params = {
    	scrollaxis: "x", 
    	info: true,
    	ordering: true, 
    	paging: true, 
    	searching: true,
    	processing: true,
        serverSide: true,
        ajax: {
        	async: false,
        	type: "POST",
            url: "{{ route('api.log.list') }}",
        	data: requestData,
//         	contentType: "application/json; charset=utf-8",
        	dataType: "json",
            dataSrc: "data"
        },
        deferLoading: {{ $list->records->total() }},
        columns: [
			{ data: 'log_entry' },
			{ data: 'last_updater' },
			{ data: 'last_updated' }
        ]
    };

	// initialise widget
    IBMCore.common.widget.datatable.init('#{{ $list->id }}', params);

    IBMCore.common.widget.selectlist.init(document.getElementsByName("{{ $list->id }}_length"));

});
</script>