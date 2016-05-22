<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\bootstrap\ActiveForm;

$this->title = 'Stadiony';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php if(isset($_POST["DynamicModel"]))
        {
            $temp = $_POST["DynamicModel"];
            $var = $temp["searchname"];
        }
    ?>

    <?php
        
        try
        {
            if(isset($var))
            {
                $sql= "SELECT * FROM `stadion` WHERE `nazwa` LIKE '%".$var."%'";
                $stadion = Yii::$app->db->CreateCommand($sql)->queryAll();
                $sql = "SELECT `id_klubu` from `klub` WHERE `klub`.`id_stadionu` = ".$stadion[0]['id_stadionu'];
                $klub= Yii::$app->db->CreateCommand($sql)->queryAll();
                $id_klubu = $klub[0]['id_klubu'];
            }
            else
            {
                $id = Yii::$app->getRequest()->getQueryParam('id');
                $id_klubu = Yii::$app->getRequest()->getQueryParam('id_klubu');
                $sql = "SELECT * FROM `stadion` WHERE id_stadionu=".$id;
                $stadion = Yii::$app->db->CreateCommand($sql)->queryAll();
            }
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT k.nazwa_klubu, k.id_klubu, k.logo FROM klub k WHERE k.id_stadionu=".$stadion[0]['id_stadionu'];
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

        $model = new \yii\base\DynamicModel(['searchname']);
        $model->addRule(['searchname'], 'string');
    ?>
    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]); ?>
    <table width="100%">
        <tr>
            <td width="90%">
                <?= $form->field($model, 'searchname')->textinput(['rows' => 1, 'style'=>'margin-right:5px;'])->label('Szukaj po nazwie') ?>
            </td>
            <td width="10%">
                <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary', 'style' => 'margin-top:22px; margin-bottom:0;']) ?>
            </td>                         
        </tr>
    </table>
    <?php ActiveForm::end() ?> 
    
<?php          
    if(isset($stadion) && count($stadion)>=1) 
    {   
        echo '<table class="league_table">
        <tr>
            <th>ID:</th><th>Nazwa:</th><th>Klub:</th><th>Pojemność:</th><th>Rok wybudowania:</th><th>Zdjęcie:</th>
        </tr>';
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
                    $src = '?r=image/index&id=brak_stadionu.png';
                    echo '<td>'.Html::img( $src, ['class' => 'img_profile_scaled', 'title' => 'Brak zdjęcia stadionu', 'alt' => 'Brak zdjęcia stadionu'] ).'</td>';
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