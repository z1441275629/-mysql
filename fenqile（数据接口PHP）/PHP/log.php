<?php
	//处理跨域  
    header("Access-Control-Allow-Origin:*"); //*号表示所有域名都可以访问  
    header("Access-Control-Allow-Method:POST,GET"); 
	
	header("content-type:text/html;charset=utf-8");
	$tel=$_POST['tel'];
	$pass=$_POST['pass'];
	
	
	//建立连接
	$lianjieSQL=mysql_connect("localhost","root","qianfeng");
	//检测连接是否成功
	if(!$lianjieSQL){
		die("连接不上：".mysql_error());
	}

	//选择需要连接的库
	mysql_select_db("fenqile",$lianjieSQL);
	//执行查询工作
	$chaxun="select * from users where tel='".$tel."' and pass='".$pass."'";
	//echo $chaxun;
	$chaxunRes=mysql_query($chaxun,$lianjieSQL);
	$rows=mysql_num_rows($chaxunRes);
	
	if($rows==0){
		echo "0";//没有查到
	}else if($rows==1){
		echo "1";//查找到了
	}else{
		echo $rows;//报错或者多个信息
	}
	
	//关闭数据库
	mysql_close($lianjieSQL);
?>