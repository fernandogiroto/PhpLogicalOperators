<?php 


    
/*
4.	Crie um programa que leia o valor das vendas de uma empresa em 4 anos consecutivos: 2010, 2011, 2012 e 2013. Os valores deverão 
ser positivos. O programa deverá indicar em quantos anos neste período o valor de vendas cresceu em relação ao ano anterior 
(o valor de saída será entre 0 e 3). Deverá indicar ainda o crescimento percentual entre o ano 2010 e 2013. (utilizado ciclos).
*/

$companySales = [];
$growValue = 0;

for($i=0; $i<4; $i++ ){
    $positeValue = false;
    while($positeValue == false){
        echo 'Qual o valor total das vendas do ano de 201'. $i . ': ';
        $value = intval(fgets(STDIN));  
        if($value > 0){
            $companySales[$i] = $value; 
            $positeValue = true;
        }       
    }
}

for($i=0; $i < sizeof($companySales); $i++){

    if(isset($companySales[$i +1])){
        if($companySales[$i] < $companySales[$i + 1])
            $growValue++;
    }
}

print_r($companySales);
echo "Entre 2010 e 2013 foi(ram) {$growValue} anos de crescimento anual. \n";

$percentualGrow = round(((end($companySales) - reset($companySales)) / reset($companySales)) * 100);
echo "O crescimento percentual de 2010 para 2013 foi de {$percentualGrow}% \n";


/*
2.	Crie um programa que leia 3 notas de um aluno: N1, N2, N3 e indique se o aluno passou à disciplina. Para passar à disciplina 
o aluno deverá ter uma nota igual ou superior a 8 nas 3 notas e a soma de N1 e N2 deverá ser igual ou superior a 20.  
As notas deverão estar no intervalo de 0 a 20. */

$notes = [];
$approved = false;

for($i=1; $i <= 3 ; $i++){
    do{
        echo "Digite a nota {$i} : ";
        $note = intval(fgets(STDIN));

        if($note >= 0 && $note < 20)
            $notes[] = $note;

    } while(!($note >= 0 && $note < 20));
}

if(($notes[0] + $notes[1]) >= 20)
    $approved = true;

foreach($notes as $note){
   if($note < 8)
      $approved = false;
}

if($approved == true)
    echo "Aluno  aprovado ";
else
    echo "Aluno reprovado";



// 3.	Escreva um programa que leia 3 números inteiros do utilizador, garantindo que todos eles são positivos e diferentes entre si. 
// Se o utilizador tentar introduzir um valor igual a um valor já introduzido, o programa deverá repetir o pedido de introdução do valor.

$intNumbers = [];

for($i=0; $i<3; $i++){

    $notRepeatPositiveValue = false;
    while($notRepeatPositiveValue == false ){
        echo "Digite um valor positivo e não repetido: ";
        $intValue = intval(fgets(STDIN));
        if( $intValue > 0 &&  !(in_array($intValue,$intNumbers))  ){
            $intNumbers[] = $intValue;
            $notRepeatPositiveValue = true;
        }           
    }

}


/*
1.	Escreva um programa que leia 3 notas de um aluno (teórica, prática e projecto). As notas deverão estar no intervalo 0-20.
A nota final é dada pela soma pesada das notas (TEOR=50% PRAT=30% PROJ=20%). O aluno será aprovado se a soma das 3 notas for 
superior a 30 ou no caso de a nota prática e teórica serem ambas iguais ou superiores a 13. O aluno deverá ser submetido a um 
exame oral se a nota teórica for 8 ou 9 ou no caso de a média final ser superior a 14. O programa deverá indicar todos os resultados.
Para passar o aluno deverá ter uma nota igual ou superior a 8 em ambas as frequências e uma nota igual ou superior a 10 na média das
duas frequências (F). O programa deverá verificar se os valores introduzidos para as frequências estão no intervalo entre 0 e 20. 
O trabalho deverá ter um valor entre 0 e 4.
*/

$classes = ['teoria','pratica','projeto'];
$students = [
     
];

// Insert Notes
for($i=0; $i < 1; $i++){
    echo "Digite o nome do aluno: ";
    $studentName = strval(fgets(STDIN));

    foreach ($classes as $class){
        $setInterval = false;
        while($setInterval == false){

            echo "digite a nota do auno da classe de {$class}: ";
            $note = intval(fgets(STDIN)); 
            
            if($note >= 0 && $note <= 20){
                $notes[$class] = $note;
                $setInterval = true;
            }
        }
    }
    $students[$studentName] = $notes;

    print_r($notes);
$teorica  = $notes['teoria']  * 5;
$pratica = $notes['pratica'] * 3;
$projeto = $notes['projeto'] * 2;
$media = ($teorica + $pratica + $projeto)/10;

echo "media: {$media} \n";

if($teorica + $pratica + $projeto > 30 || $pratica >= 13 && $teorica >= 13 )
    echo "Aluno aprovado \n";
elseif($teorica == 8 || $teorica == 9 || $media > 14)
    echo "aluno será submetido a um exame oral \n";    
}