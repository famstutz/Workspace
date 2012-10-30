<?php


/**
 * Base class that represents a query for the 'car' table.
 *
 *
 *
 * @method CarQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CarQuery orderByManufacturer($order = Criteria::ASC) Order by the manufacturer column
 * @method CarQuery orderByColor($order = Criteria::ASC) Order by the color column
 * @method CarQuery orderByMilage($order = Criteria::ASC) Order by the milage column
 * @method CarQuery orderByMaxspeed($order = Criteria::ASC) Order by the maxspeed column
 *
 * @method CarQuery groupById() Group by the id column
 * @method CarQuery groupByManufacturer() Group by the manufacturer column
 * @method CarQuery groupByColor() Group by the color column
 * @method CarQuery groupByMilage() Group by the milage column
 * @method CarQuery groupByMaxspeed() Group by the maxspeed column
 *
 * @method CarQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CarQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CarQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CarQuery leftJoinRentalaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rentalaction relation
 * @method CarQuery rightJoinRentalaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rentalaction relation
 * @method CarQuery innerJoinRentalaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Rentalaction relation
 *
 * @method Car findOne(PropelPDO $con = null) Return the first Car matching the query
 * @method Car findOneOrCreate(PropelPDO $con = null) Return the first Car matching the query, or a new Car object populated from the query conditions when no match is found
 *
 * @method Car findOneById(int $id) Return the first Car filtered by the id column
 * @method Car findOneByManufacturer(string $manufacturer) Return the first Car filtered by the manufacturer column
 * @method Car findOneByColor(string $color) Return the first Car filtered by the color column
 * @method Car findOneByMilage(int $milage) Return the first Car filtered by the milage column
 * @method Car findOneByMaxspeed(int $maxspeed) Return the first Car filtered by the maxspeed column
 *
 * @method array findById(int $id) Return Car objects filtered by the id column
 * @method array findByManufacturer(string $manufacturer) Return Car objects filtered by the manufacturer column
 * @method array findByColor(string $color) Return Car objects filtered by the color column
 * @method array findByMilage(int $milage) Return Car objects filtered by the milage column
 * @method array findByMaxspeed(int $maxspeed) Return Car objects filtered by the maxspeed column
 *
 * @package    propel.generator.rentalcompany.om
 */
abstract class BaseCarQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCarQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'rentalcompany', $modelName = 'Car', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CarQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CarQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CarQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CarQuery) {
            return $criteria;
        }
        $query = new CarQuery();
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
     * @return   Car|Car[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Car A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `MANUFACTURER`, `COLOR`, `MILAGE`, `MAXSPEED` FROM `car` WHERE `ID` = :p0';
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
            $obj = new Car();
            $obj->hydrate($row);
            CarPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Car|Car[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Car[]|mixed the list of results, formatted by the current formatter
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
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarPeer::ID, $keys, Criteria::IN);
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
     * @return CarQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CarPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the manufacturer column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturer('fooValue');   // WHERE manufacturer = 'fooValue'
     * $query->filterByManufacturer('%fooValue%'); // WHERE manufacturer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $manufacturer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByManufacturer($manufacturer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manufacturer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $manufacturer)) {
                $manufacturer = str_replace('*', '%', $manufacturer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarPeer::MANUFACTURER, $manufacturer, $comparison);
    }

    /**
     * Filter the query on the color column
     *
     * Example usage:
     * <code>
     * $query->filterByColor('fooValue');   // WHERE color = 'fooValue'
     * $query->filterByColor('%fooValue%'); // WHERE color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $color The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByColor($color = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($color)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $color)) {
                $color = str_replace('*', '%', $color);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarPeer::COLOR, $color, $comparison);
    }

    /**
     * Filter the query on the milage column
     *
     * Example usage:
     * <code>
     * $query->filterByMilage(1234); // WHERE milage = 1234
     * $query->filterByMilage(array(12, 34)); // WHERE milage IN (12, 34)
     * $query->filterByMilage(array('min' => 12)); // WHERE milage > 12
     * </code>
     *
     * @param     mixed $milage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByMilage($milage = null, $comparison = null)
    {
        if (is_array($milage)) {
            $useMinMax = false;
            if (isset($milage['min'])) {
                $this->addUsingAlias(CarPeer::MILAGE, $milage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($milage['max'])) {
                $this->addUsingAlias(CarPeer::MILAGE, $milage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarPeer::MILAGE, $milage, $comparison);
    }

    /**
     * Filter the query on the maxspeed column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxspeed(1234); // WHERE maxspeed = 1234
     * $query->filterByMaxspeed(array(12, 34)); // WHERE maxspeed IN (12, 34)
     * $query->filterByMaxspeed(array('min' => 12)); // WHERE maxspeed > 12
     * </code>
     *
     * @param     mixed $maxspeed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function filterByMaxspeed($maxspeed = null, $comparison = null)
    {
        if (is_array($maxspeed)) {
            $useMinMax = false;
            if (isset($maxspeed['min'])) {
                $this->addUsingAlias(CarPeer::MAXSPEED, $maxspeed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxspeed['max'])) {
                $this->addUsingAlias(CarPeer::MAXSPEED, $maxspeed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarPeer::MAXSPEED, $maxspeed, $comparison);
    }

    /**
     * Filter the query by a related Rentalaction object
     *
     * @param   Rentalaction|PropelObjectCollection $rentalaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CarQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRentalaction($rentalaction, $comparison = null)
    {
        if ($rentalaction instanceof Rentalaction) {
            return $this
                ->addUsingAlias(CarPeer::ID, $rentalaction->getCarId(), $comparison);
        } elseif ($rentalaction instanceof PropelObjectCollection) {
            return $this
                ->useRentalactionQuery()
                ->filterByPrimaryKeys($rentalaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRentalaction() only accepts arguments of type Rentalaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rentalaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function joinRentalaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rentalaction');

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
            $this->addJoinObject($join, 'Rentalaction');
        }

        return $this;
    }

    /**
     * Use the Rentalaction relation Rentalaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RentalactionQuery A secondary query class using the current class as primary query
     */
    public function useRentalactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRentalaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rentalaction', 'RentalactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Car $car Object to remove from the list of results
     *
     * @return CarQuery The current query, for fluid interface
     */
    public function prune($car = null)
    {
        if ($car) {
            $this->addUsingAlias(CarPeer::ID, $car->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
