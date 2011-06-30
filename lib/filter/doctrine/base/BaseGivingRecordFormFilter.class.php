<?php

/**
 * GivingRecord filter form base class.
 *
 * @package    cfssf
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGivingRecordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'year'            => new sfWidgetFormFilterInput(),
      'amount'          => new sfWidgetFormFilterInput(),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'year'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'amount'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'organization_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organization'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('giving_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GivingRecord';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'year'            => 'Number',
      'amount'          => 'Number',
      'organization_id' => 'ForeignKey',
    );
  }
}
