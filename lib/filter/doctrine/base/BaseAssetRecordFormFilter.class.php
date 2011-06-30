<?php

/**
 * AssetRecord filter form base class.
 *
 * @package    cfssf
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAssetRecordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'year'   => new sfWidgetFormFilterInput(),
      'amount' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'year'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'amount' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('asset_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssetRecord';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'year'   => 'Number',
      'amount' => 'Number',
    );
  }
}
