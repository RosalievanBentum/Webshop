<?php
    
    // onderstaand bestand wordt ingeladen
    include('../core/header.php');
    include('../core/checklogin_admin.php');
    include('users-menu.php');
?>

<h1>Gebruikersoverzicht</h1>

<?php
        $liqry = $con->prepare("SELECT product_id, product.name AS productName, price, category.name AS categoryNAme FROM product INNER JOIN category ON product.category_id = category.category_id");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_result($product_id,$name,$price, $category);
            if($liqry->execute()){
                $liqry->store_result();
                // while($liqry->fetch()) {
                //     echo 'admin id :' . $adminId . " - ";
                //     echo 'email :' . $email . " - ";
                //     echo '<a href="edit_user.php?uid='.$adminId.'">edit</a><br>';
                // }

                // table>tr*1>td*4

                echo '<table border=1>
                <tr> 
                <td> Product ID</td>
                <td> Product naam </td>
                <td> product prijs </td>
                <td> categorie </td>
                <td> edit </td>
                <td> delete </td>
                <tr>';

                while ($liqry->fetch() ) { ?>
                        <tr>
                        <td><?php echo $product_id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $categorie; ?></td>
                        <td><a href="edit_user.php?uid=<?php echo $adminId; ?>">edit</a></td>
                        <td><a href="delete_user.php?uid=<?php echo $adminId; ?>">delete</a></td>
                    </tr>
                    <?php 
                }
                echo '</table>';
            }

            $liqry->close();
        }

        

?>
<a href="add_product.php"> Product toevoegen</a>
<?php
    include('../core/footer.php');
?>
