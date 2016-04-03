<?php

/* @var $this yii\web\View */
/* @var $model app\models\Liga */

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
                    <td>PLACEHOLDER</td>
                <tr/>
            </table>
            
            <hr>
            <h2>Tabela wyników</h2>
            <table>
                <tr><th>Pozycja</th><th>Nazwa klubu</th><th>Logo</th></tr>
                <tr><td>1</td><td><?= Html::a('Bayern Monachium', ['site/team']); ?></td><td></td></tr>
                <tr><td>2</td><td><?= Html::a('Borussia Dortmund', ['site/team']); ?></td><td></td></tr>      
            </table>
            <p>
                <?php
                    $sql = "SELECT * FROM `liga`";
                    $data = Yii::$app->db->CreateCommand($sql)->queryAll();
                    print_r(array(
                        'data'=>$data,
                    ));
                    foreach($data as $result) {
                        echo $result['id_ligi'].", ".$result['nazwa_ligi'].", ".$result['kraj'], '<br>';
                    }
                ?>
            </p>
        </div>
    </div>
</div>