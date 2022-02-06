<?php

namespace FakeData;

class DbData
{
    /**
     * Returns fake data
     *
     * @return array
     */
    public function getData()
    {
        return [
            '2022' => [
                '01' => [
                    'Visitor Analytics' => 650,
                ]
            ],
            '2021' => [
                '12' => [
                    'Visitor Analytics' => 650,
                ],
                '11' => [
                    'Visitor Analytics' => 650,
                ],
                '10' => [
                    'Visitor Analytics' => 650,
                ],
                '09' => [
                    'Visitor Analytics' => 650,
                ],
            ]
        ];
    }
}