<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=
    , initial-scale=1.0"  />
    <title>Avaliação Loja Interativa</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
</head>
<body>
<div class="main-container">
    <h1>LOJA INTERATIVA</h1>

    <div class="grid-container">
        <div class="category-container">
            <form action="<?=$base?>/new-provider" method="post">
                <label for=""><h3>FABRICANTE</h3></label>
                <input type="text" placeholder="Digite o nome do fabricante" name="name" id="fname"/>
                <label for=""><h3>CATEGORIA</h3></label>
                <input type="text" name="category1" placeholder="Digite o nome da categoria 1" id="fcategoryname"/>
                <input type="text" name="category2"  placeholder="Digite o nome da categoria 2" id="fcategoryname2"/>
                <input type="text" name="category3"  id="fcategoryname3" placeholder="Digite o nome da categoria 3"/>
                <input type="submit" class="botao" value="Adicionar">
            </form>
        </div>

        <div class="product-container">
            <form action="<?=$base?>/new-product" method="post">
                <label for=""><h3>NOME DO PRODUTO</h3></label>
                <input type="text" placeholder="Digite o nome do produto" name="name" id="fproduct" />
                <label for=""><h3>FABRICANTE</h3></label>
                <select id="provider" name="provider">
                    <?php foreach ($providers as $provider):?>
                    <option value="<?=$provider->id?>"><?=$provider->name?></option>
                    <?php endforeach;?>
                </select>
                <label for=""><h3>CATEGORIA</h3></label>
                <select id="category" name="category">
                    <?php foreach ($providers as $provider):?>
                        <option value="<?=$provider->name?>"><?=$provider->name?></option>
                    <?php endforeach;?>
                </select>
                <label for=""><h3>PREÇO</h3></label>
                <input  type="number" placeholder="Digite o preço"  name="price" id="fprice" />

                <input type="submit" class="botao" value="Adicionar">
            </form>
        </div>
        <div class="search-container">
            <!-- <i class="fas fa-search icon"></i> -->
            <input  type="search" name="fsearch" id="fsearch" placeholder="Sua busca" class="input-search"/>
        </div>
        <br/>
        <br/>
        <div class="database-container">

            <div class="db-info">
                <table class="table " style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUTO</th>
                        <th scope="col">FABRICANTE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">PREÇO</th>
                        <TH scope="col"></TH>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product):?>
                    <tr>
                        <th scope="row"><?=$product->id?></th>
                        <td ><?=$product->name?></td>
                        <td><?=$product->provider->name?></td>
                        <td><?=$product->category?></td>
                        <td>R$ <?=number_format($product->price,2,',','.')?></td>
                        <td  class='td-btn'><a href="<?=$base?>/editProduct/<?=$product->id?>" id="myBtn" class='botao'>Editar</a></td>
                        <td  class='td-btn'><a href="<?=$base?>/deleteProduct/<?=$product->id?>" class='botao'>Deletar</a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                        
                </table>
            </div>
    </div>
</div>
</div>
</body>
</html>
