<?php

namespace Repository;

use FakeData\DbData;

class DBDBRepository implements DBRepositoryInterface
{
    /**
     * Get Data from DB
     */
    public function getDataFromTheSource()
    {
        return (new DbData())->getData();
    }
}