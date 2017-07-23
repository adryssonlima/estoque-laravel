<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title>Controle de estoque</title>
</head>
<body>
    <div class="container">
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>Nome</th>
                <th>Preço</th> 
                <th>Descrição</th>
                <th>Quantidade</th>
            </tr>
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= $p->nome ?> </td>
                    <td><?= $p->valor ?> </td>
                    <td><?= $p->descricao ?> </td>
                    <td><?= $p->quantidade ?> </td>
                    <td><a href="/produtos/mostra/<?= $p->id ?>">Visualizar</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>