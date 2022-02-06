<?php

namespace FakeData;

class GoogleAnalyticsData
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
                    'Google Analytics' => 150,
                ]
            ],
            '2021' => [
                '12' => [
                    'Google Analytics' => 150,
                ],
                '11' => [
                    'Google Analytics' => 150,
                ],
                '10' => [
                    'Google Analytics' => 150,
                ],
                '09' => [
                    'Google Analytics' => 150,
                ],
            ]
        ];
    }
}