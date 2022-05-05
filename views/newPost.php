<!DOCTYPE html>
<?php
session_start();
$style = "grupe3Style.css";
?>
<html>
    <?php include '../header.php'; ?>
<body>
    <main>
        <label>Crear nuevo Post</label>
        <form>
            <select>
                <option>Elige categoria/deporte</option>
                <option>tu cachai que va aca po</option>
                 <option>Esto es un option uwu</option>
            </select>
            <div>
                <input type="text" placeholder="titilo">
            </div>
            <textarea placeholder="texto(opcional)">Texto</textarea>
            <div>
                <label>Hashtags separado por coma","</label>
                <div>
                    <select
                </div>
            </div>
        </form>
    </main>
</body>
</html>