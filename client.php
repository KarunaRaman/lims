﻿<!DOCTYPE html>

<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:2%;
	display:block;
	float: center;
}
.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-left:0%;
	font-size:110%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.dis {
	pointer-events: none;
	cursor: default;
	color:#595959;
}
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
}

</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header.php'; 
        $client_id;
    	if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["client_id"])){
                $client_id = $_GET["client_id"];
            }
            
        }
?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Clients Information</h1>                      														  
    <div class="row">
        <div class="col-md-6">
        <form action="" method="get">
                            <label for="client_id">Client ID</label>
                            <input type="text" name="client_id" id="client_id" value="<?php echo isset($client_id) && !empty($client_id) ? $client_id : '' ?>">
                            <input class="searchBtn" type="submit" name="submit" value="SEARCH" >	
                            <a class="btn btn-danger" href="client.php" id="reset">Reset</a>		   
                        </form>
        </div>
        <div class="col-md-6">
        <button class="btn" align="center"> 
						<a href="addClient.php" class="btn">Add Client</a>
		</button>	
        </div>
    </div>
                        
				     						   
											
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php

	$sql = "SELECT client_id,name,birth_date,nid,phone,address,agent_id FROM client";
        if(isset($client_id) && !empty($client_id)){            
            $sql .= " where client_id = '$client_id'";
        }
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>POLICY ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>Birth Date</th>\n";
    echo "    <th>NID</th>\n";
    echo "    <th>PHONE</th>\n";
	echo "    <th>ADDRESS</th>\n";
	echo "    <th>STATUS</th>\n";
	echo "    <th>UPDATE</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["client_id"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
		echo "    <td>".$row["birth_date"]."</td>\n";
		echo "    <td>".$row["nid"]."</td>\n";
		echo "    <td>".$row["phone"]."</td>\n";
		echo "    <td>".$row["address"]."</td>\n";
		echo "    <td>"."<a href='clientStatus.php?client_id=".$row["client_id"]. "'>Client Status</a>"."</td>\n";
		if($row["agent_id"]== $username || "ahmed" == $username){
			echo "<td>"."<a href='editClient.php?client_id=".$row["client_id"]. "'>Edit</a>"."</td>\n";
		}else {
			echo "<td>"."<a class=\"dis\" href='editClient.php?client_id=".$row["client_id"]. "'>Edit</a>"."</td>\n";
		}

	}
	}
?>

            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>
