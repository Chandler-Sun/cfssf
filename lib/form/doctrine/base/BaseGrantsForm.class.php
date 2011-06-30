<?php

/**
 * Grants form base class.
 *
 * @method Grants getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGrantsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'comment'         => new sfWidgetFormTextarea(),
      'collector_id'    => new sfWidgetFormInputText(),
      'reviewer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'organization_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'comment'         => new sfValidatorString(array('required' => false)),
      'collector_id'    => new sfValidatorInteger(array('required' => false)),
      'reviewer_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'organization_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grants[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grants';
  }

}
