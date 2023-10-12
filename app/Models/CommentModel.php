<<<<<<< HEAD
<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments'; // Nome da tabela de comentários
    protected $primaryKey = 'id'; // Chave primária da tabela
    protected $allowedFields = ['post_id', 'comment_text']; // Campos permitidos para inserção

    public function addComment($postID, $commentText)
    {
        $data = [
            'post_id' => $postID,
            'comment_text' => $commentText,
        ];

        return $this->insert($data); // Insere o comentário no banco de dados e retorna o resultado
    }

    public function viewComments($postID)
    {
        // Lógica para exibir os comentários de uma postagem específica
        return $this->where('post_id', $postID)->findAll(); // Consulta os comentários relacionados à postagem
    }
}
=======
<?php

namespace App\Models;
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CommentModel; // Importe a classe CommentModel

class CommentController extends Controller
{
    protected $commentModel; // Defina a propriedade $commentModel

    public function __construct()
    {
        // Obtenha as dependências usando o Service Container
        $this->commentModel = new CommentModel(); // Inicialize o modelo CommentModel
    }

    public function addComment()
    {
        // Lógica para adicionar um comentário
    }

    public function viewComments()
    {
        // Lógica para exibir os comentários
    }
}

?>
>>>>>>> 3eaab76671dd74846e82fca60e4c46a8c69bb0cf
