$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'acno'], [2, 'name'], [3, 'col_date'], [4, 'test'], [5, 'fax'], [6, 'col_loc'], [7, 'initials']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});



