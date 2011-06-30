<?php

/**
 * GivingRecord form base class.
 *
 * @method GivingRecord getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGivingRecordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'year'            => new sfWidgetFormInputText(),
      'amount'          => new sfWidgetFormInputText(),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'year'            => new sfValidatorInteger(array('required' => false)),
      'amount'          => new sfValidatorInteger(array('required' => false)),
      'organization_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('giving_record[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GivingRecord';
  }

}
