<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaCategorias Controller
 *
 * @property \App\Model\Table\RecetaCategoriasTable $RecetaCategorias */
class RecetaCategoriasController extends AppController
{
	
	  public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
         
        
        $this->Auth->allow('filtrado');
         
        
         $this->Auth->redirectUrl();
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recetas', 'Categorias']
        ];
        $this->set('recetaCategorias', $this->paginate($this->RecetaCategorias));
        $this->set('_serialize', ['recetaCategorias']);
    }
	 public function filtrado()
    {
		$nombrecategoria=$_GET['categoria'];
        $this->paginate = [
            'contain' => ['Recetas', 'Categorias']
        ];
		$rcs=$this->paginate($this->RecetaCategorias);
		$Recetas=array();
		foreach($rcs as $rc){
			$categoria=$this->RecetaCategorias->Categorias->get($rc->categoria_id);
			if(strcmp($nombrecategoria,$categoria->nombre)==0){
				array_push($Recetas,$this->RecetaCategorias->Recetas->get($rc->receta_id));
			}
		}
        $this->set('Recetas', $Recetas);
		
        $this->set('_serialize', ['Recetas']);
    }
    /**
     * View method
     *
     * @param string|null $id Receta Categoria id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
		$recetaCategoria;
		$todas=$this->paginate($this->RecetaCategorias);
		foreach($todas as $una){
			if($una->id==$id){
				$recetaCategoria=$una;
			}
		}
        
        $this->set('recetaCategoria', $recetaCategoria);
        $this->set('_serialize', ['recetaCategoria']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recetaCategoria = $this->RecetaCategorias->newEntity();
        if ($this->request->is('post')) {
            $recetaCategoria = $this->RecetaCategorias->patchEntity($recetaCategoria, $this->request->data);
			$recetaCategoria->receta_id=$this->request->data['recetas_id'];
			$recetaCategoria->categoria_id=$this->request->data['categorias_id'];
            if ($this->RecetaCategorias->save($recetaCategoria)) {
                $this->Flash->success(__('RecetaCategorias guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('RecetaCategorias no pudo ser guardada.'));
            }
        }
        $rs = $this->RecetaCategorias->Recetas->find('list', ['limit' => 200]);
        $cs = $this->RecetaCategorias->Categorias->find('list', ['limit' => 200]);
		$recetas=array();
		foreach($rs as $id){
			$r=$this->RecetaCategorias->Recetas->get($id);
			$recetas[$id]=$r->nombre;
		}
		$categorias=array();
		foreach($cs as $id){
			$c=$this->RecetaCategorias->Categorias->get($id);
			$categorias[$id]=$c->nombre;
		}
        $this->set(compact('recetaCategoria', 'recetas', 'categorias'));
        $this->set('_serialize', ['recetaCategoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Categoria id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   

    /**
     * Delete method
     *
     * @param string|null $id Receta Categoria id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaCategoria;
		$todas=$this->paginate($this->RecetaCategorias);
		foreach($todas as $una){
			if($una->id==$id){
				$recetaCategoria=$una;
			}
		}
        
        if ($this->RecetaCategorias->delete($recetaCategoria)) {
            $this->Flash->success(__('RecetaCategorias borrada.'));
        } else {
            $this->Flash->error(__('RecetaCategorias no pudo ser borrada.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
