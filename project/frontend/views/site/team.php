<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\bootstrap\ActiveForm;

$this->title = 'Kluby';
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
                $sql= "SELECT * FROM `klub` where `nazwa_klubu` LIKE '%".$var."%'";
                $data = Yii::$app->db->CreateCommand($sql)->queryAll();
            }
            else
            {
                $id = Yii::$app->getRequest()->getQueryParam('id');
                $sql = "SELECT * FROM `klub` where `id_klubu`=".$id;
                $data = Yii::$app->db->CreateCommand($sql)->queryAll();
            }
            
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT l.nazwa_ligi, l.logo FROM liga l WHERE l.id_ligi=".$data[0]['id_ligi'];
            $liga = Yii::$app->db->CreateCommand($sql)->queryAll();
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT * FROM zawodnik WHERE id_klubu=".$data[0]['id_klubu'];
            $zawodnicy = Yii::$app->db->CreateCommand($sql)->queryAll();
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT nazwa, zdjecie FROM stadion WHERE id_stadionu=".$data[0]['id_stadionu'];
            $stadion = Yii::$app->db->CreateCommand($sql)->queryAll();   
        }
        catch(Exception $e)
        {
        }          
    ?>

<div class="main">
    <div class="wrap">
<div class="site-team">
    
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
        if(isset($data) && count($data)>=1) 
        {           
        echo '<table class="league_table">
            <tr>
                <th>Nazwa klubu:</th><th>Logo:</th><th>Liga</th><th>Trener</th><th>Stadion</th>
            </tr>
            <tr>';
                    echo "<td>".$data[0]['nazwa_klubu']."</td>";
                    $src = '?r=image/index&id='.$data[0]['logo'];
                    echo '<td>'.Html::img( $src, ['class' => ''] ).'</td>';                   
                    $src = '?r=image/index&id='.$liga[0]['logo'];
                    echo "<td>".Html::a(Html::img( $src, ['class' => '', 'title' => $liga[0]['nazwa_ligi'], 'alt' => $liga[0]['nazwa_ligi']] ), ['site/league', 'id'=>$data[0]['id_ligi']], ['class' => ''])."</td>";                  
                    if(isset($data[0]['trener']))
                    {
                        echo "<td>".$data[0]['trener']."</td>";
                    }
                    else
                    {
                        echo "<td>Brak danych</td>";
                    }
                    if(isset($stadion))
                    {
                        if(isset($stadion[0]['zdjecie']))
                        {
                            $src = '?r=image/index&id='.$stadion[0]['zdjecie'];
                            echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled', 'title' => $stadion[0]['nazwa'], 'alt' => $stadion[0]['nazwa']] ), ['site/stadium', 'id'=>$data[0]['id_stadionu']], ['class' => ''])."</td>";
                        }
                        else
                        {
                            $src = '?r=image/index&id=brak_stadionu.png';
                            echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled', 'title' => $stadion[0]['nazwa'], 'alt' => $stadion[0]['nazwa']] ), ['site/stadium', 'id'=>$data[0]['id_stadionu']], ['class' => ''])."</td>";
                        }
                    }
                    else
                    {
                        echo "<td>"."BRAK DANYCH"."</td>";
                    }
                echo "</tr>
                </table>";
                }
        ?>
<?php
    if(isset($zawodnicy) && count($zawodnicy)>=1)
    {
    echo '<h1>Zawodnicy</h1>
    
    <table class="league_table">
    <tr>
        <!--<th>ID:</th><th>Imię:</th><th>Nazwisko:</th><th>Klub:</th><th>Pozycja:</th><th>Wzrost:</th><th>Data urodzenia:</th><th>Zdjęcie:</th><th>Kraj pochodzenia</th>-->
        <th>Imię:</th><th>Nazwisko:</th><th>Info:</th>
    </tr>';
        foreach($zawodnicy as $result) 
        {
            echo "<tr>";
                echo "<td>".$result['imie']."</td>";
                echo "<td>".$result['nazwisko']."</td>";
                $src = '?r=image/index&id=info.png';
                echo "<td>".Html::a(Html::img( $src, ['class' => 'img_profile_scaled_little', 'title' => "Info", 'alt' => "Info"] ), ['site/player', 'id'=>$result['id_zawodnika']], ['class' => ''])."</td>";
            echo "</tr>";           
        }
        echo "</table>";
    }
    ?>
    
</div>
    </div>
</div>
