<?php

namespace FakeData;

class PositiveGuys
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
                    'Positive Guys' => 5000,
                ]
            ],
            '2021' => [
                '12' => [
                    'Positive Guys' => 5000,
                ],
                '11' => [
                    'Positive Guys' => 5000,
                ],
                '10' => [
                    'Positive Guys' => 5000,
                ],
                '09' => [
                    'Positive Guys' => 5500,
                ],
            ]
        ];
    }
}