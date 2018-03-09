<?php
global $wpdb;
if($_GET['edit']){
	$my_post = get_post($_GET['edit'],ARRAY_A);
	$project_info = $wpdb->get_row("SELECT * FROM `wp_project` WHERE projectid = ".$_GET['edit'],ARRAY_A); 
    echo '<pre>';
    print_r($project_info);
    echo '</pre>';	
}
    //查硬件列表
    $sql_hard = "select * from wp_project_things where thingstype = 1";
    $res_hard = $wpdb->get_results($sql_hard,ARRAY_A);
    $sql_soft = "select * from wp_project_things where thingstype = 2";
    $res_soft = $wpdb->get_results($sql_soft,ARRAY_A);
    var_dump($res_soft);
    var_dump($res_hard);
?>
<form action="" method="post" name="create_project_post" id="frontier_post" enctype="multipart/form-data">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#basics" data-toggle="tab">基本内容</a></li>
        <li>
            <a href="#team" data-toggle="tab">项目团队</a></li>
        <li>
            <a href="#things" data-toggle="tab">用到的东西</a></li>
        <li>
            <a href="#story" data-toggle="tab">详细描述</a></li>
        <li>
            <a href="#attachments" data-toggle="tab">附件</a></li>
        <li>
            <a href="#publish_setting" data-toggle="tab">发布设置</a></li>
    </ul>
    <!-- ------------------------------------------ -->
    <div id="myTabContent" class="tab-content">
        <!-- --------------------基本内容-------------------- -->
        <div class="tab-pane fade in active" id="basics">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if (!empty($_GET['edit'])) echo $my_post['post_title']; ?>" name="title" placeholder="请输入项目名"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">摘要</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="excerpt"><?php if (!empty($_GET['edit'])) echo $my_post['post_excerpt']; ?></textarea><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目演示视频网址(优酷)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="show_url" placeholder="请输入项目演示视频链接"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">
                    项目展示图片
                </label>
                <div class="col-sm-10">
                    <div id="postimagediv" class="postbox ">
                        <div class="inside">
                            <p class="hide-if-no-js">
                                <a href="http://127.0.0.1/wordpress/wp-admin/media-upload.php" id="set-post-thumbnail" class="thickbox">设置特色图片</a></p>
                            <input type="hidden" id="_thumbnail_id" name="_thumbnail_id" value="<?php if (!empty($_GET['edit'])) echo $my_post['_thumbnail_id']; ?>" /></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------项目团队-------------------- -->
        <div class="tab-pane fade" id="team">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">团队名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if (!empty($_GET['edit'])) echo $project_info['teamname']; ?>" name="teamname" placeholder="请输入项目名"></div>
            </div>
            <fieldset class="frontier_post_fieldset">
                <div align="center" style="padding-top:50px">
                    <input type="text" style="width:300px;height:20px;font-size:14pt;" placeholder="请输入a或b模拟效果" id="team_input" onkeyup="autoComplete_team.start(event,'2','auto_team','team_members','team_members','http://127.0.0.1/wordpress/?json=hello.get_user&dev=1&name='+autoComplete_team.obj.value)">
                    <div class="cpm-form-item cpm-project-role">
                        <table id="thinglist_team"></table>
                    </div>
                </div>
                <div class="" id="auto_team">
                    <!--自动完成 DIV--></div>
                <div id="team_members">
				<?php
				    $project_team = $wpdb->get_results("SELECT * FROM `wp_project_team` WHERE projectid='".$_GET['edit']."'",ARRAY_A); 
					foreach($project_team as $key=>$val) {
						echo '<tr id="thing'.$val['id'].'"><td>'.$val['userid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['userid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
					}
				?>
				</div>
            </fieldset>
        </div>
        <!-- --------------------用到的东西-------------------- -->
        <div class="tab-pane fade" id="things">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目硬件</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if (!empty($_GET['edit'])) echo $project_info['teamname']; ?>" name="teamname" placeholder="硬件名称"><br>
                    <select name = 'hard'>
                        <option value="" disabled selected>请选择</option>
                        <?php 
                            if($res_hard){
                                foreach($res_hard as $v){
                        ?>
                            <option value = <?php echo $v['id']?>><?php echo $v['name']?></option>
                        <?php }} ?>
                    </select>
                </div>
                <br>
                <label for="firstname" class="col-sm-2 control-label">项目软件</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if (!empty($_GET['edit'])) echo $project_info['teamname']; ?>" name="teamname" placeholder="软件名称"><br>
                    <select name = 'soft'>
                        <option value="" disabled selected>请选择</option>
                        <?php 
                            if($res_soft){
                                foreach($res_soft as $v){
                        ?>
                            <option value = <?php echo $v['id']?>><?php echo $v['name']?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
		    <fieldset class="frontier_post_fieldset">
                <div align="center" style="padding-top:50px">
                    <!-- <input type="text" style="width:300px;height:20px;font-size:14pt;" placeholder="请输入硬件名称" id="hardware_input" onkeyup="autoComplete_hardware.start(event,'1','auto_hardware','things_hardware','things_hardware','http://127.0.0.1/wordpress/?json=hello.get_things&dev=1&name='+autoComplete_hardware.obj.value + '&type=1')"> -->
                    <div class="cpm-form-item cpm-project-role">
                    </div>
                </div>
                <div class="" id="auto_hardware">
                    <!--自动完成 DIV--></div>
                <div id="things_hardware">
				<?php
				    $project_team = $wpdb->get_results("SELECT * FROM `wp_user_things` WHERE thingstype='1' AND projectid='".$_GET['edit']."'",ARRAY_A); 
					foreach($project_team as $key=>$val) {
						echo '<tr id="thing'.$val['id'].'"><td>'.$val['productid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['productid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
					}
				?>
				</div>
            </fieldset>
			
            <fieldset class="frontier_post_fieldset">
                <div align="center" style="padding-top:50px">
                    <input type="text" style="width:300px;height:20px;font-size:14pt;" placeholder="请输入软件名称" id="software_input" onkeyup="autoComplete.start(event,'2','auto','things_software','things_software','http://127.0.0.1/wordpress/?json=hello.get_things&dev=1&name='+autoComplete.obj.value + '&type=2')">
                    <div class="cpm-form-item cpm-project-role">
                        <table id="thinglist"></table>
                    </div>
                </div>
                <div class="" id="auto">
                    <!--自动完成 DIV--></div>
                <div id="things_software">
				<?php
				    $project_team = $wpdb->get_results("SELECT * FROM `wp_user_things` WHERE thingstype='2' AND projectid='".$_GET['edit']."'",ARRAY_A); 
					foreach($project_team as $key=>$val) {
						echo '<tr id="thing'.$val['id'].'"><td>'.$val['productid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['productid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
					}
				?>
				</div>
            </fieldset>
            
        </div>
        <!-- --------------------详细描述-------------------- -->
        <div class="tab-pane fade" id="story">
            <fieldset class="frontier_post_fieldset">
                <legend>故事</legend>
                <div id="frontier_editor_field">
                    <?php wp_editor($my_post['post_excerpt'], 'project_content', frontier_post_wp_editor_args($fpost_sc_parms['frontier_quick_editor_height'])); ?>
                </div>
            </fieldset>
        </div>
        <!-- --------------------附件-------------------- -->
        <div class="tab-pane fade" id="attachments">
            <div class="panel panel-default">
                <div class="panel-heading">代码</div>
                <div class="panel-body">
                    <input type="file" name="code_file" value="">or
                    <textarea name="code"></textarea></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">原理图和电路图</div>
                <div class="panel-body">
                    <input type="file" name="diagrams_file" value=""></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">CAD - 外壳和定制部件</div>
                <div class="panel-body">
                    <input type="file" name="cad_file" value=""></div>
            </div>
        </div>
        <!-- --------------------发布设置-------------------- -->
        <div class="tab-pane fade" id="publish_setting">
            <h2>项目类型</h2>
	    <div class="radio">
	<label>
		<input type="radio" name="project_type" value="select_wip" <?php if (!empty($_GET['edit']) and ($project_info['project_type'] == 'select_wip')) echo 'checked'; ?>> 我正在记录我如何建立一个项目
<p>例如：气象站，智能恒温器</p>
	</label>
</div>
<div class="radio">
	<label>
		<input type="radio" name="project_type" value="protips" <?php if (!empty($_GET['edit']) and ($project_info['project_type'] == 'protips')) echo 'checked'; ?>>我只是描述如何使用组件或应用程序
<p>例子：如何用Arduino Uno控制电机，开始使用Raspberry Pi</p>
	</label>
</div>
   <h2>进展</h2>
   
   <div class="radio">
	<label>
		<input type="radio" name="progress" value="wip" <?php if (!empty($_GET['edit']) and ($project_info['progress'] == 'wip')) echo 'checked'; ?>> <p>我仍在研究我的项目</p>
	</label>
</div>
<div class="radio">
	<label>
		<input type="radio" name="progress" value="select_tutorial" <?php if (!empty($_GET['edit']) and ($project_info['progress'] == 'select_tutorial')) echo 'checked'; ?>> <p>我的项目已完成</p>
	</label>
</div>


<h2>难度</h2>
<div class="form-group">
		<label for="name">选择列表</label>
		<select class="form-control" name="difficulty" id="difficulty123">
			<option value="none" <?php if($project_info['difficulty'] == 'none') echo 'selected = "selected"'; ?>></option>
			<option value="easy" <?php if($project_info['difficulty'] == 'easy') echo 'selected = "selected"'; ?>>简单</option>
			<option value="intermediate" <?php if($project_info['difficulty'] == 'intermediate') echo 'selected = "selected"'; ?>>中等</option>
			<option value="advanced" <?php if($project_info['difficulty'] == 'advanced') echo 'selected = "selected"'; ?>>高级</option>
			<option value="hardcore"  <?php if($project_info['difficulty'] == 'hardcore') echo 'selected = "selected"'; ?>>超级幸苦</option>
		</select>
	</div>

	<h2>所需时间</h2>
	
	<div class="form-group form-inline">
		<input type="text" class="form-control" name="duration" 
			   placeholder="请输入时间" value="<?php if (!empty($_GET['edit'])) echo $project_info['duration']; ?>"><label >小时</label>
	</div>	
	
	<?php
		global $wpdb;
		$result = $wpdb->get_results("SELECT  *  FROM  `wp_license` ");
	?>
	<div class="form-group">
		<label for="name">选择执照</label>
		<select class="form-control" name="license">
			<option></option>
			<?php foreach ($result as $key => $value): ?>   
			<option value='<?php echo $value->id ?>' <?php if (!empty($_GET['edit']) and ($project_info['license'] == $value->name)) echo 'selected = "selected'; ?>> <?php echo $value->name; ?> </option>
			<?php endforeach; ?>
		</select>
	</div>
	
	
	<h2>状态设置</h2>
	   <div class="radio">
	<label>
		<input type="radio" name="post_status" value="private" <?php if (!empty($_GET['edit']) and ($my_post['post_status'] == 'private')) echo 'checked'; ?>> <p>只能访问你</p>
	</label>
</div>
<div class="radio">
	<label>
		<input type="radio" name="post_status" value="publish" <?php if (!empty($_GET['edit']) and ($my_post['post_status'] == 'publish')) echo 'checked'; ?>> <p>任何人都能访问</p>
	</label>
</div>
<div class="radio">
	<label>
		<input type="radio" name="post_status" value="draft" <?php if (!empty($_GET['edit']) and ($my_post['post_status'] == 'draft')) echo 'checked'; ?>> <p>草稿</p>
	</label>
</div>



<button class="btn btn-primary btn-lg pull-right" type="submit" name="user_post_submit" 	id="user_post_publish" 	value="publish">发布</button>

		</div>
    </div>
</form>