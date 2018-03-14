<h1>Tous les posts</h1>
<?= $this->Html->link('Ajouter un post', ['action' => 'add']) ?>

 <table>
 
   <tr>
    <th>Id</th>
    <th>Content</th>
    <th>Created at</th>
   </tr>
   <?php foreach ($posts as $post): ?>
    <tr> 
     <td><?= $post->id ?></td>
     <td> <?= $this->Html->link($post->content, ['action' => 'view', $post->id]) ?> </td>
     <td> <?= $post->created->format(DATE_RFC850) ?> </td>
    </tr>
   <?php endforeach; ?> 
 </table>