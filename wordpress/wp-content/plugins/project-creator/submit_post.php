<?php
global $wpdb;
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// die;
if (!function_exists('is_user_logged_in')) require (ABSPATH . WPINC . '/pluggable.php');
// 创建文章对象
$post = array(
    // 'ID'             => [ <post id> ] // 如果需要更新文章，设置id为需要更新文章的id，否则不要设置此值
    'post_content' => $_POST['project_content'], // 文章内容，也就是可视化编辑器里面的输入的内容
    'post_name' => $_POST['title'], // 文章的别名，就是URL里面的名称
    'post_title' => $_POST['title'], // 文章标题
    'post_status' => $_POST['post_status'],//'publish', //[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // 文章状态，默认 'draft'.
    'post_excerpt' => $_POST['excerpt'], // 文章摘要。
    'comment_status' => 'open', //[ 'closed' | 'open' ] // 是否允许评论，默认为 'default_comment_status'的值，或'closed'。
    //'post_category'  => [ array(<category id>, ...) ] // 文章分类目录，默认为空 //'post_category' => array(8,39)
    //'tags_input'     => [ '<tag>, <tag>, ...' | array ] // 文章标签，默认为空
    //'tax_input'      => [ array( <taxonomy> => <array | string>, <taxonomy_other> => <array | string> ) ] // 文章的自定义分类法项目，默认为空。
    
);

//如果传来id值，创建项目变成编辑项目
if (!empty($_GET['edit'])) $post['ID'] = $_POST['project_id'];

// 插入文章到数据库
$post_id = wp_insert_post($post);
//插入封面图到数据库
if ($_POST['_thumbnail_id']) {
    update_post_meta($post_id, '_thumbnail_id', $_POST['_thumbnail_id']);
}
//插入硬件列表到数据库
if (is_array($_POST['things_hardware'])) {
    foreach ($_POST['things_hardware'] as $key => $value) {
        $wpdb->query("INSERT INTO `wp_user_things` (`projectid` , `thingstype` , `thing_id` )VALUES ('" . $post_id . "', '1', '" . $value . "')");
    }
}
//插入软件列表到数据库
if (is_array($_POST['things_software'])) {
    foreach ($_POST['things_software'] as $key => $value) {
        $wpdb->query("INSERT INTO `wp_user_things` (`projectid` , `thingstype` , `productid` )VALUES ('" . $post_id . "', '2', '" . $value . "')");
    }
}
//插入团队成员到数据库
if (is_array($_POST['team_members'])) {
    foreach ($_POST['team_members'] as $key => $value) {
        $wpdb->query("INSERT INTO  `wp_project_team` ( `projectid` , `userid` ) VALUES ( '" . $post_id . "',  '" . $value . "');");
    }
}
$teamname = $_POST['teamname']; //团队名称
$project_type = $_POST['project_type']; //项目类型
$progress = $_POST['progress']; //项目进度
$difficulty = $_POST['difficulty']; //项目团队
$duration = $_POST['duration']; //所需时间
$pro_url = $_POST['show_url']; //所需时间

//查询执照
$sql = "select name from wp_license where id = ".$_POST['license'];
$license_list = $wpdb->get_results($sql,ARRAY_A);
if($license_list){
    $license = $license_list[0]['name'];
}else{
    $license = '';
}
//添加到project表
$sql_pro = "insert into `wp_project` ( `projectid` , `teamname` , `progress` , `type` ,`difficulty` , `duration` ,`license` ,`pro_url`) values ( '{$post_id}' , '{$teamname}', '{$progress}', '{$project_type}', '{$difficulty}',  '{$duration}', '{$license}', '{$pro_url}')";
// echo $sql_pro;
$wpdb->query($sql_pro);

//插入代码附件路径到数据库
// var_dump($_FILES);
$mode = get_type($_FILES['code_file']['name']);//取后缀
$fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
$dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
$code_dir = $dir.'/uploads/code_pic/'.$fileName;
if ($_FILES['code_file']) {
    if (move_uploaded_file($_FILES['code_file']['tmp_name'], $code_dir)) {
        //拼接路径
        $path = '/uploads/code_pic/'.$fileName;
        $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '1', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
        $wpdb->query($sql);
        // echo $sql;
    }
}

//插入原理图附件路径到数据库
if ($_FILES['diagrams_file']) {
$mode = get_type($_FILES['diagrams_file']['name']);//取后缀
$fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
$diagrams_dir = $dir.'/uploads/diagrams_pic/'.$fileName;
    if (move_uploaded_file($_FILES['diagrams_file']['tmp_name'],    $diagrams_dir)) {
        //拼接路径
        $path = '/uploads/diagrams_pic/'.$fileName;
        $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '2', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
        $wpdb->query($sql);
        // echo $sql;
    }
}
//插入CAD附件路径到数据库
if ($_FILES['cad_file']) {

$mode = get_type($_FILES['diagrams_file']['name']);//取后缀
$fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
$cad_dir = $dir.'/uploads/cad_pic/'.$fileName;
    if (move_uploaded_file($_FILES['cad_file']['tmp_name'], $cad_dir)) {
        $path = '/uploads/cad_pic/'.$fileName;
        $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '3', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
        $wpdb->query($sql);
        // echo $sql;
    }
}

function get_type($fileName){
    $file = explode('.',$fileName);
    return end($file);
}
?>
