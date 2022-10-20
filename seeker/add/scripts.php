    <!-- Bootstrap core JavaScript-->
    <script src="add/vendor/jquery/jquery.min.js"></script>
    <script src="add/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="add/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="add/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="add/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="add/js/demo/chart-area-demo.js"></script>
    <script src="add/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	
	<script src = "add/js/jquery.dataTables.js"></script>
	<script src = "add/js/chosen.jquery.min.js"></script>	
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#student").chosen({ width:"auto" });	
		})
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
        <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
  if (!form.checkValidity()) {
  event.preventDefault()
  event.stopPropagation()
  }
  form.classList.add('was-validated')
  }, false)
  })
  })()
</script> 