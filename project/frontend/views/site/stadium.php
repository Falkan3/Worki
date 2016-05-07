<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Stadiony';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $id_klubu = Yii::$app->getRequest()->getQueryParam('id_klubu');
        try
        {
            $sql = "SELECT * FROM stadion WHERE id_stadionu=".$id;
            $stadion = Yii::$app->db->CreateCommand($sql)->queryAll();
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT k.nazwa_klubu, k.id_klubu, k.logo FROM klub k WHERE k.id_stadionu=".$id;
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
    
    <table class="league_table">
    <tr>
        <th>ID:</th><th>Nazwa:</th><th>Klub:</th><th>Pojemność:</th><th>Rok wybudowania:</th><th>Zdjęcie:</th>
    </tr>
    <?php          
        if(count($stadion)>=1) {
            echo "<tr>";
                echo "<td>".$stadion[0]['id_stadionu']."</td>";
                echo "<td>".$stadion[0]['nazwa']."</td>";
                
                if(isset($klub[0]['nazwa_klubu']))
                {
                    $src = '?r=image/index&id='.$klub[0]['logo'];
                    echo "<td>".Html::a(Html::img( $src, ['class' => '', 'title' => $klub[0]['nazwa_klubu'], 'alt' => $klub[0]['nazwa_klubu']] ), ['site/team', 'id'=>$klub[0]['id_klubu']], ['class' => ''])."</td>";
                }
                else
                {
                    echo '<td>BRAK DANYCH O KLUBIE</td>';
                }
                
                echo "<td>".$stadion[0]['pojemnosc']."</td>";
                echo "<td>".$stadion[0]['rok_wybudowania']."</td>";
                
                if(isset($stadion[0]['zdjecie']))
                {
                    $src = '?r=image/index&id='.$stadion[0]['zdjecie'];
                    echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled', 'title' => $stadion[0]['nazwa'], 'alt' => $stadion[0]['nazwa']] ), ['site/view_image', 'src'=>$src], ['class' => ''])."</td>";
                }
                else
                {
                    echo '<td>BRAK ZDJĘCIA</td>';
                }
            echo "</tr>";
            }
    ?>
    </table>
    
    
    
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