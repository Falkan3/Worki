<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Klub';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="wrap">
<div class="site-team">
    
    <?php
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $sql = "SELECT * FROM `klub` where `id_klubu`=".$id;
        $data = Yii::$app->db->CreateCommand($sql)->queryAll();
        #$sql = "select l.nazwa_ligi from liga l inner join klub k on l.id_ligi=k.id_ligi where l.id_ligi=".$data[0]['id_ligi']." LIMIT 1;";
        $sql = "SELECT l.nazwa_ligi FROM liga l WHERE l.id_ligi=".$data[0]['id_ligi'];
        $liga = Yii::$app->db->CreateCommand($sql)->queryAll();
        $sql = "SELECT * FROM zawodnik WHERE id_klubu=".$id;
        $zawodnicy = Yii::$app->db->CreateCommand($sql)->queryAll();
        try
        {
            $sql = "SELECT nazwa FROM stadion WHERE id_stadionu=".$data[0]['id_stadionu'];
            $stadion = Yii::$app->db->CreateCommand($sql)->queryAll();   
        }
        catch(Exception $e)
        {
        }    
          
        
    ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
            
        <table class="league_table">
            <tr>
                <th>Pozycja:</th><th>Nazwa klubu:</th><th>Logo:</th><th>Liga</th><th>Trener</th><th>Stadion</th>
            </tr>
        <?php
            if(count($data[0])>=1) {
                echo "<tr>";
                    echo "<td>".$data[0]['id_klubu']."</td>";
                    echo "<td>".$data[0]['nazwa_klubu']."</td>";
                    echo '<td><img src="?r=image/index&id=';
                    echo $data[0]['logo'].'"></td>';
                    echo "<td>".Html::a($liga[0]['nazwa_ligi'], ['site/league', 'id'=>$data[0]['id_ligi']], ['class' => ''])."</td>";
                    echo "<td>".$data[0]['trener']."</td>";
                    if(isset($stadion))
                    {
                        echo "<td>".Html::a($stadion[0]['nazwa'], ['site/stadium', 'id'=>$data[0]['id_stadionu']], ['class' => ''])."</td>";
                    }
                    else
                    {
                        echo "<td>"."BRAK DANYCH"."</td>";
                    }
                echo "</tr>";
                }
        ?>
        </table>
    <h1>Zawodnicy</h1>
    
    <table class="league_table">
    <tr>
        <!--<th>ID:</th><th>Imię:</th><th>Nazwisko:</th><th>Klub:</th><th>Pozycja:</th><th>Wzrost:</th><th>Data urodzenia:</th><th>Zdjęcie:</th><th>Kraj pochodzenia</th>-->
        <th>ID:</th><th>Imię:</th><th>Nazwisko:</th>
    </tr>
    <?php          
        foreach($zawodnicy as $result) {
        if(count($result)>=1) {
            echo "<tr>";
                echo "<td>".Html::a($result['id_zawodnika'], ['site/player', 'id'=>$result['id_zawodnika']], ['class' => ''])."</td>";
                echo "<td>".$result['imie']."</td>";
                echo "<td>".$result['nazwisko']."</td>";
            echo "</tr>";
            }
        }
    ?>
    </table>
    
</div>
    </div>
</div>
