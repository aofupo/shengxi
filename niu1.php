<?php
	$showmsg='';
	$filename='chuan1.txt';
	if(isset($_POST['msg'])){
		$showmsg=$_POST['msg'];
		setmsg($filename, $showmsg);
		flush();
	header('refresh:1;url=niu1.php');
	echo "<script>alert('添加成功');</script>";
		$showmsg=getmsg('chuan1.txt');
	}
	else{
		$showmsg=getmsg('chuan1.txt');
	}
	
	function getmsg($fileurl){
		$remsg='';
		if(filesize($fileurl)>0){
			$memo=file_get_contents($fileurl);
			$msgarr=explode('|', $memo);
			if(count($msgarr)>1){
				foreach($msgarr as $key=>$val){
					$remsg.='<p>'.$val.'<span class=del><a href="msg1.php?='.$key.'">删除</a></span></p>';
					}
				}else{
					$remsg='<p>'.$msgarr[0].'</p>';
				}
			}
			else{
				$remsg='';
			}
			return $remsg;
		}

	function setmsg($fileurl,$msg){
		$memo='';
		if(filesize($fileurl)>0){
			$memo=file_get_contents($fileurl);
			$memo.='|'.$msg;
		}else{
			$memo=$msg;
		}
		file_put_contents($filename, $memo);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.kuang{
				width: 1100px;
				height: 1000px;
				margin: 0 auto;
				background:url(img/3c6234a85edf8db1d2f756370e23dd54574e748d.jpg);
			}
			.jia{
				width: 1300px;
				height: 1000px;
				margin: 0 auto;
				overflow-y:auto;
			}
		</style>
	</head>
	<body>
		<div class="kuang">
			<div class="jia">
				<?php
					echo $showmsg;
				?>
			</div>
		</div>
		<div class="getform">
			<form method="post" action="niu1.php">
				<table align="center">
					<tr>
						<td>性感奥姐<br />在线抖腿:</td>
							<td>
							<textarea rows="10" cols="80" name="msg" required="required">
								
							</textarea>
							</td>
						</tr>
					<tr align="center">
						<td colspan="2">
							<input type="submit" value="提交"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
