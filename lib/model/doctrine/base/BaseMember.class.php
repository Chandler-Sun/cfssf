<?php

/**
 * BaseMember
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property Doctrine_Collection $ReviewedOrganizations
 * @property Doctrine_Collection $ReviewedGrants
 * 
 * @method string              getName()                  Returns the current record's "name" value
 * @method string              getEmail()                 Returns the current record's "email" value
 * @method Doctrine_Collection getReviewedOrganizations() Returns the current record's "ReviewedOrganizations" collection
 * @method Doctrine_Collection getReviewedGrants()        Returns the current record's "ReviewedGrants" collection
 * @method Member              setName()                  Sets the current record's "name" value
 * @method Member              setEmail()                 Sets the current record's "email" value
 * @method Member              setReviewedOrganizations() Sets the current record's "ReviewedOrganizations" collection
 * @method Member              setReviewedGrants()        Sets the current record's "ReviewedGrants" collection
 * 
 * @package    cfssf
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMember extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('member');
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Organization as ReviewedOrganizations', array(
             'local' => 'id',
             'foreign' => 'reviewer_id'));

        $this->hasMany('Grants as ReviewedGrants', array(
             'local' => 'id',
             'foreign' => 'reviewer_id'));
    }
}