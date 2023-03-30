<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>
        

        <form action="../backend/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="create">   
        
            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">type</label>
                    <select name="type" id="type">
                    <option value="">--- kies een soort ---</option>
                    <option value="achtbaan">achtbaan</option>
                    <option value="draaiend">draaiend</option>
                    <option value="water">wateratractie</option>
                    <option value="kinder">kinderactractie</option>
                    <option value="horeca">horeca</option>
                    <option value="show">show</option>
                    <option value="overig">overig</option>
                    <option value="test">test</option>
</select>
                <!-- hier komt een dropdown -->
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prioriteit:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">hoge prioriteit</label>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="overige_info">overige informatie  </label>
                <textarea type="textarea" name="overige_info" id="overige_info" class="form-input" rows=4 cols= 50> </textarea>
            </div>
            
            <input type="submit" value="Verstuur melding">

        </form>
    </div>  

</body> 

</html>
