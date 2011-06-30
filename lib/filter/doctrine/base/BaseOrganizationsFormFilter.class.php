<?php

/**
 * Organizations filter form base class.
 *
 * @package    cfssf
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrganizationsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'engName'      => new sfWidgetFormFilterInput(),
      'chnName'      => new sfWidgetFormFilterInput(),
      'website'      => new sfWidgetFormFilterInput(),
      'status'       => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1, 2 => 2))),
      'comment'      => new sfWidgetFormFilterInput(),
      'collector_id' => new sfWidgetFormFilterInput(),
      'reviewer_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'engName'      => new sfValidatorPass(array('required' => false)),
      'chnName'      => new sfValidatorPass(array('required' => false)),
      'website'      => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1, 2 => 2))),
      'comment'      => new sfValidatorPass(array('required' => false)),
      'collector_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reviewer_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('organizations_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organizations';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'engName'      => 'Text',
      'chnName'      => 'Text',
      'website'      => 'Text',
      'status'       => 'Enum',
      'comment'      => 'Text',
      'collector_id' => 'Number',
      'reviewer_id'  => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
