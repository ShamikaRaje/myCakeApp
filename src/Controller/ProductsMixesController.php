<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * ProductsMixes Controller
 *
 * @property \App\Model\Table\ProductsMixesTable $ProductsMixes
 */
class ProductsMixesController extends AppController
{

    //public $uses = ['Products', 'ProductsMixes']; 
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        //Model Object
        // pr($this->ProductsMixes); die; 
        //$this->ProductsMixes->products->printData(); exit;
        $this->paginate = [
            'contain' => ['products']
        ];
        
        $this->set('productsMixes', $this->paginate($this->ProductsMixes));
        $this->set('_serialize', ['productsMixes']);

        
    }

    /**
     * View method
     *
     * @param string|null $id Products Mix id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsMix = $this->ProductsMixes->get($id, [
            'contain' => ['products']
        ]);
        $this->set('productsMix', $productsMix);
        $this->set('_serialize', ['productsMix']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsMix = $this->ProductsMixes->newEntity();
        if ($this->request->is('post')) {
            $productsMix = $this->ProductsMixes->patchEntity($productsMix, $this->request->data);
            if ($this->ProductsMixes->save($productsMix)) {
                $this->Flash->success('The products mix has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The products mix could not be saved. Please, try again.');
            }
        }
        $products = $this->ProductsMixes->products->find('list', ['limit' => 200]);
        $this->set(compact('productsMix', 'products'));
        $this->set('_serialize', ['productsMix']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Mix id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsMix = $this->ProductsMixes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsMix = $this->ProductsMixes->patchEntity($productsMix, $this->request->data);
            if ($this->ProductsMixes->save($productsMix)) {
                $this->Flash->success('The products mix has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The products mix could not be saved. Please, try again.');
            }
        }
        $products = $this->ProductsMixes->products->find('list', ['limit' => 200]);
        $this->set(compact('productsMix', 'products'));
        $this->set('_serialize', ['productsMix']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Mix id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsMix = $this->ProductsMixes->get($id);
        if ($this->ProductsMixes->delete($productsMix)) {
            $this->Flash->success('The products mix has been deleted.');
        } else {
            $this->Flash->error('The products mix could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
