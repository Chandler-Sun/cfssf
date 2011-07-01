<?php

/**
 * Grantx filter form base class.
 *
 * @package    cfssf
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGrantxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'To be reviewed' => 'To be reviewed', 'Reviewed' => 'Reviewed', 'Complete' => 'Complete'))),
      'frequency'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'Yearly' => 'Yearly', 'Biannual' => 'Biannual', 'Dependent on Funds' => 'Dependent on Funds', 'Ongoing' => 'Ongoing', 'Other' => 'Other'))),
      'attachment'      => new sfWidgetFormFilterInput(),
      'comment'         => new sfWidgetFormFilterInput(),
      'collector_id'    => new sfWidgetFormFilterInput(),
      'reviewer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'organization_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('required' => false, 'choices' => array('To be reviewed' => 'To be reviewed', 'Reviewed' => 'Reviewed', 'Complete' => 'Complete'))),
      'frequency'       => new sfValidatorChoice(array('required' => false, 'choices' => array('Yearly' => 'Yearly', 'Biannual' => 'Biannual', 'Dependent on Funds' => 'Dependent on Funds', 'Ongoing' => 'Ongoing', 'Other' => 'Other'))),
      'attachment'      => new sfValidatorPass(array('required' => false)),
      'comment'         => new sfValidatorPass(array('required' => false)),
      'collector_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reviewer_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'organization_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organization'), 'column' => 'id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('grantx_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grantx';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'status'          => 'Enum',
      'frequency'       => 'Enum',
      'attachment'      => 'Text',
      'comment'         => 'Text',
      'collector_id'    => 'Number',
      'reviewer_id'     => 'ForeignKey',
      'organization_id' => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
