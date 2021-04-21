<?php
    
    // onderstaand bestand wordt ingeladen
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>

<h1>Gebruiker toevoegen</h1>

<?php
    if (isset($_POST['product_name']) && $_POST['product_name'] != "") {
        $product_name = $con->real_escape_string($_POST['product_name']);
        $description = $con->real_escape_string($_POST['description']);
        $price = $con->real_escape_string($_POST['price']);
        $category = $con->real_escape_string($_POST['category']);
        $color = $con->real_escape_string($_POST['color']);
        $weight = $con->real_escape_string($_POST['weight']);
        $active = $con->real_escape_string($_POST['active']);

        $liqry = $con->prepare("INSERT INTO product (name, description, category_id, price, color, weight, active) VALUES (?,?,?,?,?,?,?)");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_param('sssssss',$product_name, $description, $category, $price, $color, $weight, $active);
            if($liqry->execute()){

                echo "product toegevoegd.";
                
            }
        }
        $liqry->close();

    }
?>

<form action="" method="POST">
product naam: <input type="text" name="product_name" value=""><br><br>
product description: <input type="text" name="description" value=""><br><br>
product prijs: <input type="text" name="price" value=""><br><br>
product categorie: <input type="text" name="category" value=""><br><br>
product kleur: <input type="text" name="color" value=""><br><br>
product gewicht: <input type="text" name="weight" value=""><br><br>
product actief: <input type="text" name="active" value=""><br><br>

<input type="submit" name="submit" value="Toevoegen">
</form>



<?php
    include('../core/footer.php');
?>