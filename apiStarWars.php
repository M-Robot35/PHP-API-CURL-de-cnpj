<?php 
// consumir API USANDO   file_get_contents
// site api  https://swapi.py4e.com/
//  teste
// http://localhost/php_api/outraapi.php
?>

<!DOCTYPE html>
<html lang="ph-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>API | Star Wars</title>
</head>
<body>
    <h1>API | STAR WARS | THIAGO TELES</h1><br>
    <h1><a href="https://swapi.py4e.com/">API</a><br></h1>

    <?php        
        $url = "https://swapi.py4e.com/api/people/";
        $result = json_decode(file_get_contents($url));        

        foreach ($result->results as $ator) :{  
    ?>   


    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h1><?php echo $ator->name;?></h1>
            </button>
            </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        
        <div class="accordion-body">
                <strong><ul class="habilidades">
                        <li>                   
                            <h3><span>Nome: </span><?php echo $ator->name;?></h3>                    
                            <h3><span>Altura: </span> <?php echo $ator->height;?> </h3>                    
                            <h3><span>Massa: </span> <?php echo $ator->mass;?> </h3>                    
                            <h3><span>Cor dos olhos: </span> <?php echo $ator->eye_color;?> </h3>                    
                            <h3><span>Ano de Nascimento: </span> <?php echo $ator->birth_year;?> </h3>                    
                            <h3><span>Genero: </span> <?php echo $ator->gender;?> </h3>                    
                            <h3><span>Planeta Natal: </span> <?php echo $ator->homeworld;?> </h3>                    
                        </li>
                    </ul></strong>
                </div>
            </div>
        </div>
    <?php }endforeach ?>   
</body>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>