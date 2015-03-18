$(document).ready(function() {
   
   	$(".connectedSortable").sortable({ // begin sortable
		connectWith: ".connectedSortable",
		dropOnEmpty: true,
		receive: function(event, ui) { // begin receive
			var id = $(ui.item).attr('id');
			var group = this.id;
			//alert( ui.item.closest('ul').attr('id'));
			$.ajax({ // begin ajax
			   url: "update_group.php",
			   type: "GET",
			   data: {
				'id': id,
				'group': group
				},
			}); // end ajax
		}, // end receive
	}) // end sortable
	
/*	$('li').on('mousedown', function() {
		$(this).css(
			{
				'backgroundColor' : 'black',
				'color' : 'white'
			}
		);
	}).on('mouseup', function() {
		$('li').css(
			{
				'backgroundColor' : '',
				'color' : ''
			}
		)
	});*/
    
});