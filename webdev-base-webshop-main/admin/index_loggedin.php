<?php
    include('core/header.php');
    include('core/checklogin_admin.php');
?>
<h1>Welkom gebruiker <?php echo $_SESSION['Sadmin_id'];?></h1>
- <a href="logout.php">Uitloggen</a>
- <a href="?logout=1">Uitloggen met code in indexloggenid</a> <br>

<?php 
if ( isset($_GET['logout']) && $_GET['logout'] == '1') {
unset($_SESSION['Sadmin_id']);
unset($_SESSION['Sadmin_email']);
header("location:index.php");
}
?>

<ul>
    <li><a href="users/">Gebruikers</a></li>
    <li><a href="orders/">Bestellingen</a></li>
    <li><a href="products/">Producten</a></li>
</ul>
<?php
    include('core/footer.php');
?>