</head>
<body>
<main class="container" dir="rtl">
	<h2>עדכון כתובת</h2>

	<h3 id="db_error" class="error"></h3>
	<h3 id="success" class="success"></h3>

	<h3>שלום, <?php echo $name ?></h3>
	<?php echo form_open('Customers/update_address', array('id'=>'details_form')); ?>
	<div class="row mb-4">
		<div class="col-md-2">
			<div class="form-outline">
				<label>רחוב</label>
				<input type="input" name="street" /><br>
				<span id="street_error" class="error"></span>
				<label>מספר בית</label>
				<input type="input" name="house"/><br>
				<span id="house_error" class="error"></span>
				<label>עיר</label>
				<input type="input" name="city"/><br>
				<span id="city_error" class="error"></span>
				<label>מיקוד</label>
				<input type="input" name="zip"/><br>
				<span id="zip_error" class="error"></span>
			</div>
		</div>
	</div>
	<input class="createForm" type="submit" id="save" name="submit" value="שמירה"/>
	<input id="cancel" class="createForm" type="button"  value="ביטול" />
	<?php echo form_close(); ?>
</main>
<script>
	$(document).ready(function () {

		$('#details_form').on('submit', function (event) {
			event.preventDefault();

			$.ajax({
				url: "<?php echo base_url(); ?>Customers/update_address",
				method: "POST",
				data: $(this).serialize(),
				dataType: "json",
				success: function (data){
					if(data.error){
						$('#success').html('');
						if(data.street_error != ''){
							$('#street_error').html(data.street_error);
						}
						else{
							$('#street_error').html('');
						}
						if(data.house_error != ''){
							$('#house_error').html(data.house_error);
						}
						else{
							$('#house_error').html('');
						}
						if(data.city_error != ''){
							$('#city_error').html(data.city_error);
						}
						else{
							$('#city_error').html('');
						}
						if(data.zip_error != ''){
							$('#zip_error').html(data.zip_error);
						}
						else{
							$('#zip_error').html('');
						}
						if(data.db_error != ''){
							$('#db_error').html(data.db_error);
						}
						else{
							$('#db_error').html('');
						}
					}
					if (data.success){
						window.location.href = "<?php echo site_url($_SESSION['referrer']); ?>";
					}
				}
			})
		});

		$('#cancel').on('click', function (){
			window.location.href = "<?php echo site_url(); ?>";

		});
	});
</script>
