<!DOCTYPE html>
<html>
<head>
    <title>Résultats de l'élection</title>
    <style>
        body {
          font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 95%;
            margin: auto;
            overflow: hidden;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .barre {
            height: 40px;
            border-radius: 5px;
            margin: 10px 0;
            background-color: $couleur;
            position: relative;
            overflow: hidden;
        }
        .barre::before {
            content: none;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
        .statut {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Résultats de l'élection</h1>
        <?php

$candidatAbv1 = $_POST['candidatAbv1'];
$candidatBbv1 = $_POST['candidatBbv1'];
$candidatCbv1 = $_POST['candidatCbv1'];
$candidatDbv1 = $_POST['candidatDbv1'];
$candidatAbv2 = $_POST['candidatAbv2'];
$candidatBbv2 = $_POST['candidatBbv2'];
$candidatCbv2 = $_POST['candidatCbv2'];
$candidatDbv2 = $_POST['candidatDbv2'];
$candidatAbv3 = $_POST['candidatAbv3'];
$candidatBbv3 = $_POST['candidatBbv3'];
$candidatCbv3 = $_POST['candidatCbv3'];
$candidatDbv3 = $_POST['candidatDbv3'];
if(isset($_POST['boutonValid'])){

  if ($candidatAbv1 < 0 || $candidatAbv1 > 100 || $candidatBbv1 < 0 || $candidatBbv1 > 100 || $candidatCbv1 < 0 || $candidatCbv1 > 100 || $candidatDbv1 < 0 || $candidatDbv1 > 100 || $candidatAbv2 < 0 || $candidatAbv2 > 100 || $candidatBbv2 < 0 || $candidatBbv2 > 100 || $candidatCbv2 < 0 || $candidatCbv2 > 100 || $candidatDbv2 < 0 || $candidatDbv2 > 100 || $candidatAbv3 < 0 || $candidatAbv3 > 100 || $candidatBbv3 < 0 || $candidatBbv3 > 100 || $candidatCbv3 < 0 || $candidatCbv3 > 100 || $candidatDbv3 < 0 || $candidatDbv3 > 100) {
    echo "Les scores doivent être compris entre 0 et 100.";
   
  }
  
  if ($candidatAbv1 + $candidatBbv1 + $candidatCbv1 + $candidatDbv1 > 100 || $candidatAbv2 + $candidatBbv2 + $candidatCbv2 + $candidatDbv2 > 100 || $candidatAbv3 + $candidatBbv3 + $candidatCbv3 + $candidatDbv3 > 100) {
    echo "La somme des scores ne doit pas dépasser 100.";
  
  
  
  }

$totalScoreCandidat = $candidatAbv1+$candidatAbv2+$candidatAbv3+$candidatBbv1+$candidatBbv2+$candidatBbv3+$candidatCbv1+$candidatCbv2+$candidatCbv3+$candidatDbv1+$candidatDbv2+$candidatDbv3;
$scoreCandidatA = $candidatAbv1+$candidatAbv2+$candidatAbv3; 
$scoreCandidatB = $candidatBbv1+$candidatBbv2+$candidatBbv3; 
$scoreCandidatC = $candidatCbv1+$candidatCbv2+$candidatCbv3;
$scoreCandidatD = $candidatDbv1+$candidatDbv2+$candidatDbv3;
$scores = [];
foreach ($scores as $score) {
  $scoreCandidatA += $scoreCandidatA[1]; 
  $scoreCandidatB += $scoreCandidatB[2]; 
  $scoreCandidatC += $scoreCandidatC[3]; 
  $scoreCandidatD += $scoreCandidatD[4]; 
}

$pourcentageCandidatA = round($scoreCandidatA / $totalScoreCandidat * 100, 2); 
$pourcentageCandidatB = round($scoreCandidatB / $totalScoreCandidat * 100, 2); 
$pourcentageCandidatC = round($scoreCandidatC / $totalScoreCandidat * 100, 2); 
$pourcentageCandidatD = round($scoreCandidatD / $totalScoreCandidat * 100, 2);


$elu = ""; 
$secondTour = []; 
$ballottageFavorable = "";
$ballottageDefavorable = ""; 
$battus = []; 
if ($pourcentageCandidatA > 50) { 
  $elu = "Candidat A"; 
} else if ($pourcentageCandidatB > 50) { 
  $elu = "Candidat B"; 
} else if ($pourcentageCandidatC > 50) { 
  $elu = "Candidat C"; 
} else if ($pourcentageCandidatD > 50) { 
  $elu = "Candidat D"; 
} else { 

  $max1 = max($pourcentageCandidatA, $pourcentageCandidatB, $pourcentageCandidatC, $pourcentageCandidatD); 
  $max2 = 0;
  foreach (array($pourcentageCandidatA, $pourcentageCandidatB, $pourcentageCandidatC, $pourcentageCandidatD) as $p) {
    if ($p < $max1 && $p > $max2) {
      $max2 = $p; 
    }
  }

  if ($pourcentageCandidatA == $max1 || $pourcentageCandidatA == $max2) {
    $secondTour[] = "Candidat A";
  }
  if ($pourcentageCandidatB == $max1 || $pourcentageCandidatB == $max2) {
    $secondTour[] = "Candidat B";
  }
  if ($pourcentageCandidatC == $max1 || $pourcentageCandidatC == $max2) {
    $secondTour[] = "Candidat C";
  }
  if ($pourcentageCandidatD == $max1 || $pourcentageCandidatD == $max2) {
    $secondTour[] = "Candidat D";
  }
  
  if ($pourcentageCandidatA == $max1) {
    $ballottageFavorable = "Candidat A";
  } else if ($pourcentageCandidatB == $max1) {
    $ballottageFavorable = "Candidat B";
  } else if ($pourcentageCandidatC == $max1) {
    $ballottageFavorable = "Candidat C";
  } else if ($pourcentageCandidatD == $max1) {
    $ballottageFavorable = "Candidat D";
  }
  
  if ($pourcentageCandidatA == $max2) {
    $ballottageDefavorable = "Candidat A";
  } else if ($pourcentageCandidatB == $max2) {
    $ballottageDefavorable = "Candidat B";
  } else if ($pourcentageCandidatC == $max2) {
    $ballottageDefavorable = "Candidat C";
  } else if ($pourcentageCandidatD == $max2) {
    $ballottageDefavorable = "Candidat D";
  }
 
  if ($pourcentageCandidatA < $max2) {
    $battus[] = "Candidat A";
  }
  if ($pourcentageCandidatB < $max2) {
    $battus[] = "Candidat B";
  }
  if ($pourcentageCandidatC < $max2) {
    $battus[] = "Candidat C";
  }
  if ($pourcentageCandidatD < $max2) {
    $battus[] = "Candidat D";
  }
}
        function afficherGraphique($nom, $pourcentage, $couleur) {
            echo "
            <div class='barre' style='width: $pourcentage%; background-color: $couleur;'>
                <span class='nom'>$nom</span>
                <span class='pourcentage'>$pourcentage%</span>
            </div>
            ";
        }

        if ($elu != "") {
            echo "
            <p>Le candidat élu dès le premier tour est : <strong>$elu</strong></p>
            <p>Voici le détail des scores :</p>
            ";
        
            afficherGraphique("Candidat A", $pourcentageCandidatA, "red");
            afficherGraphique("Candidat B", $pourcentageCandidatB, "orange");
            afficherGraphique("Candidat C", $pourcentageCandidatC, "green");
            afficherGraphique("Candidat D", $pourcentageCandidatD, "blue");
        } else { 
            echo "
            <p>Aucun candidat n'a obtenu plus de 50% des voix. Il faut donc un second tour entre les deux candidats suivants :</p>
            <ul>
            ";
        
            foreach ($secondTour as $candidat) {
                echo "<li><strong>$candidat</strong></li>";
            }
        
            echo "
            </ul>
            <p>Voici le détail des scores et des statuts :</p>
            ";

            function afficherStatut($candidat, $ballottageFavorable, $ballottageDefavorable) {
              echo "<p>Statut : ";
              if ($ballottageFavorable == $candidat) {
                echo "Ballottage favorable";
              } else if ($ballottageDefavorable == $candidat) {
                echo "Ballottage défavorable";
              } else {
                echo "Battu";
              }
              echo "</p>";
            }
            
        
            afficherGraphique("Candidat A", $pourcentageCandidatA, "red");
            afficherStatut("Candidat A", $ballottageFavorable, $ballottageDefavorable);
            
            afficherGraphique("Candidat B", $pourcentageCandidatB, "orange");
            afficherStatut("Candidat B", $ballottageFavorable, $ballottageDefavorable);
            
            afficherGraphique("Candidat C", $pourcentageCandidatC, "green");
            afficherStatut("Candidat C", $ballottageFavorable, $ballottageDefavorable);
            
            afficherGraphique("Candidat D", $pourcentageCandidatD, "blue");
            afficherStatut("Candidat D", $ballottageFavorable, $ballottageDefavorable);
        }
      }
        ?>
    </div>
</body>
</html>