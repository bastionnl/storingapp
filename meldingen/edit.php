<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php 

    if(!isset($_GET['id'])){
        echo "Geef in je aanpaslink op de index.php het id van betreffende item mee achter de URL in je a-element om deze pagina werkend te krijgen na invoer van je vijfstappenplan";
        exit;
    }
    ?>
    <?php
        require_once '../header.php'; ?>

    <div class="container">
        <h1>Melding aanpassen</h1>

        <?php
        //Haal het id uit de URL:
        $id = $_GET['id']; //...............;

        //1. Haal de verbinding erbij
        require_once '../backend/conn.php';

        //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
        $query = "SELECT * FROM meldingen WHERE id = :id";

        //3. Van query naar statement
        $statement = $conn->prepare($query);

        //4. Voer de query uit, voeg hier nog de placeholder toe
        $statement->execute([
            ':id' => $id
        ]);

        //5. Ophalen gegevens, tip: gebruik hier fetch().
        $melding = $statement-> fetch(PDO::FETCH_ASSOC);
        
        ##die;
        ?>

        <form action="../backend/meldingenController.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $melding['id']; ?>"> 
            <input type="hidden" name="action" value="update">
            <!-- (voeg hier opdracht 7 toe) -->

            <div class="form-group">
                <label>Naam attractie:</label>
                <?php echo $melding['attractie']; ?>
            </div>
            <!-- Zorg dat het type wordt getoond, net als de naam hierboven -->
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input"
                    value="<?php echo $melding['capaciteit']; ?>">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <!-- Let op: de checkbox blijft nu altijd uit, pas dit nog aan -->
                <?php if($melding['prioriteit']==1)
                {
                    echo "checked";
                } ?>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <?php if($melding['prioriteit']){echo "checked";} ?>
                <?php echo $melding['prioriteit']; ?>
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group"> 
                <label for="melder">Naam melder:</label>
                <!-- Voeg hieronder nog een value-attribuut toe, zoals bij capaciteit -->
                <input type="text" name="melder" value="<?php echo $melding['melder'];?>" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="overig">Overige info:</label>
                <textarea name="overig_info" id="overig" class="form-input" rows="4"><?= $melding['overige_info'];?></textarea>
            </div>
            
            <input type="submit" value="Melding opslaan">

        </form>
        <form action="../backend/meldingenController.php" method="POST">
            <input type="hidden" name="id" value="<?= $melding['id'];?>">
            <input type="hidden" name="action" value="delete">
            <input type="submit" value="ghost activetie 10">
        </form>
    </div>  

</body>

</html>
