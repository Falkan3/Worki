<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Ligi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main">
    <div class="wrap">
        <div class="site-league">
            
            <?php
            $id = Yii::$app->getRequest()->getQueryParam('id');
            $sql = "SELECT * FROM `liga` where `id_ligi`=".$id;
            $data = Yii::$app->db->CreateCommand($sql)->queryAll();
            ?>
            
            <h1><?= Html::encode($this->title) ?></h1>
            
            <table class="league_table">
                <tr>
                    <th>Nazwa:</th><th>Kraj:</th><th>Logo:</th>
                </tr>
                <tr>
                    <td><?php echo $data[0]['nazwa_ligi']; ?></td>
                    <td><?php echo $data[0]['kraj']; ?></td>
                    <?php
                        if(isset($data[0]['logo']))
                        {
                            $src = '?r=image/index&id='.$data[0]['logo'];
                            echo "<td>".Html::img( $src, ['class' => '', 'title' => $data[0]['nazwa_ligi'], 'alt' => $data[0]['nazwa_ligi']] )."</td>";
                        }
                        else
                        {
                            echo 'BRAK ZDJĘCIA';
                        }
                    ?>
                <tr/>
            </table>
            
            <hr>
            <h1>Kluby w lidze: <?php echo $data[0]['nazwa_ligi']; ?></h1>
            <table class="league_table">
                <tr>
                    <th>Pozycja:</th><th>Nazwa klubu:</th><th>Logo:</th>
                </tr>
            <?php
            $sql = "SELECT * FROM `klub` where `id_ligi`=".$id;
            $data = Yii::$app->db->CreateCommand($sql)->queryAll();
            
            foreach($data as $result) {
                if(count($result)>=1) {
                    echo "<tr>";
                        echo "<td>".$result['id_klubu']."</td>";
                        echo "<td>".Html::a($result['nazwa_klubu'], ['site/team', 'id'=>$result['id_klubu']], ['class' => ''])."</td>";
                        if(isset($result['logo']))
                        {
                            $src = '?r=image/index&id='.$result['logo'];
                            echo '<td>'.Html::img( $src, ['class' => '', 'title' => $result['nazwa_klubu'], 'alt' => $result['nazwa_klubu']] ).'</td>';
                        }
                        else
                        {
                            echo 'BRAK ZDJĘCIA';
                        }
                    echo "</tr>";
                    }
                }
            ?>
            </table>
            
        </div>
    </div>
</div>