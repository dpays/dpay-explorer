<?php
namespace BexNetwork\Controllers;
use BexNetwork\Models\Block;
class BlockController extends ControllerBase
{
  public function viewAction()
  {
    $height = $this->dispatcher->getParam("height");
    $this->view->current = Block::findFirst(array(
      array(
        '_id' => (int) $height
      )
    ));
    if(!$this->view->current) {
      $this->flashSession->error('Block "'.$height.'" does not exist on the dPay network currently.');
      $this->response->redirect();
      return;
    }
  }
}
