	<!-- Open Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!------------------------------------------------------------------------------------------------->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-info-circle"></i> <strong>Tentang</strong></h4>
				</div>
				<!------------------------------------------------------------------------------------------------->
				<div class="modal-body">
					Developed by Nurul Laeli Mahmudah
					<br><strong>Information System</strong>
					<br>&copy 2016
				</div>
				<!------------------------------------------------------------------------------------------------->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
				<!------------------------------------------------------------------------------------------------->
			</div>
		</div>
	</div>
	<!-- END of Modal -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap/dist/js/bootstrap-datepicker.js"></script>
	<script src="../assets/plugins/validator/js/bootstrapValidator.js"></script>
	<script src="../assets/plugins/chosen/chosen.jquery.js"></script>
	<script src="../assets/plugins/fileinput/fileinput.js"></script>
	<script src="../assets/js/jquery.maskedinput.min.js"></script>
	<script src="../assets/js/moment.min.js"></script>
	<!-- Fncybox untuk gambar -->
	<script src="../assets/plugins/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="../assets/js/style.js"></script>
	<script src="../assets/js/time.js"></script>
	<script src="../assets/js/bootstrap-button.js"></script>
	<script src="../assets/js/bootstrap-tooltip.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').DataTable({
		"pagingType": "full_numbers"		
        });
    });
    </script>
	
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	$('#datepicker')
		.datepicker({
			format: 'yyyy-mm-dd',
				autoclose : true,
				
	})
	      .on('changeDate', function(e) {
          // Revalidate the date field
          $('#validator').bootstrapValidator('revalidateField', 'tanggal_terbit');
    });
});
	</script>
	
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	$('#datepicker1')
		.datepicker({
			format: 'yyyy-mm-dd',
				autoclose : true,
				
	})
	      .on('changeDate', function(e) {
          // Revalidate the date field
          $('#validator').bootstrapValidator('revalidateField', 'tgl_instalasi');
    });
});
	</script>
	<!-- /.Javascript For Date -->
	<!-- Javascript For Modal -->
    <script>
	$(document).on("click", ".modalpesan", function () {
    var simpan = $(this).data('id');
    $(".modal-body #simpan").val( simpan );
	});
    </script>
	
	<script> 
	$.mask.definitions['~']='[+-]';
		$('.input-mask-phone').mask('(9999) 999-9999');
		$('.input-mask-fax').mask('(9999) 999-9999');
		$('.input-mask-date').mask('9999-99-99');
		$('.input-mask-bantex').mask('9999');
		
	$("#fileinput").fileinput({
		showUpload: false,
		showCaption: true,
		browseClass: "btn btn-primary btn-md",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});
	$("#sqlinput").fileinput({
		showUpload: false,
		showCaption: true,
		browseClass: "btn btn-success btn-md",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif','tiff'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
    });
	</script>
	<script>
	$(document).ready(function() {
		$('input[id="cek"]').click(function() {
			var index = $(this).attr('name').substr(3);
			index--;
			$('table tr').each(function() { 
				$('td:eq(' + index + ')',this).toggle();
			});
			$('th.' + $(this).attr('name')).toggle();
		});
	});
	</script>
	
	<!-- Autofill -->
    <script>
        $(document).ready(function(){

        });
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"100%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }



        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });
    </script>
	
	<!-- Javascript fancybox untuk gambar -->
    <script type="text/javascript">
	$(document).ready(function() {
	<!-- langkah 2) inisilasisasi fancybox Simple image gallery. Uses default settings -->
	$('.fancybox').fancybox();
	});
	</script>
	
	
</body>
</html>