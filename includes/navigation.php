<?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
$pquery_count = mysqli_num_rows($cartQ)
?>

<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
     <a href="/tutorial/index.php" class="navbar-brand" id="text">Scrafty Shop</a>
     <ul class="nav navbar-nav" id="text">
       <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
         <?php
          $parent_id = $parent['id'];
          $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
          $cquery = $db->query($sql2);
         ?>

         <!-- Menu Items -->
         <li class="dropdown" id="text">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text"><?php echo $parent['category']; ?><span class="caret" id="text"></span></a>
             <ul class="dropdown-menu" role="menu" id="text">
               <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
                 <li><a href="category.php?cat=<?=$child['id'];?>"><?php echo $child['category']; ?></a></li>
               <?php endwhile; ?>
             </ul>
         </li>
       <?php endwhile; ?>
       <li class=""><a href="cart.php" id="text"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart <?php echo '('.$pquery_count.')' ?></a></li>
     </ul>

   </div>
 </nav>
