<?php

/**
 * TheGrants filter form base class.
 *
 * @package    cfssf
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTheGrantsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comment'         => new sfWidgetFormFilterInput(),
      'collector_id'    => new sfWidgetFormFilterInput(),
      'reviewer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'comment'         => new sfValidatorPass(array('required' => false)),
      'collector_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reviewer_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'organization_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organization'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('the_grants_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TheGrants';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'comment'         => 'Text',
      'collector_id'    => 'Number',
      'reviewer_id'     => 'ForeignKey',
      'organization_id' => 'ForeignKey',
    );
  }
}
