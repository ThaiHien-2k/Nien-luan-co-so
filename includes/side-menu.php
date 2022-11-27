<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục </div>        
    <nav class="" role="">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($con,"select id,categoryName  from category");
                while($row=mysqli_fetch_array($sql))
                        {
                ?>
                <a href="category.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle" style="">
                <?php echo $row['categoryName'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>