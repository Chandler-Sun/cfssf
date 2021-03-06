<?php

/**
 * BaseGrantx
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property enum $status
 * @property enum $frequency
 * @property blob $attachment
 * @property clob $comment
 * @property integer $collector_id
 * @property integer $reviewer_id
 * @property integer $organization_id
 * @property Organization $Organization
 * @property Member $Member
 * 
 * @method string       getName()            Returns the current record's "name" value
 * @method enum         getStatus()          Returns the current record's "status" value
 * @method enum         getFrequency()       Returns the current record's "frequency" value
 * @method blob         getAttachment()      Returns the current record's "attachment" value
 * @method clob         getComment()         Returns the current record's "comment" value
 * @method integer      getCollectorId()     Returns the current record's "collector_id" value
 * @method integer      getReviewerId()      Returns the current record's "reviewer_id" value
 * @method integer      getOrganizationId()  Returns the current record's "organization_id" value
 * @method Organization getOrganization()    Returns the current record's "Organization" value
 * @method Member       getMember()          Returns the current record's "Member" value
 * @method Grantx       setName()            Sets the current record's "name" value
 * @method Grantx       setStatus()          Sets the current record's "status" value
 * @method Grantx       setFrequency()       Sets the current record's "frequency" value
 * @method Grantx       setAttachment()      Sets the current record's "attachment" value
 * @method Grantx       setComment()         Sets the current record's "comment" value
 * @method Grantx       setCollectorId()     Sets the current record's "collector_id" value
 * @method Grantx       setReviewerId()      Sets the current record's "reviewer_id" value
 * @method Grantx       setOrganizationId()  Sets the current record's "organization_id" value
 * @method Grantx       setOrganization()    Sets the current record's "Organization" value
 * @method Grantx       setMember()          Sets the current record's "Member" value
 * 
 * @package    cfssf
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGrantx extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('grantx');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('status', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'To be reviewed',
              1 => 'Reviewed',
              2 => 'Complete',
             ),
             'default' => 'To be reviewed',
             'notnull' => true,
             ));
        $this->hasColumn('frequency', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Yearly',
              1 => 'Biannual',
              2 => 'Dependent on Funds',
              3 => 'Ongoing',
              4 => 'Other',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('attachment', 'blob', null, array(
             'type' => 'blob',
             ));
        $this->hasColumn('comment', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('collector_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('reviewer_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('organization_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Organization', array(
             'local' => 'organization_id',
             'foreign' => 'id'));

        $this->hasOne('Member', array(
             'local' => 'reviewer_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}