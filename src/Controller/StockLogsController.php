<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StockLogs Controller
 *
 * @property \App\Model\Table\StockLogsTable $StockLogs
 */
class StockLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->StockLogs->find()
            ->contain(['Products', 'Users']);
        $stockLogs = $this->paginate($query);

        $this->set(compact('stockLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockLog = $this->StockLogs->get($id, contain: ['Products', 'Users']);
        $this->set(compact('stockLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockLog = $this->StockLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $stockLog = $this->StockLogs->patchEntity($stockLog, $this->request->getData());
            if ($this->StockLogs->save($stockLog)) {
                $this->Flash->success(__('The stock log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock log could not be saved. Please, try again.'));
        }
        $products = $this->StockLogs->Products->find('list', limit: 200)->all();
        $users = $this->StockLogs->Users->find('list', limit: 200)->all();
        $this->set(compact('stockLog', 'products', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockLog = $this->StockLogs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockLog = $this->StockLogs->patchEntity($stockLog, $this->request->getData());
            if ($this->StockLogs->save($stockLog)) {
                $this->Flash->success(__('The stock log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock log could not be saved. Please, try again.'));
        }
        $products = $this->StockLogs->Products->find('list', limit: 200)->all();
        $users = $this->StockLogs->Users->find('list', limit: 200)->all();
        $this->set(compact('stockLog', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockLog = $this->StockLogs->get($id);
        if ($this->StockLogs->delete($stockLog)) {
            $this->Flash->success(__('The stock log has been deleted.'));
        } else {
            $this->Flash->error(__('The stock log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
