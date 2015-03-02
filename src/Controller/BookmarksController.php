<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
                'Bookmarks.user_id' => $this->Auth->user('id'),
            ]
        ];
        $this->set('bookmarks', $this->paginate($this->Bookmarks));
        $this->set('_serialize', ['bookmarks']);
    }

    /*public function index()
    {
        $this->paginate = [
            'conditions' => [
                'Bookmarks.user_id' => $this->Auth->user('id'),
            ]
        ];
        $this->set('bookmarks', $this->paginate($this->Bookmarks));
    }*/

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users'] //, 'Tags', 'BookmarksTags'  
        ]);
        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    // finder method to search through bookmarks by tag.
    public function tags()
    {
        $tags = $this->request->params['pass']; 
        $bookmarks = $this->Bookmarks->find('tagged', [
            'tags' => $tags
        ]);
        var_dump($bookmarks);
        $this->set(compact('bookmarks', 'tags'));
    }

    //created for trial
    public function callTags(){
        $bookmarks = $this->Bookmarks->find('callme');
        echo $bookmarks;
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity($this->request->data);
        $bookmark->user_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success('The bookmark has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('The bookmark could not be saved. Please, try again.');
        }

        // Fetch user with logged in user id
        $query = $this->Bookmarks->Users->find('all', [
            'conditions' => ['Users.id' => $this->Auth->user('id')]
        ]);

        // Calling execute will execute the query and return the result set.
        $results = $query->all();

        // Once we have a result set we can get all the rows
        $data = $results->toArray();

        foreach ($data as $row) {
            $users[$row->id] = $row->user_name;
        }

        $tags = $this->Bookmarks->Tags->find('list');

        $this->set(compact('bookmark', 'users', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        
        $bookmark = $this->Bookmarks->get($id, ['contain' => 'Tags'] );
        //$bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
        // echo "<pre>"; print_r($bookmark); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success('The bookmark has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('The bookmark could not be saved. Please, try again.');
        }
        
        // Fetch user with logged in user id
        $query = $this->Bookmarks->Users->find('all', [
            'conditions' => ['Users.id' => $this->Auth->user('id')]
        ]);

        // Calling execute will execute the query and return the result set.
        $results = $query->all();

        // Once we have a result set we can get all the rows
        $data = $results->toArray();

        foreach ($data as $row) {
            $users[$row->id] = $row->user_name;
        }

        $tags = $this->Bookmarks->Tags->find('list');
        $this->set(compact('bookmark', 'users', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success('The bookmark has been deleted.');
        } else {
            $this->Flash->error('The bookmark could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'tags'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $bookmark = $this->Bookmarks->get($id);
        if ($bookmark->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
