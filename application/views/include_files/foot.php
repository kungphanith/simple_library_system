		<div id="confirm-modal" class="modal fade coe-modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">បញ្ជាក់</h4>
					</div>
					<div class="modal-body" id="confirm-text" style="font-size: 15px;" >
						<!-- body -->
					</div>
					<div class="modal-footer">
						<button type="button" id="confirm-yes" class="btn btn-coe-white" data-dismiss="modal">យល់ព្រម</button>
						<button type="button" id="confirm-no" class="btn btn-coe-white" data-dismiss="modal">បោះបង់</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function confirm(body, event){
				$('#confirm-text').html(body);
				$('#confirm-yes').attr('onclick',event);
				$('#confirm-modal').modal();
			}
		</script>

	</body>
</html>
