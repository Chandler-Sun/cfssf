<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $Contents
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getContents()    Returns the current record's "Contents" collection
 * @method Category            setName()        Sets the current record's "name" value
 * @method Category            setDescription() Sets the current record's "description" value
 * @method Category            setContents()    Sets the current record's "Contents" collection
 * 
 * @package    cfssf
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Content as Contents', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}