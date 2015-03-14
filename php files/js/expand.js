 $(document).ready(function(){
 	$("#student tr:odd").addClass("odd");
 	$("#student tr:not(.odd)").hide();
 	$("#student tr:first-child").show();
 	
 	$("#student tr.odd").click(function(){
 		$(this).next("tr").toggle();
 		$(this).find(".arrow").toggleClass("up");
 	});
            //$("#student").jExpand();
        });