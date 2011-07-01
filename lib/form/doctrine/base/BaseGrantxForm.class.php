<?php

/**
 * Grantx form base class.
 *
 * @method Grantx getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGrantxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'comment'         => new sfWidgetFormTextarea(),
      'collector_id'    => new sfWidgetFormInputText(),
      'reviewer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'comment'         => new sfValidatorString(array('required' => false)),
      'collector_id'    => new sfValidatorInteger(array('required' => false)),
      'reviewer_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'organization_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('grantx[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grantx';
  }

}
