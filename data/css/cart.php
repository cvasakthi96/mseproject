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
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="mapc.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'        =>     $_GET["id"],  
                'item_name'      =>     $_POST["hidden_name"],  
                'item_price'     =>     $_POST["hidden_price"],  
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
                     echo '<script>window.location="mapc.php"</script>';  
                }  
           }  
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
      <body>  
           <br />  
           <div  class="container">  
                <table  class="table">
                
				<tr>
				<?php  
                     
                 $str='SELECT  * from product';		
                   $s = sqlsrv_query($conn,$str);
              

                  while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_ASSOC) ) {

                ?>    <td><div class=' panel  panel-success'>
	        <div class='panel panel-heading'><?php echo $row["name"]; ?></div>
		       <div class=' panel panel-body'>
		       <img class='img ' src='html/images/cart/<?php echo $row['images'];?>'> 
               <form method="post" action="mapc.php?action=add&id=<?php echo $row["id"]; ?>">  
                                           <?php echo $row["farmer"]; ?>						  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">Rs <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                        
                     </form> 
		 
			</div> 
			</div></td>
		
                 
                <?php  
                     }  
                  
                ?> 
				</tr> </table>
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
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
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>Rs<?php echo $values["item_price"]; ?></td>  
                               <td>Rs<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="mapc.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Rs <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>
