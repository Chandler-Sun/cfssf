<?php

/**
 * Organization form base class.
 *
 * @method Organization getObject() Returns the current form's model object
 *
 * @package    cfssf
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrganizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'engName'      => new sfWidgetFormInputText(),
      'chnName'      => new sfWidgetFormInputText(),
      'website'      => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormChoice(array('choices' => array('To be reviewed' => 'To be reviewed', 'Reviewed' => 'Reviewed', 'Complete' => 'Complete'))),
      'comment'      => new sfWidgetFormTextarea(),
      'collector_id' => new sfWidgetFormInputText(),
      'reviewer_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'engName'      => new sfValidatorString(array('max_length' => 255)),
      'chnName'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'website'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'       => new sfValidatorChoice(array('choices' => array(0 => 'To be reviewed', 1 => 'Reviewed', 2 => 'Complete'), 'required' => false)),
      'comment'      => new sfValidatorString(array('required' => false)),
      'collector_id' => new sfValidatorInteger(),
      'reviewer_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Organization', 'column' => array('engName'))),
        new sfValidatorDoctrineUnique(array('model' => 'Organization', 'column' => array('chnName'))),
      ))
    );

    $this->widgetSchema->setNameFormat('organization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organization';
  }

}
