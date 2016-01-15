<div class="col-xs-12" >
	<div class="row coe-main-header-classic" >
		<div class="col-xs-12" >
			<span class="color-white" > <b> កម្មវិធីគ្រប់គ្រងបណ្ណាល័យ  </b>LIBRARY MANAGEMENT SYSTEM​​<i> Version 1.0 </i> </span>
			
      <span class="pull-right color-white">
				 <!-- Some statement here -->
         <?php if ($this->session->userdata('loged_in')){ ?>
				 <?= $this->session->userdata('name_khmer') ?> | <a href="<?= base_url() ?>authorize/logout">logout</a>
         <?php } ?>
			</span>

		</div>
	</div>
</div>

<div id="about" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="confirm-title" >អំពីហើយ</h4>
      </div>
      <div class="modal-body" id="confirm-body">
      	<b>Group 1</b>
      	<ol>
      		<li>Kung phanith</li>
      		<li>Ken Chhaly</li>
      		<li>Hor Sreymey</li>
      		<li>Mann Sovandara</li>
      		<li>Him Muslim</li>
      	</ol>
      </div>
      <div class="modal-footer">
        <button type="button" id="confirm-no" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
