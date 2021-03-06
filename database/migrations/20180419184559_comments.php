<?php


use Phinx\Migration\AbstractMigration;

class Comments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $comments = $this->table('comments', ['id' => false, 'primary_key' => 'id']);
        $comments
        ->addColumn('id', 'string', ['limit' => 30])
        ->addColumn('post', 'string', ['limit' => 30])
        ->addColumn('user', 'string', ['limit' => 30])
        ->addColumn('comment', 'string')
        ->addColumn('softdelete', 'boolean', ['default' => 0])
        ->addColumn('created_at', 'datetime')
        ->addColumn('deleted_at', 'datetime', ['null' => true])
        ->create();
    }
}
