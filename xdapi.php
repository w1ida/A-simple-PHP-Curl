<?php 
#详单查询
function qx($session,$ym,$sd,$ed){
		global $p;
		$url = "http://wap.hn.10086.cn/wap/detailBillQuery/queryDetailBill?yearMonth={$ym}&startDay={$sd}&endDay={$ed}&detailBillType=1002&ajax_randomcode=0.1";
		# echo $url;
		$ch = curl_init($url); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_COOKIE, 'EcSite.session.id='.$session.'; 0.1=0' );
		$data=curl_exec($ch);
		curl_close($ch);
		//echo $data;
		return $data;
		
}
$data=qx($_GET['session'],$_GET['yearMonth'],$_GET['startDay'],$_GET['endDay']);
$res=json_decode($data);
$res=$res->billNet->result; 
if(empty($res)){
	echo $data;
}else{
	echo json_encode($res);	
}
