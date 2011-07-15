<?php

/**
 * BaseOrganization
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $eng_name
 * @property string $chn_name
 * @property string $website
 * @property enum $status
 * @property clob $comment
 * @property integer $collector_id
 * @property integer $reviewer_id
 * @property Member $Reviewer
 * @property Member $Collector
 * @property Doctrine_Collection $Grants
 * @property Doctrine_Collection $AssetRecords
 * @property Doctrine_Collection $GivingRecords
 * @property Doctrine_Collection $ContactPersons
 * 
 * @method string              getEngName()        Returns the current record's "eng_name" value
 * @method string              getChnName()        Returns the current record's "chn_name" value
 * @method string              getWebsite()        Returns the current record's "website" value
 * @method enum                getStatus()         Returns the current record's "status" value
 * @method clob                getComment()        Returns the current record's "comment" value
 * @method integer             getCollectorId()    Returns the current record's "collector_id" value
 * @method integer             getReviewerId()     Returns the current record's "reviewer_id" value
 * @method Member              getReviewer()       Returns the current record's "Reviewer" value
 * @method Member              getCollector()      Returns the current record's "Collector" value
 * @method Doctrine_Collection getGrants()         Returns the current record's "Grants" collection
 * @method Doctrine_Collection getAssetRecords()   Returns the current record's "AssetRecords" collection
 * @method Doctrine_Collection getGivingRecords()  Returns the current record's "GivingRecords" collection
 * @method Doctrine_Collection getContactPersons() Returns the current record's "ContactPersons" collection
 * @method Organization        setEngName()        Sets the current record's "eng_name" value
 * @method Organization        setChnName()        Sets the current record's "chn_name" value
 * @method Organization        setWebsite()        Sets the current record's "website" value
 * @method Organization        setStatus()         Sets the current record's "status" value
 * @method Organization        setComment()        Sets the current record's "comment" value
 * @method Organization        setCollectorId()    Sets the current record's "collector_id" value
 * @method Organization        setReviewerId()     Sets the current record's "reviewer_id" value
 * @method Organization        setReviewer()       Sets the current record's "Reviewer" value
 * @method Organization        setCollector()      Sets the current record's "Collector" value
 * @method Organization        setGrants()         Sets the current record's "Grants" collection
 * @method Organization        setAssetRecords()   Sets the current record's "AssetRecords" collection
 * @method Organization        setGivingRecords()  Sets the current record's "GivingRecords" collection
 * @method Organization        setContactPersons() Sets the current record's "ContactPersons" collection
 * 
 * @package    cfssf
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOrganization extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('organization');
        $this->hasColumn('eng_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('chn_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('website', 'string', 255, array(
             'type' => 'string',
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
             'default' => 'To be reviewer',
             'notnull' => true,
             ));
        $this->hasColumn('comment', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('collector_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('reviewer_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member as Reviewer', array(
             'local' => 'reviewer_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Member as Collector', array(
             'local' => 'collector_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Grantx as Grants', array(
             'local' => 'id',
             'foreign' => 'organization_id'));

        $this->hasMany('AssetRecord as AssetRecords', array(
             'local' => 'id',
             'foreign' => 'organization_id'));

        $this->hasMany('GivingRecord as GivingRecords', array(
             'local' => 'id',
             'foreign' => 'organization_id'));

        $this->hasMany('ContactPerson as ContactPersons', array(
             'local' => 'id',
             'foreign' => 'organization_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}