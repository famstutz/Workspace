<?php



/**
 * This class defines the structure of the 'rentalaction' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.rentalcompany.map
 */
class RentalactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'rentalcompany.map.RentalactionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('rentalaction');
        $this->setPhpName('Rentalaction');
        $this->setClassname('Rentalaction');
        $this->setPackage('rentalcompany');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CAR_ID', 'CarId', 'INTEGER', 'car', 'ID', true, null, null);
        $this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'INTEGER', 'customer', 'ID', true, null, null);
        $this->addColumn('RENTDATE', 'Rentdate', 'TIMESTAMP', true, null, null);
        $this->addColumn('RETURNDATE', 'Returndate', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Car', 'Car', RelationMap::MANY_TO_ONE, array('car_id' => 'id', ), null, null);
        $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), null, null);
    } // buildRelations()

} // RentalactionTableMap
