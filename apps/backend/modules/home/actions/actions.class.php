<?php

/**
 * home actions.
 *
 * @package    cfssf
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  public function executeNews(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  public function executeSearch(sfWebRequest $request)
  {
    $this->form = new sfForm();
    $this->form->setWidgets(array(
      'field' => new sfWidgetFormChoice(array('choices' => array('Organization Name', 'id'))),
      'Keyword' => new sfWidgetFormInputText(),
    ));
    if ($request->isMethod('post'))
    {
        $this->redirect('/');
    }
  }

}
