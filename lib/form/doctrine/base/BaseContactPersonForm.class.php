<?php

/**
 * ContactPerson form base class.
 *
 * @method ContactPerson getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactPersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'address'         => new sfWidgetFormInputText(),
      'phone'           => new sfWidgetFormInputText(),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'organization_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactPerson';
  }

}
