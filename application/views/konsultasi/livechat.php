<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Konsultasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Konsultasi</li>
        </ol>
    </section>
        <!-- Main content -->
        <section class="content">
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item blue darken-4 " ><i class="fa fa-users"></i> Chatt List</li>
                <a href="#" style="text-decoration:none" >
					<li class="list-group-item "  id="aktif-hilman"  ></i> Hilman Lesmana</li></a>
                    <a href="#" style="text-decoration:none" > 
                    <li class="list-group-item "  id="aktif-hilman"  ></i> Sapo</li></a>
                    <a href="#" style="text-decoration:none" >
                    <li class="list-group-item "  id="aktif-hilman"  ></i> GRoot</li></a>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading  blue darken-4" ><i class="fa fa-comments"></i> Chatt Box</div>
				<div class="panel-body" style="height:400px;overflow-y:auto" id="box">
					<div id="chat-box">
						<div class='panel-body'><h2 style='text-align:center;color:grey'>Click User on Chatt List to Start Chatt</h2></div>
						<!--br/>
						<div id="loading" style="display:none"><center><i class="fa fa-spinner fa-spin"></i> Loading...</center></div>
						</br !-->
					</div>
				</div>
				<div class="panel-footer" style="display:none">
					<div class="row">
						<div class="col-md-12">
							<textarea class="form-control " id="pesan" style="margin-right:10px;"></textarea>
							<button id="send" type="button" class="btn btn-primary pull-right" style="margin-top:10px;"  onClick="sendMessage()" ><i class="fa fa-send"></i> Send Message</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /.content-wrapper -->
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#chatTable').DataTable({
            'order': [],
        });

        $("#konsultasiMainNav").addClass('active');
        $("#liveChat").addClass('active');
    });
</script>