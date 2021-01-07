<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
	<h2 @if($expand == true)data-open="true"@endif>{{ $list->label }} Requests</h2>
    <div class="ibm-container-body">
    	<table class="ibm-data-table ibm-altrows ibm-padding-small" width="100%" data-widget="datatableReady" id="{{ $list->id }}">
            <thead>
                <tr>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Ref</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Account</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Service Line</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Reason</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Title</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Details</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Week Ending</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Name</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Serial</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Country</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Hours</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Status</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">1st Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">2nd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">3rd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Requestor</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Approval Flow</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Squad Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Tribe Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Pre</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Post</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Claim Acc</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list->records as $key => $record)
                <tr>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->reference)
                    	{{ link_to_route('request.show', $record->reference, ['overtimeRequest' => $record->reference]) }}
                    @endisset
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0 ibm-bold">
                    	{{ $record->account }}
                    	@isset($record->comment)
                    		<p class="ibm-ind-link ibm-icononly">
                    		<a href="#" class="ibm-requestquote-link" data-widget="tooltip" data-contentid="preview-comments-{{ $record->reference }}-{{ $record->comment->reference }}" style="text-decoration: none;"></a>
                    		</p>
                    		<div id="preview-comments-{{ $record->reference }}-{{ $record->comment->reference }}" class="ibm-tooltip-content">
    							<p>{{ $record->comment->text }}</p>
                            	<p>{{ $record->comment->creator }}</p>
                            	<p>{{ $record->comment->created }}</p>
                            </div>
                        @endisset
                	</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->competency }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->nature }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->title }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    {{ Str::limit($record->details, 50, '') }}
                    @if(Str::length($record->details) >= 50)
	                    <a href="#" class="ibm-bold" data-widget="tooltip" data-contentid="preview-{{ $list->name }}-details-{{ $key }}" style="text-decoration: none;">(...)</a>
                        <div id="preview-{{ $list->name }}-details-{{ $key }}" class="ibm-tooltip-content">
                        	{{ $record->details }}
                        </div>
                    @endif
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->weekenddate }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->worker"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->serial }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->location }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->hours }}</td>
                    <td class="ibm-bold">{{ $record->status }}</td>
                    <x-request.approvers-info :record="$record"/>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->requestor"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->approval_mode }}
                    Change flow to...
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->approver_squad_leader"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0"><x-mailto-link :email="$record->approver_tribe_leader"/></td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->supercedes)
                    	{{ link_to_route('request.show', $record->supercedes, ['overtimeRequest' => $record->supercedes]) }}
                    @endisset
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">
                    @isset($record->supercededby)
                   		{{ link_to_route('request.show', $record->supercededby, ['overtimeRequest' => $record->supercededby]) }}
                    @endisset
                    </td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->claim_acc_id }}</td>
                    <td class="ibm-padding-top-0 ibm-padding-bottom-0">{{ $record->created_ts }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
	                <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Ref</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Account</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Service Line</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Reason</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Title</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Details</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Week Ending</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Name</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Serial</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Country</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Hours</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Status</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">1st Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">2nd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">3rd Level Approval</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Requestor</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Approval Flow</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Squad Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Tribe Leader</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Pre</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Post</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Claim Acc</th>
                    <th class="ibm-padding-top-0 ibm-padding-bottom-0" style="vertical-align: middle;">Created</th>
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
//         pageLength: -1;
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        ajax: {
        	async: false,
        	type: "POST",
            url: "{{ route('api.request.list') }}",
        	data: requestData,
//         	contentType: "application/json; charset=utf-8",
        	dataType: "json",
            dataSrc: "data"
        },
        deferLoading: {{ $list->records->total() }},

        /*
        createdRow: function( row, data, dataIndex, cells ) {
            if ( data[4] == "A" ) {
				$(row).addClass( 'important' );
    	    }
		},
		*/
        
        /*
        columnDefs: [ 

        	{
            	targets: 0,
            	createdCell: function (td, cellData, rowData, row, col) {
//                     if ( cellData < 1 ) {
                    	jQuery(td).css('color', 'red')
//                     }
				}
			},
        	{
            	targets: 1,
            	createdCell: function (td, cellData, rowData, row, col) {
//                     if ( cellData < 1 ) {
                		jQuery(td).css('color', 'blue')
//                 	   }
				}
			}
		],
		*/
        columns: [
			{
				data: 'reference'
// 					,
// 				render: function(data, type, row, meta) {
// // 	                data = '<a href="' + data.urls.item + '">' + data + '</a>';
// 	                return data;
// 	            }
			},
			{ data: 'account' },
			{ data: 'competency' },
			{ data: 'nature' },
			{ data: 'title' },
			{ 
				data: 'details',
				render: function(data, type, row, meta) {
					var rawData = data;
					if (data.length > 50) {
						data = data.substr( 0, 50 );
						data += '<a href="#" class="ibm-bold" data-widget="tooltip" data-contentid="preview-{{ $list->name }}-details-'+meta.col+'" style="text-decoration: none;">(...)</a>'
							+'<div id="preview-{{ $list->name }}-details-'+meta.col+'" class="ibm-tooltip-content">'
                        	+rawData+
                        	'</div>';
					}
					return data;
	            }
            },
			{ data: 'weekenddate' },
			{ 
				data: 'worker'
// 					,
				/* render: function(data, type, row, meta) {
					if (data.length > 0) {
	                	data = '<a href="mailto:' + data + '">' + data + '</a>';
					}
	                return data;
	            } */
			},
			{ data: 'serial' },
			{ data: 'location' },
			{ data: 'hours' },
			{ data: 'status' },
			{ 
				data: 'approver_first_level'
// 					,
// 				render: function(data, type, row, meta) {
// // 	                data = '<a href="' + row.urls.approve + '">' + data + '</a>';
// // 	                data += '<a href="' + row.urls.reject + '">' + data + '</a>';
// 	                return data;
// 	            }
			},
			{ 
				data: 'approver_second_level'
// 					,
// 				render: function(data, type, row, meta) {
// // 	                data = '<a href="' + row.urls.approve + '">' + data + '</a>';
// // 	                data += '<a href="' + row.urls.reject + '">' + data + '</a>';
// 	                return data;
// 	            }
			},
			{ 
				data: 'approver_third_level'
// 					,
// 				render: function(data, type, row, meta) {
// // 	                data = '<a href="' + row.urls.approve + '">' + data + '</a>';
// // 	                data += '<a href="' + row.urls.reject + '">' + data + '</a>';
// 	                return data;
// 	            }
			},
			{ 
				data: 'requestor'
// 					,
// 				render: function(data, type, row, meta) {
// 					if (data.length > 0) {
// 	                	data = '<a href="mailto:' + data + '">' + data + '</a>';
// 					}
// 	                return data;
// 	            }
			},
			{ data: 'approval_mode' },
			{ 
				data: 'approver_squad_leader'
// 					,
// 				render: function(data, type, row, meta) {
// 					if (data.length > 0) {
// 	                	data = '<a href="mailto:' + data + '">' + data + '</a>';
// 					}
// 	                return data;
// 	            }
			},
			{ 
				data: 'approver_tribe_leader'
// 					,
// 				render: function(data, type, row, meta) {
// 					if (data.length > 0) {
// 	                	data = '<a href="mailto:' + data + '">' + data + '</a>';
// 					}
// 	                return data;
// 	            }
			},
			{ data: 'supercedes' },
			{ data: 'supercededby' },
			{ data: 'claim_acc_id' },
			{ data: 'created_ts' }
        ]
    };

	// initialise widget
    IBMCore.common.widget.datatable.init('#{{ $list->id }}', params);

    IBMCore.common.widget.selectlist.init(document.getElementsByName("{{ $list->id }}_length"));
	
});
</script>