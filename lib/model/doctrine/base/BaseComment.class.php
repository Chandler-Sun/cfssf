<?php

/**
 * BaseComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property clob $body
 * @property integer $user_id
 * @property integer $content_id
 * @property Content $Content
 * 
 * @method clob    getBody()       Returns the current record's "body" value
 * @method integer getUserId()     Returns the current record's "user_id" value
 * @method integer getContentId()  Returns the current record's "content_id" value
 * @method Content getContent()    Returns the current record's "Content" value
 * @method Comment setBody()       Sets the current record's "body" value
 * @method Comment setUserId()     Sets the current record's "user_id" value
 * @method Comment setContentId()  Sets the current record's "content_id" value
 * @method Comment setContent()    Sets the current record's "Content" value
 * 
 * @package    cfssf
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('comment');
        $this->hasColumn('body', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('content_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Content', array(
             'local' => 'content_id',
             'foreign' => 'id'));
    }
}