<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=
    , initial-scale=1.0"/>
    <title>Avaliação Loja Interativa</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
</head>
<body>
<div class="main-container">
    <div class="product-container">
        <form action="<?= $base ?>/editAction" method="post">
            <input type="hidden" name="id" value="<?=$product->id?>">
            <label for=""><h3>NOME DO PRODUTO</h3></label>
            <input type="text" value="<?=$product->name?>" placeholder="Digite o nome do produto" name="name" id="fproduct"/>
            <label for=""><h3>FABRICANTE</h3></label>
            <select id="provider" name="provider">
                <?php foreach ($providers as $provider): ?>
                    <option value="<?= $provider->id ?>"><?= $provider->name ?></option>
                <?php endforeach; ?>
            </select>
            <label for=""><h3>CATEGORIA</h3></label>
            <select id="category" name="category">
                <?php foreach ($providers as $provider): ?>
                    <option value="<?= $provider->name ?>"><?= $provider->name ?></option>
                <?php endforeach; ?>
            </select>
            <label for=""><h3>PREÇO</h3></label>
            <input value="<?=$product->price?>" type="number" placeholder="Digite o preço" name="price" id="fprice"/>

            <input type="submit" class="botao" value="Editar">
        </form>
    </div>
</div>
</body>
</html>

