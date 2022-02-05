<?php

namespace Repository\FakeData;

class RemoteData
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
                    'Positive Guys' => 5000,
                    'Visitor Analytics' => 650,
                    'Some other Analytics' => 130
                ]
            ],
            '2021' => [
                '12' => [
                    'Google Analytics' => 150,
                    'Positive Guys' => 5000,
                    'Visitor Analytics' => 650,
                    'Some other Analytics' => 130
                ],
                '11' => [
                    'Google Analytics' => 150,
                    'Positive Guys' => 5000,
                    'Visitor Analytics' => 650,
                    'Some other Analytics' => 130
                ],
                '10' => [
                    'Google Analytics' => 150,
                    'Positive Guys' => 5000,
                    'Visitor Analytics' => 650,
                    'Some other Analytics' => 130
                ],
                '09' => [
                    'Google Analytics' => 150,
                    'Positive Guys' => 5000,
                    'Visitor Analytics' => 650,
                    'Some other Analytics' => 130
                ],
            ]
        ];
    }
}