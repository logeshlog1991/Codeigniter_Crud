<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Console</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo WEB_DIR;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo WEB_DIR;?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo WEB_DIR;?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo WEB_DIR;?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo WEB_DIR;?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           <?php $this->load->view('header'); ?>  
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                   <?php $this->load->view('sidebar'); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $this->lang->line('Call_Center_Agents_List'); ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>
				 <section class="content">
					<div class="row">
                        <div class="col-md-6" style="width:100% !important;">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
									<li style="width: 24% !important;font-size:16px;font-family:bold:helica;"><a href="<?php echo WEB_URL;?>index/callcenter_agentlist"><?php echo $this->lang->line('Call_Center_Agents'); ?></a></li>
									<li style="width: 24% !important;font-size:16px;font-family:bold:helica;"><a href="<?php echo WEB_URL;?>index/Active_ccagents_list"><?php echo $this->lang->line('Active_CallCenter_Agents'); ?> </a></li>
									<li style="width: 24% !important;font-size:16px;font-family:bold:helica;"><a href="<?php echo WEB_URL;?>index/InActive_ccagents_list">  <?php echo $this->lang->line('InActive_CallCenter_Agents'); ?> </a></li>
									<li class="active" style="width: 24% !important;font-size:16px;font-family:bold:helica;"><a href="javascript:void(0);"> <?php echo $this->lang->line('CallCenter_Credit'); ?></a></li>
							</div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->
                    </div> <!-- /.row -->
					
						<!-- Main content -->
						<section class="content">
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-header">
											<div class="box-header" style="text-align:right;position:relative;right:12px;"><br/>
												<div class="form-group">
													<form enctype="multipart/form-data" class="form-horizontal add_hotel_form" action="<?php echo WEB_URL;?>index/callcenter_credit_Ad" id="formid" method="post" onsubmit="return callcenter_credit()">
														  <label class="col-xs-12 col-md-3 control-label" for="textinput"><?php echo $this->lang->line('Call_Center_Agents'); ?></label>  
														  <div class="col-xs-12 col-md-4">
																<select id="callcenter_id" name="callcenter_id" class="form-control input-md" onchange="get_credit()">
																	<option value="">-Select Callcenter-</option>
																	<?php 
																		if(isset($callcenter_agents1) && $callcenter_agents1!=''){ 
																			foreach($callcenter_agents1 as $value){
																	?>
																		<option value="<?php echo $value->callagent_id; ?>"><?php echo $value->name;?></option>
																	<?php 
																			}	 
																		}
																	?>
																</select>
																<span style="color:red;" id="error_pc"></span>
														  </div>
														</div><br/><br/>
														<div class="form-group">
														  <label class="col-xs-12 col-md-3 control-label" for="textinput"><?php echo $this->lang->line('Credit'); ?></label>  
														  <div class="col-xs-12 col-md-4">
																<input id="credit" name="credit" placeholder="Credit" class="form-control input-md" type="text" value="">
																<span style="color:red;" id="error_credit"></span>
														  </div>
														</div><br/><br/>
														<input type="hidden" id="web_url" value="<?php echo base_url(); ?>"> 
														<div class="form-group">
														  <label class="col-xs-12 col-md-3 control-label" for="textinput"></label>  
															<div class="col-xs-12 col-md-4">
																  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Submit'); ?></button>
															</div>
														</div>
												</form>
											</div>
											<h3 class="box-title"></h3></div>
											<div class="box-add" style="text-align:right;position:relative;right:12px;">
											</div><!-- /.box-header -->
										<div class="box-body table-responsive">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('no'); ?></th>
														<th><?php echo $this->lang->line('name'); ?></th>
														<th><?php echo $this->lang->line('Credit'); ?></th>
														<th><?php echo $this->lang->line('Status'); ?></th>
														<th><?php echo $this->lang->line('Action'); ?></th>
												</tr>
												</thead>
												<tbody>
													<?php 
														$i=1;
														if(isset($callcenter_agents) && $callcenter_agents!=''){ 
															foreach($callcenter_agents as $value){ 
														?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $value->name; ?></td>
														<td><?php echo $value->credit; ?></td>
														<td><?php if($value->status==1){ echo "Active";}else{ echo "InActive"; } ?></td>
														<td><?php if($value->status!=1){ ?> <a href="<?php echo WEB_URL;?>index/callcenter_credit_active/<?php echo $value->callcenter_agent_id; ?>"><?php echo $this->lang->line('Active'); ?></a><?php }else{ ?><a href="<?php echo WEB_URL;?>index/callcenter_credit_inactive/<?php echo $value->callcenter_agent_id; ?>"><?php echo $this->lang->line('InActive'); ?></a><?php } ?>&nbsp;&nbsp;</td>
													</tr>
													<?php 
															$i++;
															}
														}
													?>
												</tbody>
											</table>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</div>
							</div>
						</section><!-- /.content -->
				</aside><!-- /.right-side -->
			</div><!-- ./wrapper -->
		<!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo WEB_DIR;?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo WEB_DIR;?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo WEB_DIR;?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Admin App -->
        <script src="<?php echo WEB_DIR;?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Admin for demo purposes -->
        <script src="<?php echo WEB_DIR;?>js/AdminLTE/demo.js" type="text/javascript"></script>
        <script src="<?php echo WEB_DIR;?>js/custom.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
	</body>
</html>