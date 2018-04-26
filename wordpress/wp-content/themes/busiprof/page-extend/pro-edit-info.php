<?php
	global $wpdb;
	global $current_user;
	wp_get_current_user();
?>
<section class="edit-info admin-section">
	<h4>　</h4>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="project-edit-block">
					<div class="box">
						<div class="box-title">
							<h3>
								<i class="fa fa-cog"></i><span>您可以修改这个项目</span><div class="pull-right close-admin-section"><a class='close_the_edit_div' href="javascript:void(0)" title="点击关闭">×</a></div>
							</h3>
						</div>
						<div class="box-content">
							<section class="section-thumbs">
								<h4>项目设置</h4>
								<div class="btn-group">
									<a class="btn btn-default btn-sm" href="<?php echo home_url().'/edit-project/?'.$pro['post_title']; ?>">修改项目</a><a aria-expanded="false" aria-haspopup="true" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu">
										<li><a data-confirm="确定删除这个项目 ? ( 此删除操作不可撤销 ) " rel="nofollow" data-method="delete" href="<?php echo home_url().'/delete-pro/?'.$pro['post_title'] ?>">删除这个项目</a></li>
									</ul>
								</div>
							</section>
							<section class="section-thumbs">
								<h4>比赛信息</h4>
								<div class="project-contest-entry">
									<div class="project-contest-entry-name"><a href="">大赛名称</a></div><div class="project-contest-entry-status"><strong>状态:</strong>审核通过</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script> var close_edit_div = document.getElementsByClassName('close_the_edit_div')[0];close_edit_div.onclick = function(){ document.getElementsByClassName('edit-info')[0].setAttribute('style','display:none'); } </script>