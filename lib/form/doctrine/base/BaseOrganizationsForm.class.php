<?php

/**
 * Organizations form base class.
 *
 * @method Organizations getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrganizationsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'engName'         => new sfWidgetFormInputText(),
      'chnName'         => new sfWidgetFormInputText(),
      'reviewercomment' => new sfWidgetFormTextarea(),
      'collector_id'    => new sfWidgetFormInputText(),
      'reviewer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'engName'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'chnName'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reviewercomment' => new sfValidatorString(array('required' => false)),
      'collector_id'    => new sfValidatorInteger(array('required' => false)),
      'reviewer_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('organizations[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organizations';
  }

}
