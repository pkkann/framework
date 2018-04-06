<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">

		<!-- jQuery -->
		<script src="libs/jquery/jquery-3.2.1.min.js"></script>

		<!-- Semantic-ui -->
		<link rel="stylesheet" href="libs/semantic-ui/semantic.min.css">
		<script src="libs/semantic-ui/semantic.min.js"></script>

		<!-- jQuery form -->
		<script src="libs/jqueryform/jquery.form.js"></script>
		
		<!-- jQuery toast -->
		<link rel="stylesheet" href="libs/toast/toast.css">
		<script src="libs/toast/toast.js"></script>
		
		<!-- Font awesome -->
		<link rel="stylesheet" href="libs/fontawesome/css/font-awesome.min.css">

		<!-- -->
		<link rel="stylesheet" href="libs/datatables/datatables.min.css">
		<script src="libs/datatables/datatables.min.js"></script>
		<script src="libs/datatables/datatables.da.js"></script>
	</head>
	<body>
		<?=$this->section('content')?>
		
		<div class="ui" id="loader">
			<div class="ui dimmer">
				<div class="ui text loader"></div>
			</div>
			<p></p>
		</div>
		<div id="toast"></div>
		
		<!-- ** Global functions ** -->
		<script>
		
			function toggleLoader() {
				if( $("#loader .dimmer").hasClass("active") ) {
					$("#loader .dimmer").removeClass("active");
				} else {
					$("#loader .dimmer").addClass("active");
				}
			}
		
		</script>
	</body>
</html>
