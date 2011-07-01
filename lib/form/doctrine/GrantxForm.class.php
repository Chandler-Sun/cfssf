<?php

/**
 * Grantx form.
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GrantxForm extends BaseGrantxForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at'],$this['collector_id'],$this['reviewer_id']
    );
  	$this->widgetSchema['attachment'] = new sfWidgetFormInputFile(array(
       'label' => 'Attachment',
    ));
  }
}
