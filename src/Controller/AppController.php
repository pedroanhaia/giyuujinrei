<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\View\JsonView;
use Cake\View\XmlView;
use Cake\Event\EventInterface;
use Authentication\AuthenticationService;
use Cake\Controller\Component\AuthComponent;

require_once (ROOT . DS . 'vendor' . DS  . 'BetelPackages' . DS . 'Utilities.php');

class AppController extends Controller {
	public function beforeRender(EventInterface $event) {
		$this->viewBuilder()->setOption('serialize', array_keys($this->viewBuilder()->getVars()));

		parent::beforeRender($event);
		//if ($this->Authentication->getResult()->isValid()) {
		//    // Obtém os dados do usuário autenticado
		//    $userData = $this->Authentication->getIdentity()->getOriginalData();
		////
		//    // Passa o nome do usuário para a view
		//    $this->set('userName', $userData['nickname']); // Substitua 'name' pelo campo correto que armazena o nome do usuário no seu banco de dados
		//    $this->set('role', $userData['role']);
		//}
	}
	

	public function initialize(): void {
		$this->loadComponent('Authentication.Authentication');
		$this->loadComponent('Authorization.Authorization');
		parent::initialize();

		$this->loadComponent('Flash');
		$this->loadComponent('RequestHandler');
		$this->loadModel('Users');

		$this->Authorization->skipAuthorization();

		// Permite a ação display, assim nosso pages controller
		// continua a funcionar.
		//$this->Auth->allow(['display']);
		/*
		 * Enable the following component for recommended CakePHP form protection settings.
		 * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
		 */
		//$this->loadComponent('FormProtection');

	}

	public function beforeFilter(\Cake\Event\EventInterface $event) {
		parent::beforeFilter($event);

		$userLogado = $this->Authentication->getIdentity();

		if(!empty($userLogado)) {
			$userData = $this->Authentication->getIdentity()->getOriginalData();
			$usuarioId = $userData->id; // Obtém o ID do usuário autenticado
			$this->userObj = $this->Users->findById($usuarioId)->first();
			$this->set('darkMode', $this->userObj->darkmode);
			$this->set('iduserLogado', $this->userObj->id);
			$this->set('role', $this->userObj->role);

			$currentController = $this->request->getParam('controller');
			$currentAction = $this->request->getParam('action');
			$this->set('currentAction', $currentAction);
			$this->set('currentController', $currentController);
		}
	}

	public function isAuthorized($user)	{
		return true;
	}

	public function viewClasses(): array {
		return [JsonView::class];
	}

	public function jsonResponse($responseData = [], $responseStatusCode = 200) {
		return $this->response
		->withType('json', ['application/json'])
		->withStatus($responseStatusCode)
		->withStringBody(json_encode($responseData));
		
	}
}
