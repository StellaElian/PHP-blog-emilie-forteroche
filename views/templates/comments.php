<h1>Gestion des commentaires</h1>

<table border="1">
    <thead>
        <tr>
            <th>Article</th>
            <th>Auteur</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= htmlspecialchars((new ArticleManager())->getArticleById($comment->getIdArticle())->getTitle()) ?>
                </td>
                <td><?= htmlspecialchars($comment->getPseudo()) ?></td>
                <td><?= htmlspecialchars($comment->getContent()) ?></td>
                <td><?= htmlspecialchars($comment->getDateCreation()->format('Y-m-d H:i:s')) ?></td>
                <td>
                    <a href="index.php?action=deleteComment&id=<?= $comment->getId() ?>" class="submit">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>