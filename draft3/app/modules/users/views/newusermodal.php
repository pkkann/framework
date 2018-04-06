<?php 
$content = '
<form class="ui form" id="newuserform" method="post" action="'.action("users", "create").'">
	<div class="field">
		<label>Navn</label>
		<input type="text" name="name" value="">
	</div>
	<div class="field">
		<label>Brugernavn</label>
		<input type="text" name="username" value="">
	</div>
	<div class="field">
		<label>Adgangskode</label>
		<input type="password" name="pass" value="">
	</div>
	<div class="field">
		<label>Gentag adgangskode</label>
		<input type="password" name="pass2" value="">
	</div>
</form>
';

$actions = array(
	'<div class="ui left floated cancel button">Annuller</div>',
	'<div class="ui green button" id="createBTN">Opret</div>'
);

$options = array(
	'size' => "tiny"
);

$this->insert("layouts::modal", [
	'id' => "newModal", 
	'title' => "Ny bruger", 
	'content' => $content, 
	'actions' => $actions, 
	'options' => $options
]); 
?>

<script>
$('#newModal').modal();

function openNew() {
	$('#newModal').modal('show');
}

$("#createBTN").click(function() {
	$(this).addClass("loading");
	$("#newuserform").submit();
});

$("#newuserform").ajaxForm({
    success: function(e) {
        if(e.error) {
			$("#createBTN").removeClass("loading");
			toast(e.error, {color: "danger"})
		} else {
			$("#createBTN").removeClass("loading");
			$('#newModal').modal("hide");
			toast("Brugeren blev oprettet", {color: "success"})
			location.href="?module=users&action=index";
		}
    }
});
</script>