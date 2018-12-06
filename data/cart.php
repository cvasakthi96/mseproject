 <?php   
 session_start();  
require 'conn.php';  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'farmer'          =>     $_POST["hidden_farmer"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'        =>     $_GET["id"],  
                'item_name'      =>     $_POST["hidden_name"],  
                'item_price'     =>     $_POST["hidden_price"],  
                'farmer'     =>     $_POST["hidden_farmer"],  
                'item_quantity'  =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      } 
if($_GET["action"] == "emptycart")  
      { 
unset($_SESSION["shopping_cart"]);
unset($_SESSION["items"]);
  $_SESSION["items"]=Null;
	  }	  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
 <script>
 new WOW().init();
 </script>
 </head>  
      <body   STYLE="background-color:transparent" background="html/images/bg/BG5.jpg">  
       
	   <div class="well"   style="   background-color:#DFF0D8;  position: fixed;
    will-change: transform;
    width: 100%;
    z-index: 10;
padding: 1px;
    ">          
  <h5 class="text-center text-success wow fadeInLeft" ><img class="img" src="html/images/bg/BG7.png">-AGROSERVICES ONLINE BUYER PORTAL</h5>
</div> 
 
           <div  class="tab-content"style="padding:150px">  
               
                
				    
				<?php  
                     
                 $str='SELECT  * from product';		
                   $s = sqlsrv_query($conn,$str);
              

                  while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_ASSOC) ) {

                ?>   <div  class="col-md-3">   <div class=' panel  panel-success'>
	        <div class='panel panel-heading'><?php echo $row["name"]; ?></div>
		       <div class=' panel panel-body'>
		       <img class='img ' src='html/images/cart/<?php echo $row['images'];?>'> 
               <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">  
                                           						  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">Rs <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="text" class="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="text"  class="hidden"name="hidden_farmer" value="<?php echo $row["farmer"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add" onclick="add_element_to_array();" class="btn btn-success" value="Add to Cart" />  
                        
                     </form>   
		    </div> 
			</div>
			</div>
		
                 
                <?php  
                     }  
                  
                ?> 
			
				
	
	
	<div id="Result"></div> 
                <div style="clear:both"></div>  
                <br />  
				<div class="row" >
                <h3 class="text-success" >Order Details</h3> 
                
				</div>
				<div class="table">  
				
				
                   
	        	  <table class="table table-primary table-bordered table-hover">
                          <a  style="float:right;" class="btn btn-success " href="cart.php?action=emptycart">Empty Cart</a>  
						  <tr style="   background-color:#DFF0D8;">  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               { 
							
							
							$cva.= ','.$values["item_name"]." ".$values["item_quantity"] ;
					$_SESSION["items"]=$cva;
							
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>Rs<?php echo $values["item_price"]; ?></td>  
                               <td>Rs<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
						                   unset($_SESSION['total']);
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
									$_SESSION['total']=$total;
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right"> Total </td>  
                               <td align="right">Rs <?php echo number_format($total, 2); ?></td>  
                               <td> <button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal">Buy</button></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                      </table>
					  
					  
					  
					  
					  
			
                      <!-- order place-->
					  
					  <div  id=modelforbuy>
					
					 
					 
				

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buy</h4>
	  </div>
      <div class="modal-body">
     <table>
	<form class='form-inline' method='POST' action='' >
	<tr><td>
	<label class=' control-label text-success'>  NAME</label>  </td>  <td>  <input type=text class='form-control'   name=username1    placeholder='enter your name'><br>
	</td>       <td>
	<label class=' control-label text-success'>  SELECT SELLER</label>  </td><td> <select class='form-control'   name=farmer1>
	<option value="sivasakthi">sivasakthi</option>
	<option value="Nirmal">Nirmal</option>
	<option value="Tharun">Tharun</option>
	<option value="amma">amma</option>
</select> 


	</td>  </tr> 
	
	<tr><td>
	<label class=' control-label text-success'>  MOBILENUMBER</label> </td><td>  <input type=text class='form-control'   name=mobilenumber1    placeholder='enter your Mobilenumber'><br>
	</td></tr> 
	
	<tr><td>
	
	<label class=' control-label text-success'>  ADDRESS</label>  </td><td> <input type=textarea class='form-control'   name=address1    placeholder='enter your address'><br>
	</td></tr> <tr><td>
	<input type=submit class='form-control btn btn-success btn-lg' name='placeorder'  value='PLACE ORDER'>
	</td></tr></form>
	 </table>
	 
	 
  <?php 
  require'conn.php';
  
  	$a=$_POST['username1'];
  	$b=$_POST['mobilenumber1'];
  	$c=$_POST['address1'];
$buyer=$a."+".$b."+".$c;
$seller=$_POST['farmer1'];


	$details=$_SESSION["items"]; 
  if(isset($_POST['placeorder'])){




	   	  $st1="insert into  buyers values('$buyer','$details','$seller')";
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults===false){
		
		echo("<h4 class='text-warning'>  ERROR ACCOUNT CREATION FAILED!   </h4>");
} 
if($getResults===true){
		
		echo("<h4 class='text-warning'>  order placed!   </h4>");
} 
 




}







?>
	 
	 
      </div>
      
    </div>

  </div>
</div>
					 
					 
					 
					 
					 </div>		 
                </div>  
           </div>  
           <br/>  
      </body>  
 </html>
