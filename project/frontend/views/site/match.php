<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\bootstrap\ActiveForm;

$this->title = 'Mecze';
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
                $sql= "SELECT * FROM `terminarz` WHERE `data` LIKE '%".$var."%' OR `godzina` LIKE '%".$var."%' ORDER BY `data` DESC,`godzina` DESC LIMIT 1";
                $mecz = Yii::$app->db->CreateCommand($sql)->queryAll();
            }
            else
            {
                $id = Yii::$app->getRequest()->getQueryParam('id');
                $sql = "SELECT * FROM `terminarz` WHERE id_terminarza=".$id;
                $mecz = Yii::$app->db->CreateCommand($sql)->queryAll();
            }
        }
        catch(Exception $e)
        {
        }
        try
        {
            $sql = "SELECT `id_klubu`,`nazwa_klubu`,`logo` from `klub` WHERE `id_klubu`=".$mecz[0]['home'].
                    " UNION ALL SELECT `id_klubu`,`nazwa_klubu`,`logo` FROM `klub` WHERE `id_klubu`=".$mecz[0]['away'];
            $nazwyklubow = Yii::$app->db->CreateCommand($sql)->queryAll();
            
            $sql = "SELECT * FROM `gol` WHERE `id_terminarza`=".$mecz[0]['id_terminarza'].' ORDER BY `minuta`';
            $gole = Yii::$app->db->CreateCommand($sql)->queryAll();
            
            $sql = "SELECT `id_zawodnika`,`imie`,`nazwisko` FROM `zawodnik` WHERE `id_zawodnika` =".$gole[0]['id_strzelca']
                    ." UNION ALL SELECT `id_zawodnika`,`imie`,`nazwisko` FROM `zawodnik` WHERE `id_zawodnika` =".$gole[0]['id_asystenta'];
            $zawodnicy = Yii::$app->db->CreateCommand($sql)->queryAll();
            
            $sql = "SELECT * FROM `karta` WHERE `id_terminarza`=".$mecz[0]['id_terminarza'].' ORDER BY `minuta`';
            $karty = Yii::$app->db->CreateCommand($sql)->queryAll();
            
            $sql = "SELECT `id_zawodnika`,`imie`,`nazwisko` FROM `zawodnik` WHERE `id_zawodnika` =".$karty[0]['id_zawodnika'];
            $zawodnicy_karta = Yii::$app->db->CreateCommand($sql)->queryAll();
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
                <?= $form->field($model, 'searchname')->textinput(['rows' => 1, 'style'=>'margin-right:5px;'])->label('Szukaj po dacie') ?>
            </td>
            <td width="10%">
                <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary', 'style' => 'margin-top:22px; margin-bottom:0;']) ?>
            </td>                         
        </tr>
    </table>
    <?php ActiveForm::end() ?> 
    
                        <?php
                          if(isset($mecz) && count($mecz)>=1)
                          {
                              echo '
                              <table class="league_table">
                              <tr>
                                  <th>Data:</th><th>Gospodarze:</th><th>Goście:</th><th>Wynik:</th>
                              </tr>';
                              $i=0;
                              foreach($mecz as $result) 
                              {
                                  echo "<tr>";
                                      //echo "<td>".$result['id_terminarza']."</td>";
                                      echo "<td>".$result['data']." [".$result['godzina']."]</td>";
                                      //Kluby
                                      foreach(array_slice($nazwyklubow,$i,2) as $klub)
                                      {
                                        if(isset($klub['logo']))
                                        {
                                          $src = '?r=image/index&id='.$klub['logo'];
                                          echo "<td>".Html::a(Html::img( $src, ['class' => '', 'title' => $klub['nazwa_klubu'], 'alt' => $klub['nazwa_klubu']] )
                                                  , ['site/team', 'id'=>$klub['nazwa_klubu']], ['class' => ''])."</td>";                                       
                                        }
                                        else if(isset($klub['nazwa_klubu']))
                                        {
                                          echo "<td>".Html::a($klub['nazwa_klubu'], ['site/team', 'id'=>$klub['id_klubu']], ['class' => ''])."</td>";                                       
                                        }
                                        else {echo "<td>-</td>";}
                                      }
                                      echo "<td>".$result['wynik']."</td>";
                                      
                                  echo "</tr>";
                                  
                                  $i=$i+2;
                              }
                              echo "</table>";
                              
                              if(isset($gole) && count($gole)>=1)
                              {                               
                                echo '<h1>Gole</h1>
                                  <table class="league_table" style="margin-top:30px">
                                  <tr>
                                      <th>Strzelec:</th><th>Asystent:</th><th>Minuta gry:</th>
                                  </tr>';
                                  $i=0;
                                  foreach($gole as $gol)
                                  {
                                      if(isset($zawodnicy[$i]) && count($zawodnicy)>=1)
                                      {
                                        echo "<td>".Html::a($zawodnicy[$i]['imie']." ".$zawodnicy[$i]['nazwisko'], 
                                                ['site/player', 'id'=>$zawodnicy[$i]['id_zawodnika']], ['class' => ''])."</td>";
                                      }
                                      else {"<td>-</td>";}
                                      if(isset($zawodnicy[$i+1]) && count($zawodnicy)>=1)
                                      {
                                        echo "<td>".Html::a($zawodnicy[$i+1]['imie']." ".$zawodnicy[$i+1]['nazwisko'], 
                                                ['site/player', 'id'=>$zawodnicy[$i+1]['id_zawodnika']], ['class' => ''])."</td>";
                                      }
                                      else {"<td>-</td>";}
                                      echo "<td>".$gol['minuta']."</td>";
                                      $i=$i+2;
                                  }
                                  
                                  echo '</table>';
                              }
                              
                              if(isset($karty) && count($karty)>=1)
                              {                               
                                echo '<h1>Karty</h1>
                                  <table class="league_table" style="margin-top:30px">
                                  <tr>
                                      <th>Zawodnik:</th><th>Kolor:</th><th>Minuta gry:</th>
                                  </tr>';
                                $i=0;
                                  foreach($karty as $karta)
                                  {
                                      if(isset($zawodnicy_karta[$i]) && count($zawodnicy_karta)>=1)
                                      {
                                        echo "<td>".Html::a($zawodnicy_karta[$i]['imie']." ".$zawodnicy_karta[$i]['nazwisko'], 
                                                ['site/player', 'id'=>$zawodnicy_karta[$i]['id_zawodnika']], ['class' => ''])."</td>";
                                      }
                                      else {"<td>-</td>";}
                                      switch($karta['kolor'])
                                      {
                                          case 'Czerwona':
                                              $srckarta = '?r=image/index&id=redcard.png';
                                              break;
                                          case 'Żółta':
                                              $srckarta = '?r=image/index&id=yellowcard.png';
                                              break;
                                          default:
                                              $srckarta = '?r=image/index&id=error.png';
                                              break;
                                      }
                                      echo "<td>".Html::img( $srckarta, ['class' => 'img_profile_scaled_little', 'title' => $karta['kolor'], 'alt' => $karta['kolor']] )."</td>";
                                      echo "<td>".$karta['minuta']."</td>";
                                      $i++;
                                  }
                                  
                                  echo '</table>';
                              }
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