<?php

/* @var $this yii\web\View */

$this->title = 'Stadiony';
?>

<div class="body-content">

    <h2>Stadiony</h2>
    
    <form>
        <table>
            <tr>
                <td>
                    <input class="btn btn-primary" type="button" id="dodaj" name="dodaj" value="Dodaj" onclick="alert('clicked');">
                </td>
            </tr>
            <tr>
                <td>
                    <select name="leagues" id="leagues">
                        <option value="volvo">Bundesliga</option>
                        <option value="saab">BBVA</option>
                        <option value="fiat">Premier League</option>
                        <option value="audi">Ligue 1</option>
                        <option value="audi">Serie A</option>
                    </select>
                </td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Pojemność</th>
                <th>Rok wybudowania</th>
                <th>Zdjęcie</th>
            </tr>
            <tr>
                <td>Signal Iduna Park</td>
                <td>z bazy</td>
                <td>z bazy</td>
                <td>brak</td>
            </tr>
        </table>       
        
    </form>
        
</div>

