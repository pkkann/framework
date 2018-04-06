<?php $this->layout('layouts::main') ?>

<style>
#users-wrap {
	
}
	#users-wrap .table_wrap {
		margin-top: 15px;
	}
		#users-wrap .table_wrap .table tbody tr {
			cursor: pointer;
		}
</style>

<div id="users-wrap">
	<div class="ui segment">
		<h2>Brugere</h2>
		<button class="green ui button" onclick="openNew()">Ny</button>
		<div class="table_wrap">
			<table class="ui inverted selectable table" id="userstable">
				<thead>
					<tr>
						<th>Navn</th>
						<th>Brugernavn</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
var table = $("#userstable").DataTable({
	"ajax": "?module=users&action=getall",
	"columns": [
		{ "data": "name", },
		{ "data": "username" }
	]
});

$("#userstable").on("click", "tr", function() {
	var data = table.row( this ).data();
	if(typeof(data) !== 'undefined') {
		openEdit(data.id);
	}
});
</script>

<?php $this->insert("views::newusermodal") ?>
<?php $this->insert("views::editusermodal") ?>