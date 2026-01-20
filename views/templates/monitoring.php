<h1>Monitoring des articles</h1>

<style>
tr:nth-child(even) { background-color: #f2f2f2; }
</style>
<?php 
$newOrder = ($order === 'asc') ? 'desc' : 'asc'; 

$newOrderTitle = ($sort === 'title' && $order === 'asc') ? 'desc' : 'asc';
$newOrderDate = ($sort === 'created_at' && $order === 'asc') ? 'desc' : 'asc';
$newOrderViews = ($sort === 'views' && $order === 'asc') ? 'desc' : 'asc';
$newOrderComments = ($sort === 'nb_comments' && $order === 'asc') ? 'desc' : 'asc';

?>

<table border="1">
    <thead>
        <tr>
            <th>
                <a href="index.php?action=monitoring&sort=title&order=<?= $newOrderTitle ?>">Titre</a>
            </th>
            <th>
                <a href="index.php?action=monitoring&sort=created_at&order=<?= $newOrderDate ?>">Date</a>
            </th>
            <th>
                <a href="index.php?action=monitoring&sort=views&order=<?= $newOrderViews ?>">Vues</a>
            </th>
            <th>
                <a href="index.php?action=monitoring&sort=nb_comments&order=<?= $newOrderComments ?>">Nombre de commentaires</a>
            </th>
    
        </tr>
    </thead>
    <tbody>

    

    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= htmlspecialchars($article['title']) ?></td>
            <td><?= htmlspecialchars($article['created_at']) ?></td>
            <td><?= htmlspecialchars($article['views']) ?></td>
            <td><?= htmlspecialchars($article['nb_comments']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>