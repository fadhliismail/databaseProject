<!DOCTYPE html>
<html>
<head lang="en">
	<title>Manage Group</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Custom CSS -->
	<link rel ="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Custom styles for this template -->
	<link href="sticky-footer-navbar.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- drag n drop CSS -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

	<style>
		#student { float: left; width: 65%; min-height: 12em; }
		.student.custom-state-active { background: #eee; }
		.student li { float: left; width: 96px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
		.student li h5 { margin: 0 0 0.4em; cursor: move; }
		.student li a { float: right; }
		.student li a.ui-icon-zoomin { float: left; }
		.student li img { width: 100%; cursor: move; }

		#group { float: right; width: 32%; min-height: 18em; padding: 1%; }
		#group h4 { line-height: 16px; margin: 0 0 0.4em; }
		#group h4 .ui-icon { float: left; }
		#group .student h5 { display: none; }
	</style>
	<script>
		$(function() {
    // there's the student and the group
    var $student = $( "#student" ),
    $group = $( "#group" );

    // let the student items be draggable
    $( "li", $student ).draggable({
      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
      revert: "invalid", // when not dropped, the item will revert back to its initial position
      containment: "document",
      helper: "clone",
      cursor: "move"
  });

    // let the group be droppable, accepting the student items
    $group.droppable({
    	accept: "#student > li",
    	activeClass: "ui-state-highlight",
    	drop: function( event, ui ) {
    		deleteImage( ui.draggable );
    	}
    });

    // let the student be droppable as well, accepting items from the group
    $student.droppable({
    	accept: "#group li",
    	activeClass: "custom-state-active",
    	drop: function( event, ui ) {
    		recycleImage( ui.draggable );
    	}
    });

    // image deletion function
    var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
    function deleteImage( $item ) {
    	$item.fadeOut(function() {
    		var $list = $( "ul", $group ).length ?
    		$( "ul", $group ) :
    		$( "<ul class='student ui-helper-reset'/>" ).appendTo( $group );

    		$item.find( "a.ui-icon-group" ).remove();
    		$item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
    			$item
    			.animate({ width: "48px" })
    			.find( "img" )
    			.animate({ height: "36px" });
    		});
    	});
    }

    // image recycle function
    var group_icon = "<a href='link/to/group/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-group'>Delete image</a>";
    function recycleImage( $item ) {
    	$item.fadeOut(function() {
    		$item
    		.find( "a.ui-icon-refresh" )
    		.remove()
    		.end()
    		.css( "width", "96px")
    		.append( group_icon )
    		.find( "img" )
    		.css( "height", "72px" )
    		.end()
    		.appendTo( $student )
    		.fadeIn();
    	});
    }

    // image preview function, demonstrating the ui.dialog used as a modal window
    function viewLargerImage( $link ) {
    	var src = $link.attr( "href" ),
    	title = $link.siblings( "img" ).attr( "alt" ),
    	$modal = $( "img[src$='" + src + "']" );

    	if ( $modal.length ) {
    		$modal.dialog( "open" );
    	} else {
    		var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
    		.attr( "src", src ).appendTo( "body" );
    		setTimeout(function() {
    			img.dialog({
    				title: title,
    				width: 400,
    				modal: true
    			});
    		}, 1 );
    	}
    }

    // resolve the icons behavior with event delegation
    $( "ul.student > li" ).click(function( event ) {
    	var $item = $( this ),
    	$target = $( event.target );

    	if ( $target.is( "a.ui-icon-group" ) ) {
    		deleteImage( $item );
    	} else if ( $target.is( "a.ui-icon-zoomin" ) ) {
    		viewLargerImage( $target );
    	} else if ( $target.is( "a.ui-icon-refresh" ) ) {
    		recycleImage( $item );
    	}

    	return false;
    });
});
</script>

</head>

<body>
	<!-- navigation bar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="presentation"><a href="admin.php">Admin</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Manage Group</a></li>
							<li><a href="#">Manage Assessment</a></li>

						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#logout">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container">
		<div class="page-header"><h1>Manage Student Group</h1></div>
		<p>Below is a list of student names. You can key in the number of groups you wish to make. You can drag the student name into the the container group to assign the group to the student.</p>
		<div class="page-title">Assign Students to Group</div>

		<div class="ui-widget ui-helper-clearfix">

			<ul id="student" class="student ui-helper-reset ui-helper-clearfix">
				<li class="ui-widget-content ui-corner-tr">
					<h5 class="ui-widget-header">High Tatras</h5>
					<a href="link/to/group/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-group">Delete image</a>
				</li>
				<li class="ui-widget-content ui-corner-tr">
					<h5 class="ui-widget-header">High Tatras 2</h5>
					<a href="link/to/group/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-group">Delete image</a>
				</li>
				<li class="ui-widget-content ui-corner-tr">
					<h5 class="ui-widget-header">High Tatras 3</h5>
					<a href="link/to/group/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-group">Delete image</a>
				</li>
				<!-- <li class="ui-widget-content ui-corner-tr">
					<h5 class="ui-widget-header">High Tatras 4</h5>
					<img src="images/high_tatras4_min.jpg" alt="On top of Kozi kopka" width="96" height="72">
					<a href="images/high_tatras4.jpg" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
					<a href="link/to/group/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-group">Delete image</a>
				</li> -->
			</ul>

			<div id="group" class="ui-widget-content ui-state-default">
				<h4 class="ui-widget-header"><span class="ui-icon ui-icon-group">Group</span> Group</h4>
			</div>

		</div>
		
	</div>
	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<p class="text-muted">GC06 Database Project. Copyright © Team 24, UCL2015.</p>
		</div>
	</footer>

	
	


</body>
</html>