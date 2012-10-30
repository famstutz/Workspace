<?php


/**
 * Base class that represents a query for the 'rentalaction' table.
 *
 *
 *
 * @method RentalactionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RentalactionQuery orderByCarId($order = Criteria::ASC) Order by the car_id column
 * @method RentalactionQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method RentalactionQuery orderByRentdate($order = Criteria::ASC) Order by the rentDate column
 * @method RentalactionQuery orderByReturndate($order = Criteria::ASC) Order by the returnDate column
 *
 * @method RentalactionQuery groupById() Group by the id column
 * @method RentalactionQuery groupByCarId() Group by the car_id column
 * @method RentalactionQuery groupByCustomerId() Group by the customer_id column
 * @method RentalactionQuery groupByRentdate() Group by the rentDate column
 * @method RentalactionQuery groupByReturndate() Group by the returnDate column
 *
 * @method RentalactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RentalactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RentalactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RentalactionQuery leftJoinCar($relationAlias = null) Adds a LEFT JOIN clause to the query using the Car relation
 * @method RentalactionQuery rightJoinCar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Car relation
 * @method RentalactionQuery innerJoinCar($relationAlias = null) Adds a INNER JOIN clause to the query using the Car relation
 *
 * @method RentalactionQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method RentalactionQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method RentalactionQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method Rentalaction findOne(PropelPDO $con = null) Return the first Rentalaction matching the query
 * @method Rentalaction findOneOrCreate(PropelPDO $con = null) Return the first Rentalaction matching the query, or a new Rentalaction object populated from the query conditions when no match is found
 *
 * @method Rentalaction findOneById(int $id) Return the first Rentalaction filtered by the id column
 * @method Rentalaction findOneByCarId(int $car_id) Return the first Rentalaction filtered by the car_id column
 * @method Rentalaction findOneByCustomerId(int $customer_id) Return the first Rentalaction filtered by the customer_id column
 * @method Rentalaction findOneByRentdate(string $rentDate) Return the first Rentalaction filtered by the rentDate column
 * @method Rentalaction findOneByReturndate(string $returnDate) Return the first Rentalaction filtered by the returnDate column
 *
 * @method array findById(int $id) Return Rentalaction objects filtered by the id column
 * @method array findByCarId(int $car_id) Return Rentalaction objects filtered by the car_id column
 * @method array findByCustomerId(int $customer_id) Return Rentalaction objects filtered by the customer_id column
 * @method array findByRentdate(string $rentDate) Return Rentalaction objects filtered by the rentDate column
 * @method array findByReturndate(string $returnDate) Return Rentalaction objects filtered by the returnDate column
 *
 * @package    propel.generator.rentalcompany.om
 */
abstract class BaseRentalactionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRentalactionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'rentalcompany', $modelName = 'Rentalaction', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RentalactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     RentalactionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RentalactionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RentalactionQuery) {
            return $criteria;
        }
        $query = new RentalactionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Rentalaction|Rentalaction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RentalactionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RentalactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Rentalaction A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CAR_ID`, `CUSTOMER_ID`, `RENTDATE`, `RETURNDATE` FROM `rentalaction` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Rentalaction();
            $obj->hydrate($row);
            RentalactionPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Rentalaction|Rentalaction[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Rentalaction[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RentalactionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RentalactionPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RentalactionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the car_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCarId(1234); // WHERE car_id = 1234
     * $query->filterByCarId(array(12, 34)); // WHERE car_id IN (12, 34)
     * $query->filterByCarId(array('min' => 12)); // WHERE car_id > 12
     * </code>
     *
     * @see       filterByCar()
     *
     * @param     mixed $carId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByCarId($carId = null, $comparison = null)
    {
        if (is_array($carId)) {
            $useMinMax = false;
            if (isset($carId['min'])) {
                $this->addUsingAlias(RentalactionPeer::CAR_ID, $carId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carId['max'])) {
                $this->addUsingAlias(RentalactionPeer::CAR_ID, $carId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalactionPeer::CAR_ID, $carId, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @see       filterByCustomer()
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(RentalactionPeer::CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(RentalactionPeer::CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalactionPeer::CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the rentDate column
     *
     * Example usage:
     * <code>
     * $query->filterByRentdate('2011-03-14'); // WHERE rentDate = '2011-03-14'
     * $query->filterByRentdate('now'); // WHERE rentDate = '2011-03-14'
     * $query->filterByRentdate(array('max' => 'yesterday')); // WHERE rentDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $rentdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByRentdate($rentdate = null, $comparison = null)
    {
        if (is_array($rentdate)) {
            $useMinMax = false;
            if (isset($rentdate['min'])) {
                $this->addUsingAlias(RentalactionPeer::RENTDATE, $rentdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rentdate['max'])) {
                $this->addUsingAlias(RentalactionPeer::RENTDATE, $rentdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalactionPeer::RENTDATE, $rentdate, $comparison);
    }

    /**
     * Filter the query on the returnDate column
     *
     * Example usage:
     * <code>
     * $query->filterByReturndate('2011-03-14'); // WHERE returnDate = '2011-03-14'
     * $query->filterByReturndate('now'); // WHERE returnDate = '2011-03-14'
     * $query->filterByReturndate(array('max' => 'yesterday')); // WHERE returnDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $returndate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function filterByReturndate($returndate = null, $comparison = null)
    {
        if (is_array($returndate)) {
            $useMinMax = false;
            if (isset($returndate['min'])) {
                $this->addUsingAlias(RentalactionPeer::RETURNDATE, $returndate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returndate['max'])) {
                $this->addUsingAlias(RentalactionPeer::RETURNDATE, $returndate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalactionPeer::RETURNDATE, $returndate, $comparison);
    }

    /**
     * Filter the query by a related Car object
     *
     * @param   Car|PropelObjectCollection $car The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RentalactionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCar($car, $comparison = null)
    {
        if ($car instanceof Car) {
            return $this
                ->addUsingAlias(RentalactionPeer::CAR_ID, $car->getId(), $comparison);
        } elseif ($car instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalactionPeer::CAR_ID, $car->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCar() only accepts arguments of type Car or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Car relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function joinCar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Car');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Car');
        }

        return $this;
    }

    /**
     * Use the Car relation Car object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CarQuery A secondary query class using the current class as primary query
     */
    public function useCarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Car', 'CarQuery');
    }

    /**
     * Filter the query by a related Customer object
     *
     * @param   Customer|PropelObjectCollection $customer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RentalactionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof Customer) {
            return $this
                ->addUsingAlias(RentalactionPeer::CUSTOMER_ID, $customer->getId(), $comparison);
        } elseif ($customer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalactionPeer::CUSTOMER_ID, $customer->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type Customer or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation Customer object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', 'CustomerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rentalaction $rentalaction Object to remove from the list of results
     *
     * @return RentalactionQuery The current query, for fluid interface
     */
    public function prune($rentalaction = null)
    {
        if ($rentalaction) {
            $this->addUsingAlias(RentalactionPeer::ID, $rentalaction->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
