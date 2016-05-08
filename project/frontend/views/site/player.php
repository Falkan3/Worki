<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Zawodnicy';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php
        $id = Yii::$app->getRequest()->getQueryParam('id');
        try
        {
            $sql = "SELECT * FROM zawodnik WHERE id_zawodnika=".$id;
            $zawodnik = Yii::$app->db->CreateCommand($sql)->queryAll();
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT k.nazwa_klubu, k.id_klubu, k.logo FROM klub k WHERE k.id_klubu=".$zawodnik[0]['id_klubu'];
            $klub = Yii::$app->db->CreateCommand($sql)->queryAll();
        }
        catch(Exception $e)
        {
        }
    ?>

<div class="main">
    <div class="wrap">
        <div class="site-league">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php          
    if(isset($zawodnik) && count($zawodnik)>=1) 
    {
    echo '<table class="league_table">
    <tr>
        <th>ID:</th><th>Imię:</th><th>Nazwisko:</th><th>Klub:</th><th>Pozycja:</th><th>Wzrost:</th><th>Data urodzenia:</th><th>Kraj pochodzenia</th><th>Zdjęcie:</th>
    </tr>';
            echo "<tr>";
                echo "<td>".$zawodnik[0]['id_zawodnika']."</td>";
                echo "<td>".$zawodnik[0]['imie']."</td>";
                echo "<td>".$zawodnik[0]['nazwisko']."</td>";
                if(isset($klub[0]['nazwa_klubu']))
                {
                    #echo "<td>".Html::a($klub[0]['nazwa_klubu'], ['site/team', 'id'=>$zawodnik[0]['id_klubu']], ['class' => ''])."</td>";
                    $src = '?r=image/index&id='.$klub[0]['logo'];
                    echo "<td>".Html::a(Html::img( $src, ['class' => '', 'title' => $klub[0]['nazwa_klubu'], 'alt' => $klub[0]['nazwa_klubu']] ), ['site/team', 'id'=>$klub[0]['id_klubu']], ['class' => ''])."</td>";
                }
                else
                {
                    echo '<td>BRAK DANYCH O KLUBIE</td>';
                }
                echo "<td>".$zawodnik[0]['pozycja']."</td>";
                echo "<td>".$zawodnik[0]['wzrost']." cm"."</td>";
                echo "<td>".$zawodnik[0]['data_ur']."</td>";
                echo "<td>".$zawodnik[0]['kraj']."</td>";
                if(isset($zawodnik[0]['zdjecie']))
                {
                    #echo '" class="img_profile_scaled"></td>';
                    $src = '?r=image/index&id='.$zawodnik[0]['zdjecie'];
                    echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled', 'title' => $zawodnik[0]['nazwisko'], 'alt' => $zawodnik[0]['nazwisko']] ), ['site/view_image', 'src'=>$src], ['class' => ''])."</td>";
                }
                else
                {   
                    $src = '?r=image/index&id=brak_zawodnika.png';
                    echo '<td>'.Html::img( $src, ['class' => 'img_profile_scaled', 'title' => 'Brak zdjęcia zawodnika', 'alt' => 'Brak zdjęcia zawodnika'] ).'</td>';
                }
            echo "</tr>
            </table>";
            }
    ?>
    
    
    
    <!--
    <h2>Informacje</h2>
    <table>
        <tr><th>Imie</th><td>Robert</td></tr>
        <tr><th>Nazwisko</th><td>Lewandowski</td></tr>
        <tr><th>Kraj</th><td>Polska</td></tr>
        <tr><th>Klub</th><td><?= Html::a('Bayern Monachium', ['site/team']); ?></td></tr>
        <tr><th>Pozycja</th><td>Napastnik</td></tr>
        <tr><th>Wzrost</th><td>nie wiem</td></tr>
        <tr><th>Numer koszulki</th><td>nie wiem</td></tr>
        <tr><th>Zdjęcie</th><td>nie mam</td></tr>
        <tr><th>Ilość strzelonych goli w lidze</th><td>mniej niż Aubameyang <3</td></tr>
    </table>
    -->
        </div>
    </div>
</div>