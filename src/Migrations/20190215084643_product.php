<?php


use Phinx\Migration\AbstractMigration;

class Product extends AbstractMigration
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
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('product', ['engine'=>'MyISAM', 'id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id', 'integer', ['identity'=>true])
            ->addColumn('name', 'string', ['limit'=>255, 'null'=>true])
            ->addColumn('description', 'string', ['limit'=>600, 'null'=>true])
            ->addColumn('quantity', 'integer', ['default'=>0])
            ->addColumn('price', 'decimal', ['precision'=>15, 'scale'=>2, 'default'=>0])
            ->addColumn('date_create', 'timestamp', ['default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('date_update', 'datetime', ['null'=>true])
            ->addColumn('bit_active', 'integer', ['default'=>1, 'null'=>false])
            ->create();
    }
}
