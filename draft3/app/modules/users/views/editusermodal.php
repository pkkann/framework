<?php
$content = '
<form class="ui form" id="edituserform" method="post" action="'.action("users", "save").'">
	<input type="hidden" name="id" value="">
	<div class="field">
		<label>Navn</label>
		<input type="text" name="name" value="">
	</div>
	<div class="field">
		<label>Brugernavn</label>
		<input type="text" disabled name="username" value="">
	</div>
</form>
';

$actions = array(
	'<div class="ui left floated cancel button">Annuller</div>',
	'<div class="ui red button">Slet</div>',
	'<div class="ui orange button">Skift adgangskode</div>',
	'<div class="ui green button" id="saveBTN">Gem</div>'
);

$options = array(
	'size' => "tiny"
);

$this->insert("layouts::modal", [
	'id' => "editModal", 
	'title' => "Rediger bruger", 
	'content' => $content, 
	'actions' => $actions, 
	'options' => $options
]);

?>

<script>

function openEdit(id) {
	$('#editModal #edituserform input').val("");
	$('#editModal #edituserform').addClass("loading");
	$('#editModal .button').not(".cancel").addClass("disabled");
	
	$("#editModal").modal("show");
	$.get( "?module=users&action=get&id="+id, function( data ) {
		$('#editModal #edituserform input[name=id]').val(data.id);
		$('#editModal #edituserform input[name=name]').val(data.name);
		$('#editModal #edituserform input[name=username]').val(data.username);
		
		$('#editModal #edituserform').removeClass("loading");
		$('#editModal .button').removeClass("disabled");
	});
}

$("#editModal #saveBTN").click(function() {
	$("#editModal #saveBTN").addClass("loading");
	$("#edituserform").submit();
});

$("#editModal #edituserform").ajaxForm({
	success: function(e) {
		if(e.error) {
			$("#editModal #saveBTN").removeClass("loading");
			toast(e.error, {color: "danger"});
		} else {
			$("#editModal #saveBTN").removeClass("loading");
			toast("Brugeren blev gemt", {color: "success"});
		}
	}
});
</script>