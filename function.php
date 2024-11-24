<?php

session_start();

$q = $_GET['q'];

include 'dbcon.php';
		
if (!$CON) 
{
  die('Not connected : ' );
}


if ($q == "1" ){

 $sql="SELECT DISTINCT SLTA_SSC2  FROM SLT_AREAS";
	 
	 if($p_level != '1'){
	 
	 $sql.=" where SLTA_SSC2 IN($areas)"; 
	 
	 }
	 
	 $sql.=" ORDER BY SLTA_SSC2";
	
	$stid=oci_parse($CON,$sql);
	oci_execute($stid);

	$result ="";

	while ($row = oci_fetch_array($stid))
	{
		$result = $result.$row['SLTA_SSC2']."@";
		
	}
	
}


if ($q == "2" ){

$info = $_POST['info'];

$sql1 = "SELECT * FROM GIS_POLES WHERE P_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $P_NUMBER     	= $row1['P_NUMBER'];
	   $P_MAKE     		= $row1['P_MAKE'];
	   $P_HEIGHT   		= $row1['P_HEIGHT'];
	   $P_TYPE     		= $row1['P_TYPE'];
	   $P_FEATURE1 		= $row1['P_FEATURE1'];
	   $P_FEATURE2 		= $row1['P_FEATURE2'];
	   $P_DP	 		= $row1['P_DP'];
	   $P_FDP	 		= $row1['P_FDP'];
	   $P_SIDE	 		= $row1['P_SIDE'];
	   $P_LAT	 		= $row1['P_LAT'];
	   $P_LON	 		= $row1['P_LON'];
	   $P_RTOM	 		= $row1['P_RTOM'];
	   $P_LEA_NAME 		= $row1['P_LEA_NAME'];
	   $P_RISERS_COUNT 	= $row1['P_RISERS_COUNT'];
	   $P_DW_COUNT 		= $row1['P_DW_COUNT'];
	   $P_ROAD_NAME		= $row1['P_ROAD_NAME'];
	   $P_CREATED_USER	= $row1['P_CREATED_USER'];
	   $P_ID			= $row1['P_ID'];
	   
$sql3 = "DELETE FROM GIS_POLES_PL WHERE P_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_POLES SET P_STATUS = '0' WHERE P_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_POLES_PL (P_NUMBER,P_MAKE, P_HEIGHT, P_TYPE, P_FEATURE1,P_FEATURE2,P_DP,P_FDP,P_SIDE,P_LAT,P_LON,P_RTOM,P_LEA_NAME,P_RISERS_COUNT,P_DW_COUNT,P_ROAD_NAME,P_USER_ID,P_ID,P_AP_STATUS)
VALUES ('".$P_NUMBER."' , '".$P_MAKE."' , '".$P_HEIGHT."', '".$P_TYPE."','".$P_FEATURE1."','".$P_FEATURE2."','".$P_DP."','".$P_FDP."','".$P_SIDE."','".$P_LAT."','".$P_LON."','".$P_RTOM."','".$P_LEA_NAME."','".$P_RISERS_COUNT."','".$P_DW_COUNT."','".$P_ROAD_NAME."','".$username."','".$P_ID."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
    $result = "done";
	
}


if ($q == "3" ){

$info = $_POST['info'];

	$sql1 = "SELECT * FROM GIS_DUCT WHERE D_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $D_NAME     	= $row1['D_NAME'];
	   $D_TESSALLATE = $row1['D_TESSALLATE'];
	   $D_CORDS   		= $row1['D_CORDS'];
	   $D_LENGTH     	= $row1['D_LENGTH'];
	   $D_PROTECTION 	= $row1['D_PROTECTION'];
	   $D_DAMAGE 		= $row1['D_DAMAGE'];
	   $D_REMARKS	 	= $row1['D_REMARKS'];
	   $D_TYPE	 		= $row1['D_TYPE'];
	   $D_NUM_WAY	 	= $row1['D_NUM_WAY'];
	   $D_DUCT_NUMBER	= $row1['D_DUCT_NUMBER'];
	   $D_SUBDUCT	 	= $row1['D_SUBDUCT'];
	   $D_SIZE	 		= $row1['D_SIZE'];
	   $D_RTOM	 		= $row1['D_RTOM'];
	   $D_MH_END1	 	= $row1['D_MH_END1'];
	   $D_MH_END2 		= $row1['D_MH_END2'];
	   $D_ID			= $row1['D_ID'];
	   $D_CREATED_USER	= $row1['D_CREATED_USER'];
	   
$sql3 = "DELETE FROM GIS_DUCT_PL WHERE D_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_DUCT SET D_STATUS = '0' WHERE D_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_DUCT_PL (D_NAME,D_TESSALLATE,D_CORDS,D_LENGTH,D_PROTECTION,D_DAMAGE,D_REMARKS,D_TYPE,D_NUM_WAY,D_DUCT_NUMBER,D_SUBDUCT,D_SIZE,D_RTOM,D_MH_END1,D_MH_END2,D_ID,D_USER_ID,D_AP_STATUS)
VALUES ('".$D_NAME."' , '".$D_TESSALLATE."' , '".$D_CORDS."', '".$D_LENGTH."','".$D_PROTECTION."','".$D_DAMAGE."','".$D_REMARKS."','".$D_TYPE."','".$D_NUM_WAY."','".$D_DUCT_NUMBER."','".$D_SUBDUCT."','".$D_SIZE."','".$D_RTOM."','".$D_MH_END1."','".$D_MH_END2."','".$D_ID."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
	
	$result = "done";
	
}


if ($q == "4" ){

$info = $_POST['info'];
	
$sql1 = "SELECT * FROM GIS_MANHOLE_HANDHOLE WHERE MH_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $MH_SUB_TYPE  = $row1['MH_SUB_TYPE'];
	   $MH_NUMBER  = $row1['MH_NUMBER'];
	   $MH_FACE_NUMBER  = $row1['MH_FACE_NUMBER'];
	   $MH_LAT   = $row1['MH_LAT'];
	   $MH_LON 	 = $row1['MH_LON'];
	   $MH_SIDE = $row1['MH_SIDE'];
	   $MH_TYPE	= $row1['MH_TYPE'];
	   $MH_RTOM	= $row1['MH_RTOM'];
	   $MH_LEA_NAME	= $row1['MH_LEA_NAME'];
	   $MH_ROAD_NAME = $row1['MH_ROAD_NAME'];
	   $MH_LOCATION_AC	= $row1['MH_LOCATION_AC'];
	   $MH_START_CHAIN	= $row1['MH_START_CHAIN'];
	   $MH_AP_NUMBER	= $row1['MH_AP_NUMBER'];
	   $MH_RISERS_NUMBER= $row1['MH_RISERS_NUMBER'];
	   $MH_REMARK	= $row1['MH_REMARK'];
	   $MH_FC_STATUS	= $row1['MH_FC_STATUS'];
	   $IMG_COUNT	= $row1['IMG_COUNT'];
	   $MH_ID	= $row1['MH_ID'];
	   $MH_CREATED_USER= $row1['MH_CREATED_USER'];
	   
$sql3 = "DELETE FROM GIS_MANHOLE_HANDHOLE_PL WHERE MH_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_MANHOLE_HANDHOLE SET MH_STATUS = '0' WHERE MH_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_MANHOLE_HANDHOLE_PL (MH_SUB_TYPE,MH_NUMBER,MH_FACE_NUMBER,MH_LAT,MH_LON,MH_SIDE,MH_TYPE,MH_RTOM,MH_LEA_NAME,MH_ROAD_NAME,MH_LOCATION_AC,MH_START_CHAIN,MH_AP_NUMBER,MH_RISERS_NUMBER,MH_REMARK,MH_FC_STATUS,IMG_COUNT,MH_ID,MH_USER_ID,MH_AP_STATUS)
VALUES ('".$MH_SUB_TYPE."' , '".$MH_NUMBER."' , '".$MH_FACE_NUMBER."', '".$MH_LAT."','".$MH_LON."','".$MH_SIDE."','".$MH_TYPE."','".$MH_RTOM."','".$MH_LEA_NAME."','".$MH_ROAD_NAME."','".$MH_LOCATION_AC."','".$MH_START_CHAIN."','".$MH_AP_NUMBER."','".$MH_RISERS_NUMBER."','".$MH_REMARK."','".$MH_FC_STATUS."','".$IMG_COUNT."','".$MH_ID."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
	
    $result = "done";
	
}

if ($q == "5" ){

	$info = $_POST['info'];

	$sql="DELETE GIS_POLESFDP 
       WHERE  PFDP_CABLE_NUMBER =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$count = 0;
	
	for($x=1; $x < sizeof($info); $x++){
		
		$temp =  explode(",",$info[$x]);
		if($temp[1] != ""){
			$sql1 = "INSERT INTO GIS_POLESFDP (PFDP_CABLE_NUMBER, PFDP_DISCRIPTION, PFDP_LOCATION,PFDP_INDEX) 
					VALUES ('".$info[0]."','".$temp[1]."','".$temp[0]."','".$temp[2]."')";
			$stid=oci_parse($CON,$sql1);
			oci_execute($stid);
			$count ++;
		}
		
	}
	
	$sql2="UPDATE GIS_POLES SET 
       P_FDP     = '".$count."' WHERE  P_NUMBER =  '".$info[0]."'";	
	$stid=oci_parse($CON,$sql2);
			oci_execute($stid);
            
	$result = "done" ;
	
}


if ($q == "6" ){

	$info = $_POST['info'];

	$sql="DELETE GIS_POLESDP 
       WHERE  PDP_CABLE_NUMBER =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$count = 0;
	
	for($x=1; $x < sizeof($info); $x++){
		
		$temp =  explode(",",$info[$x]);
		if($temp[1] != ""){
			$sql1 = "INSERT INTO GIS_POLESDP (PDP_CABLE_NUMBER, PDP_DISCRIPTION, PDP_LOCATION,PDP_INDEX) 
					VALUES ('".$info[0]."','".$temp[1]."','".$temp[0]."','".$temp[2]."')";
			$stid=oci_parse($CON,$sql1);
			oci_execute($stid);
			$count ++;
		}
		
	}
	
	$sql2="UPDATE GIS_POLES SET P_DP     = '".$count."' WHERE  P_NUMBER =  '".$info[0]."'";	
	
	$stid=oci_parse($CON,$sql2);
	oci_execute($stid);
            
	$result = "done" ;
	
}

if ($q == "7" ){

$info = $_POST['info'];
	
	$sql1 = "SELECT * FROM GIS_FDP WHERE FDP_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $FDP_NUMBER     	= $row1['FDP_NUMBER'];
	   $FDP_SPLITTERS_COUNT = $row1['FDP_SPLITTERS_COUNT'];
	   $FDP_SPLITTER_TYPE  = $row1['FDP_SPLITTER_TYPE'];
	   $FDP_LAT     	= $row1['FDP_LAT'];
	   $FDP_LON 		= $row1['FDP_LON'];
	   $FDP_RTOM 		= $row1['FDP_RTOM'];
	   $FDP_LEA_NAME	= $row1['FDP_LEA_NAME'];
	   $FDP_ROAD_NAME	= $row1['FDP_ROAD_NAME'];
	   $FDP_ID	 		= $row1['FDP_ID'];
	   $FDP_CREATED_USER= $row1['FDP_CREATED_USER'];
	   
$sql3 = "DELETE FROM GIS_FDP_PL WHERE FDP_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_FDP SET FDP_STATUS = '0' WHERE FDP_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_FDP_PL (FDP_NUMBER,FDP_SPLITTERS_COUNT,FDP_SPLITTER_TYPE,FDP_LAT,FDP_LON,FDP_RTOM,FDP_LEA_NAME,FDP_ROAD_NAME,FDP_ID,FDP_USER_ID,FDP_AP_STATUS)
VALUES ('".$FDP_NUMBER."' , '".$FDP_SPLITTERS_COUNT."' , '".$FDP_SPLITTER_TYPE."', '".$FDP_LAT."','".$FDP_LON."','".$FDP_RTOM."','".$FDP_LEA_NAME."','".$FDP_ROAD_NAME."','".$FDP_ID."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
    $result = "done";
	
}

if ($q == "8" ){

$info = $_POST['info'];

$sql1 = "SELECT * FROM GIS_TP WHERE TP_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $TP_LON	     	= $row1['TP_LON'];
	   $TP_LAT			= $row1['TP_LAT'];
	   $TP_CUSTOMER_NAME = $row1['TP_CUSTOMER_NAME'];
	   $TP_NUMBER_CT   = $row1['TP_NUMBER_CT'];
	   $TP_CPODF_TYPE 	= $row1['TP_CPODF_TYPE'];
	   $TP_CUSTOMER_TYPE = $row1['TP_CUSTOMER_TYPE'];
	   $TP_NAME			= $row1['TP_NAME'];
	   $TP_CUSTOMER_SUBTYPE	= $row1['TP_CUSTOMER_SUBTYPE'];
	   $TP_SERVICE_PROVIDED	= $row1['TP_SERVICE_PROVIDED'];
	   $TP_TOWER_OWNER	= $row1['TP_TOWER_OWNER'];
	   $TP_RTOM = $row1['TP_RTOM'];
	   $TP_CREATED_USER = $row1['TP_CREATED_USER'];
	   $TP_ID = $row1['TP_ID'];
	   
	$sql3 = "DELETE FROM GIS_TP_PL WHERE TP_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
	$sql4 = "UPDATE GIS_TP SET TP_STATUS = '0' WHERE TP_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
	$sql2 = "INSERT INTO GIS_TP_PL (TP_LON,TP_LAT,TP_CUSTOMER_NAME,TP_NUMBER_CT,TP_CPODF_TYPE,TP_CUSTOMER_TYPE,TP_NAME,TP_CUSTOMER_SUBTYPE,TP_SERVICE_PROVIDED,TP_TOWER_OWNER,TP_RTOM,TP_USER_ID,TP_ID,TP_APP_STATUS)
VALUES ('".$TP_LON."' , '".$TP_LAT."' , '".$TP_CUSTOMER_NAME."', '".$TP_NUMBER_CT."','".$TP_CPODF_TYPE."','".$TP_CUSTOMER_TYPE."','".$TP_NAME."','".$TP_CUSTOMER_SUBTYPE."','".$TP_SERVICE_PROVIDED."','".$TP_TOWER_OWNER."','".$TP_RTOM."','".$username."','".$TP_ID."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
    $result = "done";
	
}


if ($q == "9" ){

$info = $_POST['info'];
	
$sql1 = "SELECT * FROM GIS_FTC WHERE FTC_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $FTC_LON  = $row1['FTC_LON'];
	   $FTC_LAT  = $row1['FTC_LAT'];
	   $FTC_NUMBER  = $row1['FTC_NUMBER'];
	   $FTC_FEATURE   = $row1['FTC_FEATURE'];
	   $FTC_TYPE 		= $row1['FTC_TYPE'];
	   $FTC_CAPACITY= $row1['FTC_CAPACITY'];
	   $FTC_RTOM	= $row1['FTC_RTOM'];
	   $FTC_SIDE	= $row1['FTC_SIDE'];
	   $FTC_LEA_NAME	= $row1['FTC_LEA_NAME'];
	   $FTC_ROAD_NAME	= $row1['FTC_ROAD_NAME'];
	   $IMG_COUNT	= $row1['IMG_COUNT'];
	   $FTC_ID	= $row1['FTC_ID'];
	   $FTC_CREATED_USER= $row1['FTC_CREATED_USER'];
	   
$sql3 = "DELETE FROM GIS_FTC_PL WHERE FTC_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_FTC SET FTC_STATUS = '0' WHERE FTC_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_FTC_PL (FTC_LON,FTC_LAT,FTC_NUMBER,FTC_FEATURE,FTC_TYPE,FTC_CAPACITY,FTC_RTOM,FTC_SIDE,FTC_LEA_NAME,FTC_ROAD_NAME,IMG_COUNT,FTC_ID,FTC_USER_ID,FTC_AP_STATUS)
VALUES ('".$FTC_LON."' , '".$FTC_LAT."' , '".$FTC_NUMBER."', '".$FTC_FEATURE."','".$FTC_TYPE."','".$FTC_CAPACITY."','".$FTC_RTOM."','".$FTC_SIDE."','".$FTC_LEA_NAME."','".$FTC_ROAD_NAME."','".$IMG_COUNT."','".$FTC_ID."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
	
    $result = "done";
	
}


if ($q == "10" ){

$info = $_POST['info'];
	
$sql1 = "SELECT * FROM GIS_FJ WHERE FJ_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $FJ_NUMBER     	= $row1['FJ_NUMBER'];
	   $FJ_LAT  = $row1['FJ_LAT'];
	   $FJ_LON  = $row1['FJ_LON'];
	   $FJ_MHP_NUMBER   = $row1['FJ_MHP_NUMBER'];
	   $FJ_TYPE 		= $row1['FJ_TYPE'];
	   $FJ_SHEATH_NUMBER= $row1['FJ_SHEATH_NUMBER'];
	   $FJ_RTOM	= $row1['FJ_RTOM'];
	   $FJ_ID	= $row1['FJ_ID'];
	   $FJ_CREATED_USER= $row1['FJ_CREATED_USER'];
	   
$sql3 = "DELETE FROM GIS_FJ_PL WHERE FJ_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_FJ SET FJ_STATUS = '0' WHERE FJ_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
$sql2 = "INSERT INTO GIS_FJ_PL (FJ_NUMBER,FJ_LAT,FJ_LON,FJ_MHP_NUMBER,FJ_TYPE,FJ_SHEATH_NUMBER,FJ_RTOM,FJ_ID,FJ_USER_ID,FJ_AP_STATUS)
VALUES ('".$FJ_NUMBER."' , '".$FJ_LAT."' , '".$FJ_LON."', '".$FJ_MHP_NUMBER."','".$FJ_TYPE."','".$FJ_SHEATH_NUMBER."','".$FJ_RTOM."','".$FJ_ID."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);

    $result = "done";
	
}


if ($q == "11" ){

$info = $_POST['info'];
	
	$sql1 = "SELECT * FROM GIS_ODF WHERE ODF_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $ODF_NUMBER     	= $row1['ODF_NUMBER'];
	   $ODF_RACK_NUMBER = $row1['ODF_RACK_NUMBER'];
	   $ODF_SHEATH_NAME = $row1['ODF_SHEATH_NAME'];
	   $ODF_NUMBER_CT   = $row1['ODF_NUMBER_CT'];
	   $ODF_LON 		= $row1['ODF_LON'];
	   $ODF_LAT 		= $row1['ODF_LAT'];
	   $ODF_LB_LOCATION	= $row1['ODF_LB_LOCATION'];
	   $ODF_RTOM	 	= $row1['ODF_RTOM'];
	   $ODF_LAC	 		= $row1['ODF_LAC'];
	   $ODF_LEA_NAME	= $row1['ODF_LEA_NAME'];
	   $ODF_CREATED_USER= $row1['ODF_CREATED_USER'];
	   $ODF_ID	 		= $row1['ODF_ID'];
	   
$sql3 = "DELETE FROM GIS_ODF_PL WHERE ODF_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
$sql4 = "UPDATE GIS_ODF SET ODF_STATUS = '0'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
	$sql2 = "INSERT INTO GIS_ODF_PL (ODF_NUMBER,ODF_RACK_NUMBER,ODF_SHEATH_NAME,ODF_NUMBER_CT,ODF_LON,ODF_LAT,ODF_LB_LOCATION,ODF_RTOM,ODF_LAC,ODF_LEA_NAME,ODF_USER_ID,ODF_ID,ODF_AP_STATUS)
VALUES ('".$ODF_NUMBER."' , '".$ODF_RACK_NUMBER."' , '".$ODF_SHEATH_NAME."', '".$ODF_NUMBER_CT."','".$ODF_LON."','".$ODF_LAT."','".$ODF_LB_LOCATION."','".$ODF_RTOM."','".$ODF_LAC."','".$ODF_LEA_NAME."','".$username."','".$ODF_ID."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
    $result = "done";
	
}


if ($q=="12") {
  
  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(FJ_NUMBER) AS REC_COUNT FROM GIS_FJ WHERE FJ_RTOM = '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="13") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(P_NUMBER) AS REC_COUNT FROM GIS_POLES WHERE P_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="14") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(D_NAME) AS REC_COUNT FROM GIS_DUCT WHERE D_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="15") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(MH_NUMBER) AS REC_COUNT FROM GIS_MANHOLE_HANDHOLE WHERE MH_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="16") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(TP_NAME) AS REC_COUNT FROM GIS_TP WHERE TP_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="17") {
  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(FDP_NUMBER) AS REC_COUNT FROM GIS_FDP WHERE FDP_RTOM =  '$rtom' ";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="18") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(FTC_NUMBER) AS REC_COUNT FROM GIS_FTC WHERE FTC_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q=="19") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(ODF_NUMBER) AS REC_COUNT FROM GIS_ODF WHERE ODF_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}

if ($q == "20" ){

   $location = $_POST['location'];

   $sql2="SELECT ROAD_NAME FROM GIS_ROADNAME ";

    if($location != ''){

     $sql2 = $sql2."WHERE  lower(ROAD_NAME) LIKE '".$location."%' OR UPPER(ROAD_NAME) LIKE '".$location."%'"; 

    }
   
    $stid2 =oci_parse($CON,$sql2);
    oci_execute($stid2);
  
  $result ="";
  while ($row=oci_fetch_array($stid2)) {
  
     $result .='<option value="'.$row['ROAD_NAME'].'">'.$row['ROAD_NAME'].'</option>';

  } 

}

if ($q == "21" ){

$mhNo = $_POST['mhNo'];

$sql="DELETE FROM GIS_MANHOLE_HANDHOLE WHERE  MH_NUMBER=  '".$mhNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
    $result = "done";
  
}

if ($q == "22" ){

$poleNo = $_POST['poleNo'];

$sql="DELETE FROM GIS_POLES WHERE  P_NUMBER=  '".$poleNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
    $result = "done";
  
}

if ($q == "23" ){

$ductName = $_POST['ductName'];

$sql="DELETE FROM GIS_DUCT WHERE  D_NAME=  '".$ductName."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
    $result = "done";
  
}

if ($q == "24" ){

$fdpNo = $_POST['fdpNo'];

$sql="DELETE FROM GIS_FDP WHERE  FDP_NUMBER=  '".$fdpNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
    $result = "done";
  
}

if ($q == "25" ){

$tpName = $_POST['tpName'];

$sql="DELETE FROM GIS_TP WHERE  TP_NAME=  '".$tpName."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "26" ){

$ftcNo = $_POST['ftcNo'];

$sql="DELETE FROM GIS_FTC WHERE  FTC_NUMBER=  '".$ftcNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "27" ){

$fjNo = $_POST['fjNo'];

$sql="DELETE FROM GIS_FJ WHERE  FJ_NUMBER=  '".$fjNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
      $result = "done";
  
}

if ($q == "28" ){

$odfNo = $_POST['odfNo'];

$sql="DELETE FROM GIS_ODF WHERE  ODF_NUMBER=  '".$odfNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
      $result = "done";
  
}

if ($q == "29" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(P_ID) as MAX_ID FROM GIS_POLES  ORDER BY P_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}

$sql="INSERT INTO GIS_POLES_PL(P_NUMBER,P_LEA_NAME,P_ROAD_NAME,P_MAKE,P_HEIGHT,P_TYPE,P_FEATURE1,P_FEATURE2,P_RISERS_COUNT,P_DW_COUNT,P_LAT,P_LON,P_RTOM,P_USER_ID,P_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$info[9]."','".$info[10]."','".$info[11]."','".$info[12]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
      $result = "done";
  
}


if ($q == "30" ){

$info = $_POST['info'];


$sqlMax = "SELECT  DISTINCT MAX(MH_ID) as MAX_ID FROM GIS_MANHOLE_HANDHOLE  ORDER BY MH_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
	
$sql="INSERT INTO GIS_MANHOLE_HANDHOLE_PL(MH_NUMBER,MH_LEA_NAME,MH_ROAD_NAME,MH_LOCATION_AC,MH_TYPE,MH_SUB_TYPE,MH_FACE_NUMBER,MH_SIDE,MH_START_CHAIN,MH_AP_NUMBER,MH_RISERS_NUMBER,MH_REMARK,MH_FC_STATUS,MH_LAT,MH_LON,MH_RTOM,MH_USER_ID,MH_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$info[9]."','".$info[10]."','".$info[11]."','".$info[12]."','".$info[13]."','".$info[14]."','".$info[15]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}


if ($q == "31" ){

$rtom = $_POST['rtom'];

$sql="SELECT SLTA_LEA  FROM SLT_AREAS WHERE SLTA_SSC2 = '$rtom'";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ='<option value=""></option>';
	
	while ($row = oci_fetch_array($stid))
	{
		$result = $result.'<option value="'.$row['SLTA_LEA'].'">'.$row['SLTA_LEA'].'</option>';
	}

}


if ($q == "32" ){

$info = $_POST['info'];

$sql="UPDATE GIS_POLES_PL SET
       P_MAKE     		= '".$info[1]."',
       P_HEIGHT   		= '".$info[2]."',
       P_TYPE     		= '".$info[3]."',
       P_FEATURE1 		= '".$info[4]."',
       P_FEATURE2 		= '".$info[5]."',
       P_LEA_NAME 		= '".$info[6]."',
       P_ROAD_NAME 		= '".$info[7]."',
       P_RISERS_COUNT 	= '".$info[8]."',
       P_DW_COUNT		= '".$info[9]."'
       WHERE  P_ID   	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
            
	$result = "done";
	
}

if ($q == "33" ){

$poleNo = $_POST['poleNo'];

$sql="DELETE FROM GIS_POLES_PL WHERE  P_NUMBER=  '".$poleNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
      $result = "done";
  
}

if ($q == "34" ){

$info = $_POST['info'];

 $sql="UPDATE GIS_MANHOLE_HANDHOLE_PL SET
      MH_TYPE           	  = '".$info[1]."',
      MH_SUB_TYPE       	  = '".$info[2]."',
      MH_SIDE				        = '".$info[3]."',
      MH_FACE_NUMBER		    = '".$info[4]."',
      MH_LEA_NAME			      = '".$info[5]."',
      MH_ROAD_NAME			    = '".$info[6]."',
      MH_LOCATION_AC		    = '".$info[7]."',
      MH_START_CHAIN		    = '".$info[8]."',
      MH_AP_NUMBER			    = '".$info[9]."',
      MH_RISERS_NUMBER		  = '".$info[10]."',
      MH_REMARK				      = '".$info[11]."',
      MH_FC_STATUS			    = '".$info[12]."'       
      WHERE  MH_NUMBER  	  =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
    $result = "done";
	
}


if ($q == "35" ){

$mhNo = $_POST['mhNo'];

$sql="DELETE FROM GIS_MANHOLE_HANDHOLE_PL WHERE  MH_NUMBER=  '".$mhNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
        
    $result = "done";
  
}

if ($q == "36" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(D_ID) as MAX_ID FROM GIS_DUCT ORDER BY D_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
$sql="INSERT INTO GIS_DUCT_PL(D_NAME,D_MH_END1,D_MH_END2,D_LENGTH,D_PROTECTION,D_DAMAGE,D_REMARKS,D_NUM_WAY,D_DUCT_NUMBER,D_SUBDUCT,D_TYPE,D_SIZE,D_CORDS,D_RTOM,D_USER_ID,D_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$info[9]."','".$info[10]."','".$info[11]."','".$info[12]."','".$info[13]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "37" ){

	$D_ID = $_POST['D_ID'];

	$sql="DELETE FROM GIS_DUCT_PL WHERE  D_ID= '".$D_ID."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
	$sql2="DELETE FROM GIS_DUCT WHERE  D_ID= '".$D_ID."'";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
  
            
    $result = "done";
  
}

if ($q == "38" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(TP_ID) as MAX_ID FROM GIS_TP ORDER BY TP_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
$sql="INSERT INTO GIS_TP_PL(TP_NAME,TP_CUSTOMER_NAME,TP_NUMBER_CT,TP_CPODF_TYPE,TP_CUSTOMER_TYPE,TP_CUSTOMER_SUBTYPE,TP_SERVICE_PROVIDED,TP_TOWER_OWNER,TP_LON,TP_LAT,TP_RTOM,TP_USER_ID,TP_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$info[9]."','".$info[10]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "39" ){

$tpName = $_POST['tpName'];

$sql="DELETE FROM GIS_TP_PL WHERE  TP_NAME =  '".$tpName."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "40" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(FDP_ID) as MAX_ID FROM GIS_FDP ORDER BY FDP_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
$sql="INSERT INTO GIS_FDP_PL(FDP_NUMBER,FDP_LEA_NAME,FDP_ROAD_NAME,FDP_SPLITTERS_COUNT,FDP_SPLITTER_TYPE,FDP_LON,FDP_LAT,FDP_RTOM,FDP_USER_ID,FDP_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "41" ){

$fdpNo = $_POST['fdpNo'];

$sql="DELETE FROM GIS_FDP_PL WHERE  FDP_NUMBER =  '".$fdpNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "42" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(FTC_ID) as MAX_ID FROM GIS_FTC ORDER BY FTC_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
	
$sql="INSERT INTO GIS_FTC_PL(FTC_NUMBER,FTC_LEA_NAME,FTC_ROAD_NAME,FTC_SIDE,FTC_TYPE,FTC_CAPACITY,FTC_LON,FTC_LAT,FTC_RTOM,FTC_USER_ID,FTC_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "43" ){

$ftcNo = $_POST['ftcNo'];

$sql="DELETE FROM GIS_FTC_PL WHERE  FTC_NUMBER =  '".$ftcNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "44" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(FJ_ID) as MAX_ID FROM GIS_FJ ORDER BY FJ_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
	
$sql="INSERT INTO GIS_FJ_PL(FJ_NUMBER,FJ_MHP_NUMBER,FJ_TYPE,FJ_LON,FJ_LAT,FJ_RTOM,FJ_SHEATH_NUMBER,FJ_USER_ID,FJ_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "45" ){

$fjNo = $_POST['fjNo'];

$sql="DELETE FROM GIS_FJ_PL WHERE  FJ_NUMBER = '".$fjNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "46" ){

$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(ODF_ID) as MAX_ID FROM GIS_ODF ORDER BY ODF_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
$sql="INSERT INTO GIS_ODF_PL(ODF_NUMBER,ODF_LEA_NAME,ODF_LB_LOCATION,ODF_LAC,ODF_RACK_NUMBER,ODF_SHEATH_NAME,ODF_NUMBER_CT,ODF_LON,ODF_LAT,ODF_RTOM,ODF_USER_ID,ODF_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."','".$info[4]."','".$info[5]."','".$info[6]."','".$info[7]."','".$info[8]."','".$info[9]."','".$username."','".$next_ID."')";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
    $result = "done";
  
}

if ($q == "47" ){

$odfNo = $_POST['odfNo'];

$sql="DELETE FROM GIS_ODF_PL WHERE  ODF_NUMBER = '".$odfNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
            
    $result = "done";
  
}

if ($q == "48" ){

$info = $_POST['info'];

 $sql="UPDATE GIS_DUCT_PL SET
       D_LENGTH        	= '".$info[1]."',
       D_PROTECTION    	= '".$info[2]."',
       D_DAMAGE      	= '".$info[3]."',
       D_REMARKS      	= '".$info[4]."',
       D_TYPE      		= '".$info[5]."',
       D_NUM_WAY      	= '".$info[6]."',
       D_DUCT_NUMBER    = '".$info[7]."',
       D_SUBDUCT     	= '".$info[8]."',
       D_SIZE      		= '".$info[9]."',
       D_MH_END1      	= '".$info[10]."',
       D_MH_END2      	= '".$info[11]."'        
       WHERE  D_ID 	= '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
	$result = "done";
	
}

if ($q == "49" ){

$info = $_POST['info'];

$sql="UPDATE GIS_TP_PL SET
      TP_CUSTOMER_NAME      = '".$info[1]."',
      TP_NUMBER_CT          = '".$info[2]."',
      TP_CPODF_TYPE         = '".$info[3]."',
      TP_CUSTOMER_TYPE      = '".$info[4]."',
      TP_CUSTOMER_SUBTYPE   = '".$info[5]."',
      TP_SERVICE_PROVIDED   = '".$info[6]."',
      TP_TOWER_OWNER        = '".$info[7]."'           
      WHERE  TP_ID          =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
     $result = "done";
	
}

if ($q == "50" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FDP_PL SET
	  FDP_LEA_NAME       	   = '".$info[1]."',
	  FDP_ROAD_NAME       	   = '".$info[2]."', 
      FDP_SPLITTERS_COUNT      = '".$info[3]."',
      FDP_SPLITTER_TYPE        = '".$info[4]."'       
      WHERE  FDP_ID            = '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
	$result = "done";
	
}


if ($q == "51" ){

$info = $_POST['info'];

 $sql="UPDATE GIS_MANHOLE_HANDHOLE_PL SET
      MH_LAT		    = '".$info[1]."',
      MH_LON		    = '".$info[2]."'    
      WHERE  MH_ID  	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
    $result = "done";
	
}


if ($q == "52" ){

$info = $_POST['info'];

$sql="UPDATE GIS_POLES_PL SET
       P_LAT     	= '".$info[1]."',
       P_LON   		= '".$info[2]."'
       WHERE  P_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
	$result = "done";
}


if ($q == "53" ){

$info = $_POST['info'];

$sql="UPDATE GIS_TP_PL SET
       TP_LAT     		= '".$info[1]."',
       TP_LON   		= '".$info[2]."'
       WHERE TP_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	       
	$result = "done";
}

if ($q == "54" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FDP_PL SET
       FDP_LAT     		= '".$info[1]."',
       FDP_LON   		= '".$info[2]."'
       WHERE FDP_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	        
	$result = "done";
}

if ($q == "55" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FTC_PL SET
       FTC_LAT     		= '".$info[1]."',
       FTC_LON   		= '".$info[2]."'
       WHERE FTC_ID =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
	$result = "done";
}

if ($q == "56" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FJ_PL SET
       FJ_LAT     		= '".$info[1]."',
       FJ_LON   		= '".$info[2]."'
       WHERE FJ_ID  =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	       
	$result = "done";
}

if ($q == "57" ){

$info = $_POST['info'];

$sql="UPDATE GIS_ODF_PL SET
       ODF_LAT     		= '".$info[1]."',
       ODF_LON   		= '".$info[2]."'
       WHERE ODF_ID     =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
            
	$result = "done";
}

if ($q == "58" ){

$info = $_POST['info'];

$sql="UPDATE GIS_POLES SET
       P_LAT     	= '".$info[1]."',
       P_LON   		= '".$info[2]."'
       WHERE  P_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
            
	$result = "done";
}

if ($q == "59" ){

$info = $_POST['info'];

$sql="UPDATE GIS_MANHOLE_HANDHOLE_PL SET
      MH_LAT		    = '".$info[1]."',
      MH_LON		    = '".$info[2]."' ,
	  MH_USER_ID		= '".$username."',
	  MH_AP_STATUS      = '0'
      WHERE  MH_NUMBER  = '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
$SQLDel="delete from GIS_MANHOLE_HANDHOLE WHERE  MH_NUMBER = '".$info[0]."'";

	$stid1=oci_parse($CON,$SQLDel);
    oci_execute($stid1);
	
    $result = "done";
	
}

if ($q == "60" ){

$info = $_POST['info'];

$sql="UPDATE GIS_TP SET
       TP_LAT     		= '".$info[1]."',
       TP_LON   		= '".$info[2]."'
       WHERE TP_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
            
	$result = "done";
}

if ($q == "61" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FDP SET
      FDP_LAT     		= '".$info[1]."',
      FDP_LON   		= '".$info[2]."'
      WHERE FDP_ID 	=  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	        
	$result = "done";
}

if ($q == "62" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FTC SET
       FTC_LAT     		= '".$info[1]."',
       FTC_LON   		= '".$info[2]."'
       WHERE FTC_ID =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	        
	$result = "done";
}

if ($q == "63" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FJ SET
       FJ_LAT     		= '".$info[1]."',
       FJ_LON   		= '".$info[2]."'
       WHERE FJ_ID  =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	        
	$result = "done";
}

if ($q == "64" ){

$info = $_POST['info'];

$sql="UPDATE GIS_ODF SET
       ODF_LAT     		= '".$info[1]."',
       ODF_LON   		= '".$info[2]."'
       WHERE ODF_ID  =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	        
	$result = "done";
}

if ($q == "65" ){

$rtom = $_GET['rtom'];

$sql="SELECT DISTINCT D_NAME FROM GIS_DUCT WHERE D_RTOM = '$rtom' ORDER BY D_NAME";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ="";
	while ($row = oci_fetch_array($stid))
	{
		$result = $result.$row['D_NAME']."@";
	}
	
}

if ($q == "66" ){

$rtom = $_GET['rtom'];

$sql="SELECT DISTINCT MH_NUMBER FROM GIS_MANHOLE_HANDHOLE WHERE MH_RTOM='$rtom' ORDER BY MH_NUMBER";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ="";
	while ($row = oci_fetch_array($stid))
	{
		$result = $result.$row['MH_NUMBER']."@";
	}
	
}

if ($q == "67" ){

$netcode = $_POST['netcode'];

$sql="SELECT DISTINCT COUNT(D_NAME) AS REC_COUNT FROM GIS_DUCT WHERE D_MH_END1='$netcode' OR D_MH_END2='$netcode'";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ="";
	$row = oci_fetch_array($stid);
	$result = $row['REC_COUNT'];
	
}


if ($q == "68" ){

$result ="";
	
$netdata = $_POST['netdata'];
$cblcode = $_POST['cblcode'];
$rtom = $_POST['rtom'];

$netdArr = explode(',',$netdata);

$startpoint = $netdArr[0];
$endpoint = $netdArr[1];

$sql="SELECT * FROM GIS_DUCT WHERE (D_MH_END1='$startpoint' AND D_MH_END2='$endpoint') OR (D_MH_END1='$endpoint' AND D_MH_END2='$startpoint') AND D_RTOM='$rtom'";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$row = oci_fetch_array($stid);
	
	$cordinates = $row['D_CORDS'];
	$D_NAME = $row['D_NAME'];
	
$sql2="INSERT INTO GIS_CABLE_PL(C_NAME,C_COORDINATES,C_RTOM,C_USER_ID,C_MH_END1,C_MH_END2,C_DUCT,C_ID) VALUES ('".$cblcode."','".$cordinates."','".$rtom."','".$username."','".$startpoint."','".$endpoint."','".$D_NAME."',PLGIS_CABLE_SEQ.nextval)";

    $stid2=oci_parse($CON,$sql2);
    
	if(oci_execute($stid2)){
         
		$result = "done";
		
	}else{
	
	$result = "fail";
	
	}
  
}

if ($q == "69" ){

$rtom = $_GET['rtom'];

$sql="SELECT DISTINCT P_NUMBER FROM GIS_POLES WHERE P_RTOM = '".$rtom."' ORDER BY P_NUMBER";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ="";
	while ($row = oci_fetch_array($stid))
	{
		$result = $result.$row['P_NUMBER']."@";
	}
	
}


if ($q == "70" ){

$result ="";
	
$netdata = $_POST['netdata'];
$rtom = $_POST['rtom'];

$netdArr = explode('/',$netdata);

	for($n=0; $n<sizeof($netdArr); $n++){
		
		$p_number = $netdArr[$n];
		
		$sql="SELECT * FROM GIS_POLES WHERE P_NUMBER='$p_number' AND P_RTOM='$rtom'";
		$stid=oci_parse($CON,$sql);
		oci_execute($stid);
		$row = oci_fetch_array($stid);
		
		$P_LON = $row['P_LON'];
		$P_LAT = $row['P_LAT'];
		
		if($P_LON == '' && $P_LAT==''){
			 
		$sql2="SELECT * FROM GIS_POLES_PL WHERE P_NUMBER='$p_number' AND P_RTOM='$rtom'";
		$stid2=oci_parse($CON,$sql2);
		oci_execute($stid2);
		$row2 = oci_fetch_array($stid2);
		
		$P_LON = $row2['P_LON'];
		$P_LAT = $row2['P_LAT'];
			
		}
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
	}
  
}


if ($q == "71" ){

$result ="";
	
$cordinates = $_POST['cblcords'];
$cblcode = $_POST['cblcode'];
$rtom = $_POST['rtom'];

	
$sql2="INSERT INTO GIS_CABLE_PL(C_NAME,C_COORDINATES,C_RTOM,C_USER_ID,C_ID) VALUES ('".$cblcode."','".$cordinates."','".$rtom."','".$username."',PLGIS_CABLE_SEQ.nextval)";

    $stid2=oci_parse($CON,$sql2);
    
	if(oci_execute($stid2)){
         
		$result = "done";
		
	}else{
	
	$result = "fail";
	
	}
  
}


if ($q=="72") {

  $rtom = $_GET['rtom'];

  $sql="SELECT COUNT(C_NAME) AS REC_COUNT FROM GIS_CABLE WHERE C_RTOM =  '$rtom'";
  $stid=oci_parse($CON,$sql);
  oci_execute($stid);

   $row = oci_fetch_array($stid);
   $result = $row['REC_COUNT'];
   
}


// ---------------------------------------update ----------------------------------------------------

if ($q == "73" ){

$info = $_POST['info'];

 $sql="UPDATE GIS_CABLE_PL SET
      C_TYPE      = '".$info[1]."',
      C_DUCT      = '".$info[2]."',
      C_MH_END1   = '".$info[3]."',
      C_MH_END2   = '".$info[4]."',
      C_LENGTH    = '".$info[5]."',
      C_CORES     = '".$info[6]."'        
      WHERE C_ID  =  '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
    $result = "done";
  
}


if ($q == "74" ){

$cblNo = $_POST['cblNo'];

$sql="DELETE FROM GIS_CABLE WHERE  C_NAME=  '".$cblNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
    $result = "done";
 }

if ($q == "75" ){

$info = $_POST['info'];
	
	$sql1 = "SELECT * FROM GIS_CABLE WHERE C_ID = '".$info[0]."'";
		
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row1 = oci_fetch_array($stid1);
		
	   $C_ID   = $row1['C_ID'];
	   $C_NAME = $row1['C_NAME'];
	   $C_TYPE = $row1['C_TYPE'];
	   $C_CORES = $row1['C_CORES'];
	   $C_COORDINATES = $row1['C_COORDINATES'];
	   $C_MH_END1 = $row1['C_MH_END1'];
	   $C_MH_END2 = $row1['C_MH_END2'];
	   $C_RTOM	= $row1['C_RTOM'];
	   $C_TESSALLATE = $row1['C_TESSALLATE'];
	   $C_LENGTH = $row1['C_LENGTH'];
	   $C_DUCT = $row1['C_DUCT'];
	   $CBL_CREATED_USER = $row1['CBL_CREATED_USER'];
	   
	$sql3 = "DELETE FROM GIS_CABLE_PL WHERE C_ID = '".$info[0]."'";

	$stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);
	
		
	$sql4 = "UPDATE GIS_CABLE SET C_STATUS = '0' WHERE C_ID = '".$info[0]."'";

	$stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);
	
	$sql2 = "INSERT INTO GIS_CABLE_PL (C_ID,C_NAME,C_TYPE,C_CORES,C_COORDINATES,C_MH_END1,C_MH_END2,C_RTOM,C_TESSALLATE,C_LENGTH,C_DUCT,C_USER_ID,C_AP_STATUS)
VALUES ('".$C_ID."' , '".$C_NAME."' , '".$C_TYPE."', '".$C_CORES."','".$C_COORDINATES."','".$C_MH_END1."','".$C_MH_END2."','".$C_RTOM."','".$C_TESSALLATE."','".$C_LENGTH."','".$C_DUCT."','".$username."','4')";

    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);
	
    $result = "done";
  
}


if ($q == "76" ){

$cblNo = $_POST['cblNo'];

$sql="DELETE FROM GIS_CABLE_PL WHERE C_ID =  '".$cblNo."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
       
    $result = "done";
 }
 
 
 if ($q == "77" ){

$result ="";
	
$info = $_POST['info'];

$sqlMax = "SELECT  DISTINCT MAX(C_ID) as MAX_ID FROM GIS_CABLE ORDER BY C_ID DESC";

	$stidmax=oci_parse($CON,$sqlMax);
    oci_execute($stidmax);
	$rowmax = oci_fetch_array($stidmax);
	
	if($rowmax['MAX_ID'] == ''){
		$next_ID = 1;
	}else{
		$next_ID = $rowmax['MAX_ID'] + 1;
	}
	
$sql2="INSERT INTO GIS_CABLE_PL(C_NAME,C_TYPE,C_CORES,C_COORDINATES,C_MH_END1,C_MH_END2,C_RTOM,C_LENGTH,C_DUCT,C_USER_ID,C_ID) VALUES ('".$info[0]."','".$info[1]."','".$info[5]."','".$info[8]."','".$info[2]."','".$info[3]."','".$info[7]."','".$info[4]."','".$info[6]."','".$username."','".$next_ID."')";

    $stid2=oci_parse($CON,$sql2);
    
	if(oci_execute($stid2)){
         
		$result = "done";
		
	}else{
	
	$result = "fail";
	
	}
  
}


if ($q == "78" ){

$rtom = $_GET['rtom'];

$sql="SELECT DISTINCT C_NAME FROM GIS_CABLE WHERE C_RTOM = '$rtom' ORDER BY C_NAME";
    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	$result ="";
	while ($row = oci_fetch_array($stid))
	{
		$result = $result.$row['C_NAME']."@";
	}
	
}


if ($q == "79" ){

	$rtom = $_POST['rtom'];

	$sql="SELECT * FROM GIS_MANHOLE_HANDHOLE WHERE MH_RTOM =  '$rtom' ORDER BY MH_ID ASC";
	$stid=oci_parse($CON,$sql);
	oci_execute($stid);
	
	$result ="";
	
	while($row = oci_fetch_array($stid))
	{

		$sql2="SELECT * FROM gis_manhole_handhole WHERE MH_RTOM = '".$rtom."' AND MH_NUMBER = '".$row['MH_AP_NUMBER']."'";
		$stid2=oci_parse($CON,$sql2);
		oci_execute($stid2);
		
		while ($row2 = oci_fetch_array($stid2))
		{
		
		 $result .= "".$row['MH_LAT'].",".$row['MH_LON']."*".$row['MH_NUMBER']."*".$row2['MH_LAT'].",".$row2['MH_LON']."*".$row['MH_AP_NUMBER']."@";
		
		}
		
	}
	
}


if ($q == "80" ){

$rtom = $_POST['rtom'];
$path = $_POST['path'];
$cMhNo = $_POST['cMhNo'];
$nMhNo = $_POST['nMhNo'];
$ductName = 'A_Float_D_'.$_POST['counter'];

	$result='';

	$SQL1 = "SELECT COUNT(*) as REC FROM GIS_DUCT_PL WHERE D_NAME = '$ductName' and D_RTOM='$rtom'";

	$stid1=oci_parse($CON,$SQL1);
	oci_execute($stid1);
	
	$row1 = oci_fetch_array($stid1);
	
	$recAv = $row1['REC'];
	
	$SQL2 = "SELECT D_ID FROM GIS_DUCT_PL WHERE D_NAME = '$ductName' and D_RTOM = '$rtom'";

	$stid2=oci_parse($CON,$SQL2);
	oci_execute($stid2);
	
	$row2 = oci_fetch_array($stid2);
	
	$D_ID = $row2['D_ID'];
	
	if($recAv == 0){
	
	$sql="INSERT INTO GIS_DUCT_PL(D_NAME,D_CORDS,D_MH_END1,D_MH_END2,D_RTOM,D_USER_ID,D_ID) VALUES ('".$ductName."','".$path."','".$cMhNo."','".$nMhNo."','".$rtom."','".$username."',PLGIS_DUCT_SEQ.nextval)";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
         
		$result = "done";
	
	}else{
	
	$sql="UPDATE GIS_DUCT_PL SET
		D_CORDS     = '".$path."'        
		WHERE D_ID  =  '".$D_ID."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
  
		$result = "done";
  
	}
  
}

if ($q == "81" ){

$rtom = $_GET['rtom'];

$result ="";
	
$sql1="SELECT DISTINCT P_NUMBER FROM GIS_POLES WHERE P_RTOM = '".$rtom."' ORDER BY P_NUMBER";
    $stid1=oci_parse($CON,$sql1);
    oci_execute($stid1);

	while ($row1 = oci_fetch_array($stid1))
	{
		$result = $result.$row1['P_NUMBER']."@";
	}
	
$sql2="SELECT DISTINCT MH_NUMBER FROM GIS_MANHOLE_HANDHOLE WHERE MH_RTOM='$rtom' ORDER BY MH_NUMBER";
    $stid2=oci_parse($CON,$sql2);
    oci_execute($stid2);

	while ($row2 = oci_fetch_array($stid2))
	{
		$result = $result.$row2['MH_NUMBER']."@";
	}
	
$sql3="SELECT DISTINCT FDP_NUMBER FROM GIS_FDP WHERE FDP_RTOM='$rtom' ORDER BY FDP_NUMBER";
    $stid3=oci_parse($CON,$sql3);
    oci_execute($stid3);

	while ($row3 = oci_fetch_array($stid3))
	{
		$result = $result.$row3['FDP_NUMBER']."@";
	}
	
$sql4="SELECT DISTINCT FJ_NUMBER FROM GIS_FJ WHERE FJ_RTOM='$rtom' ORDER BY FJ_NUMBER";
    $stid4=oci_parse($CON,$sql4);
    oci_execute($stid4);

	while ($row4 = oci_fetch_array($stid4))
	{
		$result = $result.$row4['FJ_NUMBER']."@";
	}
	
$sql5="SELECT DISTINCT FTC_NUMBER FROM GIS_FTC WHERE FTC_RTOM='$rtom' ORDER BY FTC_NUMBER";
    $stid5=oci_parse($CON,$sql5);
    oci_execute($stid5);

	while ($row5 = oci_fetch_array($stid5))
	{
		$result = $result.$row5['FTC_NUMBER']."@";
	}
	
$sql6="SELECT DISTINCT ODF_NUMBER FROM GIS_ODF WHERE ODF_RTOM='$rtom' ORDER BY ODF_NUMBER";
    $stid6=oci_parse($CON,$sql6);
    oci_execute($stid6);

	while ($row6 = oci_fetch_array($stid6))
	{
		$result = $result.$row6['ODF_NUMBER']."@";
	}
	
$sql7="SELECT DISTINCT TP_NAME FROM GIS_TP WHERE TP_RTOM='$rtom' ORDER BY TP_NAME";
    $stid7=oci_parse($CON,$sql7);
    oci_execute($stid7);

	while ($row7 = oci_fetch_array($stid7))
	{
		$result = $result.$row7['TP_NAME']."@";
	}
	
}


if ($q == "82" ){

$result ="";
	
$netdata = $_POST['netdata'];
$rtom = $_POST['rtom'];

$netdArr = explode('/',$netdata);

	for($n=0; $n<sizeof($netdArr); $n++){
		
		$N_number = $netdArr[$n];
		
		$sql1="SELECT * FROM GIS_POLES WHERE P_NUMBER='$N_number' AND P_RTOM='$rtom'";
		$stid1=oci_parse($CON,$sql1);
		oci_execute($stid1);
		$row = oci_fetch_array($stid1);
		
		$P_LON = $row['P_LON'];
		$P_LAT = $row['P_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
			 
		$sql2="SELECT * FROM GIS_MANHOLE_HANDHOLE WHERE MH_NUMBER='$N_number' AND MH_RTOM='$rtom'";
		$stid2=oci_parse($CON,$sql2);
		oci_execute($stid2);
		$row2 = oci_fetch_array($stid2);
		
		$P_LON = $row2['MH_LON'];
		$P_LAT = $row2['MH_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
		$sql3="SELECT * FROM GIS_FDP WHERE FDP_NUMBER='$N_number' AND FDP_RTOM='$rtom'";
		$stid3=oci_parse($CON,$sql3);
		oci_execute($stid3);
		$row3 = oci_fetch_array($stid3);
		
		$P_LON = $row3['FDP_LON'];
		$P_LAT = $row3['FDP_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
		$sql4="SELECT * FROM GIS_FJ WHERE FJ_NUMBER='$N_number' AND FJ_RTOM='$rtom'";
		$stid4=oci_parse($CON,$sql4);
		oci_execute($stid4);
		$row4 = oci_fetch_array($stid4);
		
		$P_LON = $row4['FJ_LON'];
		$P_LAT = $row4['FJ_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
		$sql5="SELECT * FROM GIS_FTC WHERE FTC_NUMBER='$N_number' AND FTC_RTOM='$rtom'";
		$stid5=oci_parse($CON,$sql5);
		oci_execute($stid5);
		$row5 = oci_fetch_array($stid5);
		
		$P_LON = $row5['FTC_LON'];
		$P_LAT = $row5['FTC_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
		$sql6="SELECT * FROM GIS_ODF WHERE ODF_NUMBER='$N_number' AND ODF_RTOM='$rtom'";
		$stid6=oci_parse($CON,$sql6);
		oci_execute($stid6);
		$row6 = oci_fetch_array($stid6);
		
		$P_LON = $row6['ODF_LON'];
		$P_LAT = $row6['ODF_LAT'];
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
		$sql7="SELECT * FROM GIS_TP WHERE TP_NAME='$N_number' AND TP_RTOM='$rtom'";
		$stid7=oci_parse($CON,$sql7);
		oci_execute($stid7);
		$row7 = oci_fetch_array($stid7);
		
		$P_LON = $row7['TP_LON'];
		$P_LAT = $row7['TP_LAT'];
		
		
		if($P_LON != '' && $P_LAT!=''){
		
			$result .= $P_LON.','.$P_LAT.',0 ';
		}
		
	}
  
}

if ($q == "83" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FTC_PL SET
	  FTC_LEA_NAME  = '".$info[1]."',
	  FTC_ROAD_NAME = '".$info[2]."', 
	  FTC_SIDE      = '".$info[3]."',
	  FTC_TYPE      = '".$info[4]."',
	  FTC_CAPACITY  = '".$info[5]."',
      FTC_FEATURE   = '".$info[6]."'       
      WHERE  FTC_ID = '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
    $result = "done";
	
}

if ($q == "84" ){

$info = $_POST['info'];

$sql="UPDATE GIS_FJ_PL SET
	  FJ_MHP_NUMBER  = '".$info[1]."',
	  FJ_TYPE		 = '".$info[2]."', 
	  FJ_SHEATH_NUMBER = '".$info[3]."'       
      WHERE  FJ_ID = '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
    $result = "done";
	
}

if ($q == "85" ){

$info = $_POST['info'];

$sql="UPDATE GIS_ODF_PL SET
	  ODF_LEA_NAME  = '".$info[1]."',
	  ODF_LB_LOCATION = '".$info[2]."', 
	  ODF_LAC = '".$info[3]."' ,
	  ODF_RACK_NUMBER  = '".$info[4]."', 
	  ODF_SHEATH_NAME = '".$info[5]."',
	  ODF_NUMBER_CT = '".$info[6]."'
      WHERE ODF_ID = '".$info[0]."'";

    $stid=oci_parse($CON,$sql);
    oci_execute($stid);
	
    $result = "done";
	
}


echo $result;
?>