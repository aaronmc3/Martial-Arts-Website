<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
</head>


<body background="bg.png">
	<div style="width: 100%;margin: 0" class="row">
		<?php include 'header.php';include 'db.php'; ?>
		<div style="max-width: 100%;margin: 0;margin-top: 5vh;margin-bottom: 10vh;" class="row">
<div class="col-md-1"></div>
<div class="col-md-10 products-container">
	<?php
		
		$sbar = '';
		if (isset($_POST['Searchbar'])){
			$sbar = $_POST['Searchbar'];
		}
		/*$query = "SELECT * FROM `dmt_objects` WHERE PipelineAndWorkflow = 'RWP WF  Ready for 4Sprint' ORDER BY `Team` DESC  ;";
		$select_projects = mysql_query($query);
		if (mysql_num_rows($select_projects) > 0) {
			while($row = mysql_fetch_assoc($select_projects)) {
				echo '<div>'.$row['Team'].'</div>';
			}
		}*/
		//$x = 0;
		//echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . "."
		//if(0==$x){
		$initialquery = "SELECT * FROM ProductListView WHERE ProductName LIKE '%".$sbar."%' OR MartialArt LIKE '%".$sbar."%' OR ClothingCategory LIKE '%".$sbar."%';";
		$shortproducts = $mypdo->prepare($initialquery);
		$shortproducts->execute();
		/*}else{
		$initialquery = "SELECT * FROM `product` WHERE ClothingCategory = '$prod';";
		}*/
		$foundamount = 0;
		while($presult = $shortproducts->fetch()){
			if($foundamount%"4"=="0"&&$foundamount!="0"){
				echo '</div>
				<div class="row">';
			}
			if($foundamount=="0"){
				echo '<div class="row">';
			}
			echo '<div class="col-md-4 productbox col-xs-12 col-sm-6 col-lg-3">
				<div id="'.$presult['ProductID'].'" class="col-md-12 hoverbox"><img src="'.$presult['ImageURL'].'" class="img-rounded '.$presult['ProductID'].'">
				<div class="ptitle"><b class="purchasetitle '.$presult['ProductID'].'" style="word-wrap: break-word;">'.$presult['ProductName'].'</b></div>
				<div class="pprice"><div class="pull-right"><a href="#" class="btn btn-success initialb" data-toggle="modal" data-target="#successmodal" role="button">
				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</a></div>
				<div class="prtext '.$presult['ProductID'].'">£'.$presult['SalePrice'].'</div></div></div></div>';
			$foundamount=$foundamount+1;
		}
		echo '</div>';
		if($foundamount == 0){
			echo '<h1 style="position:absolute;left:27vw;top:18vh;z-index:30;color:white;">Unfortunately there were no results found for "'.$sbar.'"...</h1>';
		}
		else{
			echo '<h1 style="position:absolute;left:27vw;top:-10vh;z-index:30;color:white;">Results found in search for "'.$sbar.'": '.$foundamount.'</h1>';
		}
		
		/*
		$products = array(
		array("https://img.buzzfeed.com/buzzfeed-static/static/2014-07/8/9/enhanced/webdr06/original-30519-1404825515-35.jpg?downsize=715:*&output-format=auto&output-quality=auto","Green Belt","£5.00"),
		array("https://img.buzzfeed.com/buzzfeed-static/static/2014-07/8/9/enhanced/webdr04/enhanced-buzz-8390-1404826370-30.jpg?downsize=715:*&output-format=auto&output-quality=auto","Blue Belt","£8.69"),
		array("https://img.buzzfeed.com/buzzfeed-static/static/2014-07/8/9/enhanced/webdr10/enhanced-buzz-15114-1404826975-34.jpg?downsize=715:*&output-format=auto&output-quality=auto","Brown Belt","£10.99"),
		array("https://img.buzzfeed.com/buzzfeed-static/static/2014-07/8/9/enhanced/webdr10/enhanced-buzz-15122-1404827271-42.jpg?downsize=715:*&output-format=auto&output-quality=auto","Black BeltAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","£15.00")
		);
		for($i = 0; $i < sizeof($products); $i++){
			echo '<div class="col-md-4 productbox col-xs-12 col-sm-6 col-lg-3"><div class="col-md-12 hoverbox"><img src="'.$products[$i][0].'" class="img-rounded">
    <div class="ptitle"><b style="word-wrap: break-word;">'.$products[$i][1].'</b></div>
    <div class="pprice"><div class="pull-right"><div class="btn btn-success initialb" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</div></div><div class="prtext">'.$products[$i][2].'</div></div></div></div>';
		}*/
	?>

</div>
<div class="col-md-1"></div>
<div class="productoverlay" style="overflow-y:auto;">
<div class="row">
				<div class="col-xs-1"></div>
                <div class="col-xs-5 product-photo-detailed pull-center">
                    <img class="detailedimage" style="width:90%;border-radius: 15px" src="" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <h3 class="namedetailed"></h3>    
					<div class="customrow" style="padding-bottom:10px;">
						<h6 class="title-price"><small>Product Price</small></h6>
						<h3 style="margin-top:0px;" class="detailedprice"></h3>
						<h6 class="title-attr">Available stock:</h6><h6 class="stockdetailed"></h6>                    
						<div class="customrow" style="padding-bottom:20px;">
							<h6 class="title-attr"><small>Choose your amount:</small></h6>                    
							<div>
								<div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
								<input class="productamount" value="1"/>
								<div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
							</div>
						</div>                
					</div>
                    <div class="customrow" style="padding-bottom:20px;">
                        <button data-toggle="modal" data-target="#successmodal" class="btn btn-success pull-center">
						<span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
						</span> Add to basket
						</button> 
					</div>
                </div> 
				<div class="col-xs-1"></div>
        </div>
		<div class="row">
				<div class="col-xs-1">
				</div>
                <div class="col-xs-10">
                    <ul class="menu-items">
                        <li class="active">Description</li>
                    </ul>
                    <div style="width:100%;height:25%;border-top:1px solid silver;overflow-y:scroll;">
                        <p style="padding:10px;">
                            <small class="paradescription">
							
                            </small>
                        </p>
                    </div>
                </div>		
        </div>
	</div>
</div>
<div class="modal fade" id="successmodal" role="dialog">
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">
		<div class="modal-body">
		  <p>Your shopping cart has been updated.</p>
		</div>
		<div style="text-align:center" class="modal-footer ">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
		</div>
	  </div>
	</div>
</div>
<?php include 'footer.php' ?>
</div>
<div id="overlay"></div>
<script src="productoverlay2.js"></script>
</body>


</html>
