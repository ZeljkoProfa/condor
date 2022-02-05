<?php

namespace Repository;

use Repository\FakeData\DbData;

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